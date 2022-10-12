<?php


namespace App\Models;

use phpDocumentor\Reflection\Types\This;
use App\Models\News;

class Category
{
    private static $categories = [
        [
            'id' => 1,
            'title' => 'Категория 1',
            'slug' => 'category-1',
        ],
        [
            'id' => 2,
            'title' => 'Категория 2',
            'slug' => 'category-2',
        ]
    ];

    public static function getCategories()
    {
        return static::$categories;
    }

    public static function renameArrayKeysByKey($key)
    {
        $array = static::getCategories();

        return array_combine(array_column($array, $key), array_values($array));
    }

    public static function getCategoryBySlug($slug)
    {
        $categoryBySlag = static::renameArrayKeysByKey('slug');

        return array_key_exists($slug, $categoryBySlag) ? $categoryBySlag[$slug] : [];
    }

    public static function getNewsByCategoryId($categoryId)
    {
        $news = News::getNews();
        $result = [];

        foreach ($news as $new) {
            if ($new['category_id'] == $categoryId) {
                $result[] = $new;
            }
        }

        return isset($result) && !empty($result) ? $result : [];

//        return array_filter($news, function($new, $categoryId) {
//            return $new == $categoryId ?
//        });
    }
}
