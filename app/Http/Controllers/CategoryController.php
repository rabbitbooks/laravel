<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::getCategories();

        return view('category.index')->with('categories', $categories);
    }

    public function showOne($slug)
    {
        $category = Category::getCategoryBySlug($slug);
        $newsByCategoryId = Category::getNewsByCategoryId($category['id']);

        return view('category.one')->with([
            'category' => $category,
            'news' => $newsByCategoryId,
        ]);
    }
}
