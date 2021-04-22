<?php

//use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix'  =>  'admin','namespace' => 'Admin',], function () {

    Route::get('login', [\App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [\App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login.post');
    Route::get('logout', [\App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('admin.dashboard');

        //settings
        Route::get('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('admin.settings');
        Route::post('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('admin.settings.update');

        //categories
        Route::group(['prefix'  =>   'categories'], function() {
            Route::get('/', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.categories.index');
            Route::get('/create', [\App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.categories.create');
            Route::post('/store', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.categories.store');
            Route::get('/{id}/edit', [\App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin.categories.edit');
            Route::post('/update', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.categories.update');
            Route::get('/{id}/delete', [\App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('admin.categories.delete');
        });
        //attributes
        Route::group(['prefix'  =>   'attributes'], function() {

            Route::get('/', [\App\Http\Controllers\Admin\AttributeController::class, 'index'])->name('admin.attributes.index');
            Route::get('/create', [\App\Http\Controllers\Admin\AttributeController::class, 'create'])->name('admin.attributes.create');
            Route::post('/store', [\App\Http\Controllers\Admin\AttributeController::class, 'store'])->name('admin.attributes.store');
            Route::get('/{id}/edit', [\App\Http\Controllers\Admin\AttributeController::class, 'edit'])->name('admin.attributes.edit');
            Route::post('/update', [\App\Http\Controllers\Admin\AttributeController::class, 'update'])->name('admin.attributes.update');
            Route::get('/{id}/delete', [\App\Http\Controllers\Admin\AttributeController::class, 'delete'])->name('admin.attributes.delete');

            //values
            Route::post('/get-values', [\App\Http\Controllers\Admin\AttributeValueController::class,'getValues']);
            Route::post('/add-values', [\App\Http\Controllers\Admin\AttributeValueController::class,'addValues']);
            Route::post('/update-values', [\App\Http\Controllers\Admin\AttributeValueController::class,'updateValues']);
            Route::post('/delete-values', [\App\Http\Controllers\Admin\AttributeValueController::class,'deleteValues']);
        });

        //products
        Route::group(['prefix' => 'products'], function () {

            Route::get('/', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.products.index');
            Route::get('/create', [\App\Http\Controllers\Admin\ProductController::class, 'create'])->name('admin.products.create');
            Route::post('/store', [\App\Http\Controllers\Admin\ProductController::class, 'store'])->name('admin.products.store');
            Route::get('/edit/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('admin.products.edit');
            Route::post('/update', [\App\Http\Controllers\Admin\ProductController::class, 'update'])->name('admin.products.update');
            Route::get('/{id}/delete', [\App\Http\Controllers\Admin\ProductController::class, 'delete'])->name('admin.products.delete');

            Route::post('images/upload', [\App\Http\Controllers\Admin\ProductImageController::class, 'upload'])->name('admin.products.images.upload');
            Route::get('images/{id}/delete', [\App\Http\Controllers\Admin\ProductImageController::class, 'delete'])->name('admin.products.images.delete');

            // Load attributes on the page load
            Route::get('attributes/load', [\App\Http\Controllers\Admin\ProductAttributeController::class,'loadAttributes']);
            Route::post('attributes', [\App\Http\Controllers\Admin\ProductAttributeController::class,'productAttributes']);
            Route::post('attributes/values', [\App\Http\Controllers\Admin\ProductAttributeController::class,'loadValues']);
            Route::post('attributes/add', [\App\Http\Controllers\Admin\ProductAttributeController::class,'addAttribute']);
            Route::post('attributes/delete', [\App\Http\Controllers\Admin\ProductAttributeController::class,'deleteAttribute']);
        });
    });


});
