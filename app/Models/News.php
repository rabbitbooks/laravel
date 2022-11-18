<?php

namespace App\Models;

use App\Models\Categories;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class News
{
    private Categories $category;
    private $news = [];

    public function __construct(Categories $category)
    {
        $this->category = $category;

        $this->setNews();
    }

    private function setNews()
    {
        $this->news = json_decode(File::get(storage_path() . '/news.json'), true);
    }


    public function getNews()
    {
        return $this->news;
    }

    public function getNewsByCategorySlug($slug) {
        $id = $this->category->getCategoryIdBySlug($slug);
        return $this->getNewsByCategoryId($id);
    }

    public function getNewsByCategoryId($id) {
        $news = [];
        foreach ($this->getNews() as $item) {
            if ($item['category_id'] == $id) {
                $news[] = $item;
            }
        }
        return $news;
    }

    public function getNewsById($id)
    {
          return $this->getNews()[$id] ?? [];
    }
}
