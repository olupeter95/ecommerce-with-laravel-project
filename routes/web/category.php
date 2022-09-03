<?php

use App\Http\Controllers\Backend\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('category')->group(function () {
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/all', [CategoryController::class, 'index'])->name('all.category');
        Route::post('/add', [CategoryController::class,'create'])->name('add.category');
        Route::get('/edit/{id}', [CategoryController::class,'edit'])->name('edit.category');
        Route::post('/update', [CategoryController::class,'update'])->name('update.category');
        Route::get(
            '/delete/{id}', 
            [CategoryController::class,'delete']
        )->name('delete.category');
    });
}); 
