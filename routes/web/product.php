<?php

use App\Http\Controllers\Backend\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('product')->group(function () {
    Route::get(
        '/all',
        [ProductController::class,'index']
    )->name('add.product')->middleware('auth:admin');

    Route::get(
        '/manage',
        [ProductController::class,'viewProduct']
    )->name('view.product')->middleware('auth:admin');

    Route::post(
        '/store',
        [ProductController::class,'addProduct']
    )->name('store.product');

    Route::get(
        '/edit/{id}',
        [ProductController::class,'editProduct']
    )->name('edit.product')->middleware('auth:admin');

    Route::get(
        '/delete/{id}',
        [ProductController::class,'delProduct']
    )->name('product.delete');

    Route::get(
        '/deleteImg/{id}',
        [ProductController::class,'delMulImgProduct']
    )->name('product-del-multiimg');

    Route::post(
        '/data/update',
        [ProductController::class,'updateProductData']
    )->name('update.product');

    Route::post(
        '/img/update',
        [ProductController::class,'updateProductImg']
    )->name('update.product-img');

    Route::post(
        '/thumbnail/update',
        [ProductController::class,'updateProductThumbnail']
    )->name('update.product-thumbnail');

    Route::get(
        '/inactive/{id}',
        [ProductController::class,'productInactive']
    )->name('product.inactive');

    Route::get(
        '/active/{id}',
        [ProductController::class,'productActive']
    )->name('product.active');

    Route::get(
        '/details/{id}',
        [ProductController::class,'productDetails']
    )->name('product.details')->middleware('auth:admin');
});



