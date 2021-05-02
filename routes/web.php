<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::view('/', 'site.pages.homepage');
Route::get('/category/{slug}', [\App\Http\Controllers\Site\CategoryController::class,'show'])->name('category.show');
Route::get('/product/{slug}', [\App\Http\Controllers\Site\ProductController::class,'show'])->name('product.show');
Route::post('/product/add/cart', [\App\Http\Controllers\Site\ProductController::class,'addToCart'])->name('product.add.cart');

\Illuminate\Support\Facades\Auth::routes();
require 'admin.php';
