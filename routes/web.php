<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
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


Route::middleware(['auth', 'ceklevel:admin'])->group(function () {
    Route::get('/admin', [HomeController::class, 'admin'])->name('admin.index');
    Route::resource('category', App\Http\Controllers\CategoryController::class);
    Route::resource('article', App\Http\Controllers\ArticleController::class);
    Route::resource('tag', App\Http\Controllers\TagController::class);
});

Auth::routes();

Route::get('/', [FrontendController::class, 'home']);
Route::get('/articles', [FrontendController::class, 'allArticle'])->name('all.article');
Route::get('/articles/{article:slug}', [FrontendController::class, 'showArticle'])->name('show.article');
Route::get('/categories/{category:slug}', [FrontendController::class, 'showCategory'])->name('show.category');
Route::get('/tags/{tag:slug}', [FrontendController::class, 'showTag'])->name('show.tag');
Route::get('/about-us', [FrontendController::class, 'aboutus'])->name('aboutus');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/search', [FrontendController::class, 'search'])->name('search.article');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
