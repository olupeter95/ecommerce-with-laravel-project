<?php

use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\BlogPostController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/blog')->group(function () {
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/category', [BlogCategoryController::class, 'blogCatView'])->name('blog.category');
        Route::post('/category/add', [BlogCategoryController::class, 'storeBlogCat'])->name('add.blogcategory');
        Route::get('/category/edit/{id}', [BlogCategoryController::class, 'editBlogCat'])->name('edit.blogcategory');
        Route::post('/category/update', [BlogCategoryController::class, 'updateBlogCat'])->name('update.blogcategory');
        Route::get('/category/delete/{id}', [BlogCategoryController::class, 'deleteBlogCat'])->name('delete.blogcategory');
        Route::get('/all', [BlogPostController::class, 'allBlog'])->name('all.blog');
        Route::get('/post/edit/{id}', [BlogPostController::class, 'editBlogPost'])->name('edit.blogpost');
        Route::get('/post/delete/{id}', [BlogPostController::class, 'deleteBlogPost'])->name('delete.blogpost');
        Route::get('/post/new', [BlogPostController::class, 'newBlogPost'])->name('new.blogpost');
        Route::post('/post/store', [BlogPostController::class, 'storeBlogPost'])->name('store.blogpost');
        Route::post('/post/update', [BlogPostController::class, 'updateBlogPost'])->name('update.blogpost');
    });
});
