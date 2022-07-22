<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\WishlistController;


Route::post('/add/product/wishlist/{id}', [WishlistController::class, 'AddWishList']);









?>