<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductImageController;

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('dashboard', [DashboardController::class, 'index']);

    Route::resource('categories', CategoryController::class);
    Route::get('categories/{id}/delete', [CategoryController::class, 'destroy'])->name('categories.delete');
    
    Route::resource('brands', BrandController::class);
    Route::get('brands/{id}/delete', [BrandController::class, 'destroy'])->name('brands.delete');

    Route::resource('products', ProductController::class);
    Route::get('products/{id}/delete', [ProductController::class, 'destroy'])->name('products.delete');
    
    Route::get('products/{id}/images', [ProductImageController::class, 'index']);
    Route::get('products/{id}/images/create', [ProductImageController::class, 'create']);
    Route::post('products/{id}/images', [ProductImageController::class, 'store']);
    Route::get('products/{id}/images/{imageId}/delete', [ProductImageController::class, 'destroy']);

});

