<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\UserOrderController;

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
Route::get('cart/checkout', [CartPageController::class, 'viewCheckout'])->name('checkout');
Route::post('/checkout/product', [CheckoutController::class, 'storeCheckout'])->name('checkout.store');
Route::post(
    'stripe/order',
    [StripeController::class, 'stripeOrder'])
    ->name('stripe-order')
    ->middleware('auth');
