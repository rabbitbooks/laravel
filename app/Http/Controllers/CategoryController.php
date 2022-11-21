<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(Categories $categories) {
        $categories = DB::table('categories')->get(); //getAll

        return view('news.categories')->with('categories', $categories);
    }

    public function show(News $news, Categories $categories, $slug) {
        return view('news.category', [
            'category' => DB::table('categories')->where('slug', $slug)->first()->title,
            'news' => $news->getNewsByCategorySlug($slug)
        ]);
    }
}
