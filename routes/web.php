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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/blog', [App\Http\Controllers\HomeController::class, 'blog'])->name('blog');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

// -------- Product -------- //
Route::group(['prefix' => 'product'], function () {
    Route::get('/products', [App\Http\Controllers\ProductController::class,'products'])->name('getAllproducts');
    Route::get('/category-wise-products/{slug}', [App\Http\Controllers\ProductController::class,'categoryWiseproducts'])->name('getCategoryWiseproducts');
    Route::get('/sub-category-wise-products/{slug}/{sub_slug}', [App\Http\Controllers\ProductController::class,'subCategoryWiseproducts'])->name('getSubCategoryWiseproducts');
    Route::match(['get', 'post'], '/filter',[App\Http\Controllers\ProductController::class,'filterParams'])->name('setFilterParams');
    Route::get('/product-info/{slug}', [App\Http\Controllers\ProductController::class,'productDetail'])->name('getProductDetail');
});

// Route::group(['middleware' => ['auth:web']], function () {});

