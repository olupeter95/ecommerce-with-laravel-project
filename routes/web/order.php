<?php

use App\Http\Controllers\Backend\OrderController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/order')->group(function () {
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/pending', [OrderController::class,'pendingOrders'])->name('pending-orders');
        Route::get('/pending/details/{id}', [OrderController::class,'pendingDetails'])->name('pending-order-details');
        Route::get('/edit/{id}', [OrderController::class,'edit'])->name('edit.brand');
        Route::post('/update', [OrderController::class,'update'])->name('update.brand');
        Route::get('/delete/{id}', [OrderController::class,'delete'])->name('delete.brand');
    });
});

