<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\WishlistController;


Route::post('/add/product/wishlist/{id}', [WishlistController::class, 'AddWishList']);
Route::get('/wishlist', [WishlistController::class, 'wishlistIndex'])->name('wishlist');
Route::get('/get-product/wishlist', [WishlistController::class, 'wishListProduct']);
Route::get('/remove/wishlist/{id}',[WishlistController::class, 'removeWishList']);








?>