<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;

Route::get('/', [IndexController::class,'index'])->name('home');
Route::get('logout/user', [IndexController::class,'userLogout'])->name('user.logout');
Route::get('profile/user', [IndexController::class,'userProfile'])->name('user.profile');
Route::post('profile/user/update',
    [IndexController::class, 'userProfileUpdate'])
    ->name('user.profile.update');
Route::get(
    'change/user/pwd',
    [IndexController::class, 'changePassword']
)->name('change.user.password');

Route::post(
    'user/update/password',
    [IndexController::class, 'updatePassword']
)->name('user.password.update');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',
])->group(function () {
    Route::get(
        '/dashboard',
        [IndexController::class, 'home'])->name('dashboard');
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
