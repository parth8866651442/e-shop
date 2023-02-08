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

// -------- Product -------- //
Route::group(['prefix' => 'product'], function () {
    Route::get('/category-wise-products/{slug}', [App\Http\Controllers\ProductController::class,'categoryWiseproducts'])->name('getCategoryWiseproducts');
    // Route::get('/add', [App\Http\Controllers\UsersController::class,'form'])->name('addUser');
    // Route::post('/store', [App\Http\Controllers\UsersController::class,'store'])->name('storeUser');
    // Route::get('/edit/{id}', [App\Http\Controllers\UsersController::class,'form'])->name('editUser');
    // Route::post('/update/{id}', [App\Http\Controllers\UsersController::class,'update'])->name('updateUser');
    // Route::get('/delete/{id}', [App\Http\Controllers\UsersController::class,'destroy'])->name('deleteUser');
    // Route::post('/check_user_email', [App\Http\Controllers\UsersController::class,'checkuserEmailRepeat'])->name('checkUserEmailRepeat');
});

// Route::group(['middleware' => ['auth:web']], function () {});

