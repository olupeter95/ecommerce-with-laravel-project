<?php

use App\Http\Controllers\Backend\CouponController;
use Illuminate\Support\Facades\Route;

Route::prefix('/coupon')->group(function () {
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/view',
            [CouponController::class, 'index']
        )->name('manage.coupon');

        Route::get('/edit/{id}',
            [CouponController::class, 'editCoupon']
        )->name('edit.coupon');

        Route::post('/add',
            [CouponController::class, 'addCoupon']
        )->name('add.coupon');

        Route::post('/update',
            [CouponController::class, 'updateCoupon']
        )->name('update.coupon');

        Route::post('/delete/{id}',
            [CouponController::class, 'deleteCoupon']
        )->name('delete.coupon');
    });
});