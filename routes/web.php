<?php

use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\IndexController as AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('home');


Route::name('news.')
    ->prefix('news')
    ->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('/one/{id}', [NewsController::class, 'show'])->name('show');
        Route::name('category.')
            ->group(function () {
                Route::get('/categories', [CategoryController::class, 'index'])->name('index');
                Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('show');
            });

    });


Route::name('admin.')
    ->prefix('admin')
    ->middleware(['auth', 'is_admin'])
    ->group(function () {
        Route::get('/ajax', [\App\Http\Controllers\Admin\IndexController::class, 'ajax'])->name('ajax');
        Route::post('/ajax', [\App\Http\Controllers\Admin\IndexController::class, 'send']);

        Route::get('/users', [UserController::class, 'index'])->name('updateUsers');
        Route::get('/users/toggleAdmin/{user}', [UserController::class, 'toggleAdmin'])->name('toggleAdmin');

        Route::get('/parser', [ParserController::class, 'index'])->name('parser');

        Route::get('/', [AdminNewsController::class, 'index'])->name('index');
        Route::get('/test1', [AdminController::class, 'test1'])->name('test1');
        Route::get('/test2', [AdminController::class, 'test2'])->name('test2');
        Route::resource('/news', AdminNewsController::class)->except('show');

    });


Route::match(['get', 'post'], '/profile', [ProfileController::class, 'update'])
    ->middleware('auth')
    ->name('updateProfile');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth', 'is_admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::view('/about', 'about')->name('about');

Route::get('/auth/vk', [LoginController::class, 'loginVK'])->name('vkLogin');
Route::get('/auth/vk/response', [LoginController::class, 'responseVK'])->name('vkResponse');

Auth::routes();

