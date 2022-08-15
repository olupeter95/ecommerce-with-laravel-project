<?php

use App\Http\Controllers\Backend\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('subcategory')->group(function () {
    
    Route::get(
        '/all',
        [SubCategoryController::class, 'index']
    )->name('all.subcategory')->middleware('auth:admin');

    Route::post(
        '/add',
        [SubCategoryController::class,'create']
    )->name('add.subcategory');

    Route::get(
        '/edit/{id}',
        [SubCategoryController::class,'edit']
    )->name('edit.subcategory')->middleware('auth:admin');

    Route::post(
        '/update',
        [SubCategoryController::class,'update']
    )->name('update.subcategory');

    Route::get(
        '/delete/{id}',
        [SubCategoryController::class,'delete']
    )->name('delete.subcategory')->middleware('auth:admin');
});

