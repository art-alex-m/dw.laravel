<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Site\ArticleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('site/index');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/news/{category:slug}', [ArticleController::class, 'index'])->name('news.category');
Route::get('/news/a/{article:slug}', [ArticleController::class, 'view'])->name('news.detail');
Route::get('/news', [ArticleController::class, 'index'])->name('news');