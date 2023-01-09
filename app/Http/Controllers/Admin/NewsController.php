<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Services\FileServices;
use App\Services\ModelServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index() {
        return view('admin.index', [
            'news' => News::paginate(5)
        ]);
    }

    public function create(News $news) {
        return view('admin.create',[
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request, News $news) {
        ModelServices::prepareNewsData($request, $news);

        return redirect()->route('news.show', $news->id)->with('success', 'Новость добавлена');
    }

    public function update(Request $request, News $news) {
        ModelServices::prepareNewsData($request, $news);

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
