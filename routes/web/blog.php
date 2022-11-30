<?php

use App\Http\Controllers\Backend\BlogCategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/blog')->group(function () {
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/category', [BlogCategoryController::class, 'blogCatView'])->name('blog.category');
        Route::post('/category/add', [BlogCategoryController::class, 'storeBlogCat'])->name('add.blogcategory');
        Route::get('/category/edit', [BlogCategoryController::class, 'editBlogCat'])->name('edit.blogcategory');
        Route::get('/category/update', [BlogCategoryController::class, 'updateBlogCat'])->name('update.blogcategory');
        Route::get('/category/delete', [BlogCategoryController::class, 'deleteBlogCat'])->name('delete.blogcategory');
    });
});
