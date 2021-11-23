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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
