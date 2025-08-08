<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\DashboardController;

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('dashboard', [DashboardController::class, 'index']);

    Route::resource('categories', CategoryController::class);

    Route::get('categories/{id}/delete', [CategoryController::class, 'destroy'])->name('categories.delete');



});

