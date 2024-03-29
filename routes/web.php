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

Auth::routes(['verify' => true]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/returns-policy', [App\Http\Controllers\HomeController::class, 'returnsPolicy'])->name('returnsPolicy');
Route::get('/terms-of-service', [App\Http\Controllers\HomeController::class, 'termsOfService'])->name('termsOfService');
Route::get('/support', [App\Http\Controllers\HomeController::class, 'support'])->name('support');
Route::get('/privacy-policy', [App\Http\Controllers\HomeController::class, 'privacyPolicy'])->name('privacyPolicy');

// -------- Product -------- //
Route::group(['prefix' => 'products'], function () {
    Route::get('/', [App\Http\Controllers\ProductController::class,'products'])->name('getAllproducts');
    Route::get('/category-wise-products/{slug}', [App\Http\Controllers\ProductController::class,'categoryWiseproducts'])->name('getCategoryWiseproducts');
    Route::get('/sub-category-wise-products/{slug}/{sub_slug}', [App\Http\Controllers\ProductController::class,'subCategoryWiseproducts'])->name('getSubCategoryWiseproducts');
    Route::match(['get', 'post'], '/filter',[App\Http\Controllers\ProductController::class,'filterParams'])->name('setFilterParams');
    Route::get('/product-info/{slug}', [App\Http\Controllers\ProductController::class,'productDetail'])->name('getProductDetail');
    Route::get('/search',[App\Http\Controllers\ProductController::class,'products'])->name('productSearch');
});

// -------- blog -------- //
Route::group(['prefix' => 'blogs'], function () {
    Route::get('/', [App\Http\Controllers\BlogsController::class,'index'])->name('getAllblogs');
    Route::get('/{slug}', [App\Http\Controllers\BlogsController::class,'categoryWiseBlogs'])->name('getCategoryWiseBlogs');
    Route::get('/{slug}/{sub_slug}', [App\Http\Controllers\BlogsController::class,'blogDetail'])->name('getBlogDetail');
});


Route::group(['middleware' => ['auth:web','verified']], function () {

    // -------- My Account -------- //
    Route::group(['prefix' => 'My-Account'], function () {
        Route::get('/', [App\Http\Controllers\HomeController::class,'MyAccount'])->name('myAccounts');
        Route::post('/update-personal-info', [App\Http\Controllers\HomeController::class,'updatePersonalInfo'])->name('updatePersonalInfo');
        Route::post('/update-shipping-address', [App\Http\Controllers\HomeController::class,'shippingAddress'])->name('updateShippingAddress');
    });

    // -------- blog -------- //
    Route::post('blogs/{slug}/comment', [App\Http\Controllers\BlogsController::class,'commentAdd'])->name('commentwAdd');

    // -------- Product -------- //
    Route::post('product/{slug}/review', [App\Http\Controllers\ProductController::class,'reviewAdd'])->name('reviewAdd');

    // -------- cart -------- //
    Route::group(['prefix' => 'carts'], function () {
        Route::get('/', [App\Http\Controllers\CartsController::class,'index'])->name('getCarts');
        Route::match(['get', 'post'],'/add-cart/{slug}', [App\Http\Controllers\CartsController::class,'addToCart'])->name('addToCart');
        Route::post('/update-cart-item', [App\Http\Controllers\CartsController::class,'updateToCart'])->name('updateToCart');
        Route::get('/delete-cart-item/{id}', [App\Http\Controllers\CartsController::class,'deleteToCart'])->name('deleteToCart');
        
    });

    // -------- order -------- //
    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', [App\Http\Controllers\OrdersController::class,'index'])->name('getAllOrder');
        Route::get('/invoice/download', [App\Http\Controllers\OrdersController::class,'invoice'])->name('invoiceDownload');
        Route::get('/details', [App\Http\Controllers\OrdersController::class,'orderDetails'])->name('getOrderDetails');
        Route::get('/check-out', [App\Http\Controllers\OrdersController::class,'checkOut'])->name('getCheckOut');
        Route::post('/store', [App\Http\Controllers\OrdersController::class,'store'])->name('addToOrders');
        Route::get('/cancel-order/{id}', [App\Http\Controllers\OrdersController::class,'cancelOrder'])->name('cancelOrder');
    });

});