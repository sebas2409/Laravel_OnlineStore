<?php

use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
//se recomienda para el nombre usar el nombre del controlador.nombre del método
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name('home.about');
//puedo acceder a esta ruta mediante {{ asset('home.about') }}
//Route::get('/about',[HomeController::class,'about'])->name('home.about');
// Esta es otra manera de referirnos a la ruta anterior. (creo que es mas corta).
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/delete', [CartController::class, 'delete'])->name('cart.delete');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

Route::middleware('admin')->group(function () {
    Route::get('/admin', [AdminHomeController::class,'index'])->name('admin.home.index');
    Route::get('/admin/products', [AdminProductController::class,'index'])->name('admin.product.index');
    Route::post('/admin/products/store', [AdminProductController::class,'store'])->name('admin.product.store');
    Route::delete('/admin/products/{id}/delete', [AdminProductController::class,'delete'])->name('admin.product.delete');
    Route::get('/admin/products/{id}/edit', [AdminProductController::class,'edit'])->name('admin.product.edit');
    Route::put('/admin/product/{id}/update', [AdminProductController::class,'update'])->name('admin.product.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/cart/purchase', [CartController::class,'purchase'])->name('cart.purchase');
    Route::get('/my-account-orders', [MyAccountController::class,'orders'])->name('myaccount.orders');
});


Auth::routes();
