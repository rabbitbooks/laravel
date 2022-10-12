<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreetingsController;
use App\Http\Controllers\CategoryController;

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
Route::get('/', [GreetingsController::class, 'index'])->name('greetings');
Route::get('/home', [IndexController::class, 'index'])->name('home');
Route::view('/about', 'about')->name('about');

Route::name('news.')
    ->prefix('news')
    ->controller(NewsController::class)
    ->group(function() {
        Route::get('/','index')->name('index');
        Route::get('/{id}','showOne')->name('one');
    });

Route::name('admin.')
    ->controller(AdminController::class)
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/test1', 'test1')->name('test1');
        Route::get('/test2', 'test2')->name('test2');
    });

Route::name('category.')
    ->controller(CategoryController::class)
    ->prefix('category')
    ->group(function() {
        Route::get('/','index')->name('index');
        Route::get('/{slug}','showOne')->name('one');
    });
