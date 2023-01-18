<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function ajax() {
        return view('admin.ajax', [
            'users' => User::all(),
            'currentUser' => Auth::user(),
        ]);
    }

    public function send(Request $request)
    {
        $user = User::find($request->id);
        $user->update(['is_admin' => !$user->is_admin]);

        return response()->json([
            'status' => 'ok',
        ]);
    }

    public function index() {
        return view('admin.index');
    }

    public function test1(News $news)
    {
        return response()->json($news->getNews())
            ->header('Content-Disposition', 'attachment; filename = "json.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function test2()
    {
        return response()->download('cat.jpg');
    }
}
