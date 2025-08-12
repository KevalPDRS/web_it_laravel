<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('dashboard', [DashboardController::class, 'index']);

    Route::resource('categories', CategoryController::class);
    Route::get('categories/{id}/delete', [CategoryController::class, 'destroy'])->name('categories.delete');
    
    Route::resource('brands', BrandController::class);
    Route::get('brands/{id}/delete', [BrandController::class, 'destroy'])->name('brands.delete');

});

