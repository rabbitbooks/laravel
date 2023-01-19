<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index() {


        return view('admin.index', [
            'news' => News::all()
        ]);
    }

    public function create(News $news) {

        return view('admin.create',[
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    public function store(NewsRequest $request, News $news) {

        $request->validated();

       // $request->validate($news->rules(), [], $news->attributeNames());
           // $request->validat();
        //$this->validate($request, $news->rules());


        $url = null;
        if ($request->file('image')) {
            $path = Storage::putFile('public/img', $request->file('image'));
            $url = Storage::url($path);
        }

        $news->image = $url;
        $news->fill($request->all())->save();


        return redirect()->route('news.show', $news->id)->with('success', 'Новость добавлена');
    }

    public function update(NewsRequest $request, News $news) {


        $url = null;
        if ($request->file('image')) {
            $path = Storage::putFile('public/img', $request->file('image'));
            $url = Storage::url($path);
        }

        $news->image = $url;
        $news->fill($request->all())->save();


        return redirect()->route('news.show', $news->id)->with('success', 'Новость изменена');
    }

    public function destroy(News $news) {
        $news->delete();
        return redirect()->route('admin.index')->with('success', 'Новость удалена');
    }

    public function edit(News $news) {

        return view('admin.create',[
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

}
