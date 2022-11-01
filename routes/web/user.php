<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\User\UserOrderController;

Route::get('/', [IndexController::class,'index'])->name('home');
Route::get('logout/user', [IndexController::class,'userLogout'])->name('user.logout');
Route::middleware(['user'])->group(function () {
    Route::get('/dashboard', [IndexController::class, 'home'])->name('dashboard');
    Route::get('profile/user', [IndexController::class,'userProfile'])->name('user.profile');
    Route::post('profile/user/update', [IndexController::class, 'userProfileUpdate'])
    ->name('user.profile.update');
    Route::get('change/user/pwd', [IndexController::class, 'changePassword'])
    ->name('change.user.password');
    Route::post('user/update/password', [IndexController::class, 'updatePassword'])
    ->name('user.password.update');
});

Route::get(
    '/product/detail/{id}',
    [IndexController::class, 'prodDetails'])->name('product-details');

Route::get(
    '/product/tags/{tags}',
    [IndexController::class, 'prodTags'])->name('product-tags');

Route::get(
    '/product/subcat/{id}/{slug}',
    [IndexController::class, 'prodSubcat'])->name('subcat-product');

Route::get(
    '/product/subsubcat/{id}/{slug}',
    [IndexController::class, 'prodSubSubcat'])->name('subsubcat-product');

Route::get('/product/view/modal/{id}', [IndexController::class, 'productModalView']);
Route::get('/view/my-order', [UserOrderController::class, 'myOrders'])->name('my-orders')
->middleware('auth');
Route::get('/all/order/details/{order_id}', [UserOrderController::class, 'orderDetails'])
->name('user-order-details')->middleware('auth');
Route::get('/order/invoice/{order_id}', [UserOrderController::class, 'orderInvoice'])->name('order-invoice');
Route::post('/return/order', [UserOrderController::class, 'returnOrder'])->name('return-order');
Route::get('/view/return/order', [UserOrderController::class, 'viewReturnOrder'])->name('view-returned-orders');
Route::get('/cancel/order', [UserOrderController::class, 'cancelOrders'])->name('cancel-orders');