<?php

use App\Http\Controllers\Backend\SubSubCategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('subsubcategory')->group(function () {
    Route::middleware(['auth:admin'])->group(function () {
        Route::get(
            '/all',
            [SubSubCategoryController::class, 'index']
        )->name('all.subsubcategory');
    
        Route::post(
            '/add',
            [SubSubCategoryController::class,'create']
        )->name('add.subsubcategory');
    
        Route::get(
            '/edit/{id}',
            [SubSubCategoryController::class,'edit']
        )->name('edit.subsubcategory');
    
        Route::post(
            '/update',
            [SubSubCategoryController::class,'update']
        )->name('update.subsubcategory');
    
        Route::get(
            '/delete/{id}',
            [SubSubCategoryController::class,'delete']
        )->name('delete.subsubcategory');
    
        Route::get(
            '/subcategory/ajax/{category_id}',
            [SubSubCategoryController::class,'getSubCategory']
        );
        Route::get(
            '/sub-subcategory/ajax/{subcategory_id}',
            [SubSubCategoryController::class,'getSubSubCategory']
        );
    });
});
