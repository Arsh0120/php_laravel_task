<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Authentication routes (login, register, etc.)
Auth::routes();

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('admin/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('admin/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('admin/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('admin/products/{product}', [ProductController::class, 'update'])->name('products.update');
});

// Public route
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');