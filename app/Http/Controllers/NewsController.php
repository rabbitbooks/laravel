<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        $news = News::getNews();

        return view('news.index')->with('news', $news);
    }

    public function showOne($slug) {
        $news = News::getNewsBySlug($slug);
        $categoriesById = News::sortCategoriesById();

        return view('news.one')->with(['news' => $news, 'categories' => $categoriesById]);
    }
}
