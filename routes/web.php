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
Route::get('/', function()
{
    return View::make('site.pages.homepage');
})->name('site.home');
//Route::view('/', 'site.pages.homepage');
Route::get('/category/{slug}', [\App\Http\Controllers\Site\CategoryController::class,'show'])->name('category.show');
Route::get('/product/{slug}', [\App\Http\Controllers\Site\ProductController::class,'show'])->name('product.show');
Route::post('/product/add/cart', [\App\Http\Controllers\Site\ProductController::class,'addToCart'])->name('product.add.cart');

Route::get('/cart', [\App\Http\Controllers\Site\CartController::class, 'getCart'])->name('checkout.cart');
Route::get('/cart/item/{id}/remove', [\App\Http\Controllers\Site\CartController::class, 'removeItem'])->name('checkout.cart.remove');
Route::patch('/cart/item/{id}/update', [\App\Http\Controllers\Site\CartController::class, 'updateItem'])->name('checkout.cart.update');
Route::get('/cart/clear', [\App\Http\Controllers\Site\CartController::class, 'clearCart'])->name('checkout.cart.clear');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/checkout', [\App\Http\Controllers\Site\CheckoutController::class, 'getCheckout'])->name('checkout.index');
    Route::post('/checkout/order', [\App\Http\Controllers\Site\CheckoutController::class, 'placeOrder'])->name('checkout.place.order');
});

\Illuminate\Support\Facades\Auth::routes();
require 'admin.php';
