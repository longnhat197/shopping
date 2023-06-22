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

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'loginAdmin']);
Route::post('/admin', [App\Http\Controllers\AdminController::class, 'postLoginAdmin']);


Route::get('/home', function () {
    return view('home');
});

Route::prefix('admin')->group(function () {
    Route::get('home', function () {
        return view('home');
    });
    //CategoryController
    Route::prefix('category')->group(function () {
        Route::get('', [App\Http\Controllers\CategoryController::class, 'index']);
        Route::get('create', [App\Http\Controllers\CategoryController::class, 'create']);
        Route::post('create', [App\Http\Controllers\CategoryController::class, 'store']);
        Route::get('edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit']);
        Route::post('edit/{id}', [App\Http\Controllers\CategoryController::class, 'update']);
        Route::post('delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete']);
    });
    //MenuController
    Route::prefix('menu')->group(function () {
        Route::get('', [App\Http\Controllers\MenuController::class, 'index']);
        Route::get('create', [App\Http\Controllers\MenuController::class, 'create']);
        Route::post('create', [App\Http\Controllers\MenuController::class, 'store']);
        Route::get('edit/{id}', [App\Http\Controllers\MenuController::class, 'edit']);
        Route::post('edit/{id}', [App\Http\Controllers\MenuController::class, 'update']);
        Route::post('delete/{id}', [App\Http\Controllers\MenuController::class, 'delete']);
    });
    //ProductController
    Route::prefix('product')->group(function () {
        Route::get('', [App\Http\Controllers\AdminProductController::class, 'index']);
        Route::get('create', [App\Http\Controllers\AdminProductController::class, 'create']);
        Route::post('create', [App\Http\Controllers\AdminProductController::class, 'store']);
    });
});
