<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use function GuzzleHttp\Promise\all;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Category $category
     */
    public function create(Category $category)
    {
        return view('admin.category.create', [
            'category' => $category,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     */
    public function store(Request $request, Category $category)
    {
        $request->flash();

        $category->slug = str_slug($request->title);
        $category->fill($request->all())->save();

        return redirect()->route('admin.category.index')->with('success', 'Категория успешно добавлена');
    }


    /**
     * Show the form for editing the specified resource.
     *
//     * @param  int  $id
     */
    public function edit(Category $category)
    {
        return view('admin.category.create', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param Category $category
     */
    public function update(Request $request, Category $category)
    {
        $request->flash();

        $category->slug = str_slug($request->title);
        $category->fill($request->all())->save();

        return redirect()->route('admin.category.index')->with('success', 'Категория успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     */
    public function destroy(Category $category)
    {
        $category->news()->delete();
        $category->delete();

        return redirect()->route('admin.category.index')->with('success', 'Категория удалена');
    }
}
