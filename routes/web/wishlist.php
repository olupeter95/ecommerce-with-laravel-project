<?php

use App\Http\Controllers\User\WishlistController;
use Illuminate\Support\Facades\Route;

Route::post(
    '/add/product/wishlist/{id}',[WishlistController::class, 'addWishList']
);
Route::get(
    '/wishlist', [WishlistController::class, 'wishlistIndex']
)->name('wishlist');
Route::get(
    '/get-product/wishlist', [WishlistController::class, 'wishListProduct']
);
Route::get(
    '/remove/wishlist/{id}', [WishlistController::class, 'removeWishList']
);
