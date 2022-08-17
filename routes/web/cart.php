<?php

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\User\CartPageController;
use Illuminate\Support\Facades\Route;

Route::post('/product/add/cart/{id}', [CartController::class, 'addCart']);
Route::get('/product/mini/cart', [CartController::class, 'miniCart']);
Route::get('/remove/product/minicart/{rowId}', [CartController::class, 'removeMiniCart']);
Route::get('cart/view', [CartPageController::class, 'myCart'])->name('cart');
Route::get('/get-product/cartlist', [CartPageController::class, 'getCart']);
Route::get(
    '/remove/cartlist/{id}', [CartPageController::class, 'removeCartList']
);
Route::get(
    '/increment/cart/{rowId}', [CartPageController::class, 'incrementCart']
);
Route::get(
    '/decrement/cart/{rowId}', [CartPageController::class, 'decrementCart']
);