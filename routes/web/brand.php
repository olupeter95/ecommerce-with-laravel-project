<?php

use App\Http\Controllers\Backend\BrandController;
use Illuminate\Support\Facades\Route;

Route::prefix('brand')->group(function () {
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/all', [BrandController::class,'index'])->name('all.brand');
        Route::post('/add', [BrandController::class,'create'])->name('add.brand');
        Route::get('/edit/{id}', [BrandController::class,'edit'])->name('edit.brand');
        Route::post('/update', [BrandController::class,'update'])->name('update.brand');
        Route::get('/delete/{id}', [BrandController::class,'delete'])->name('delete.brand');
    });
});

