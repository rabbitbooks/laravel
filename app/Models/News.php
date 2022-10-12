<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\Category;

class News
{
    private static $news = [
      [
            'id' => 1,
            'title' => 'Новость 1',
            'text' => 'А у нас новость 1 и она очень хорошая!',
            'slug' => 'novost-1',
            'category_id' => 1
        ],
        [
            'id' => 2,
            'title' => 'Новость 2',
            'slug' => 'novost-2',
            'text' => 'А тут плохие новости (((',
            'category_id' => 2
        ],
        [
            'id' => 3,
            'title' => 'Новость 3',
            'slug' => 'novost-3',
            'text' => 'Просто новость',
            'category_id' => 2
        ],
    ];

    public static function getNews()
    {
        return static::$news;
    }

    public static function sortCategoriesById()
    {
        $categoriesById = Category::renameArrayKeysByKey('id');

        return isset($categoriesById) && !empty($categoriesById) ? $categoriesById : [];
    }

    public static function getNewsBySlug($slug)
    {
        $news = static::getNews();
        $newsBySlag = array_combine(array_column($news, 'slug'), array_values($news));

        return array_key_exists($slug, $newsBySlag) ? $newsBySlag[$slug] : [];
    }
}
