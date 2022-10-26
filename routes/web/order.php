<?php

use App\Http\Controllers\Backend\OrderController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/order')->group(function () {
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/pending', [OrderController::class,'pendingOrders'])->name('pending-orders');
        Route::get('/details/{id}', [OrderController::class,'orderDetails'])->name('order-details');
        Route::get('/confirmed', [OrderController::class,'confirmedOrders'])->name('confirmed-orders');
        Route::get('/processing', [OrderController::class,'processingOrders'])->name('processing-orders');
        Route::get('/picked', [OrderController::class,'pickedOrders'])->name('picked-orders');
        Route::get('/shipped', [OrderController::class,'shippedOrders'])->name('shipped-orders');
        Route::get('/delivered', [OrderController::class,'deliveredOrders'])->name('delivered-orders');
        Route::get('/cancelled', [OrderController::class,'cancelledOrders'])->name('cancelled-orders');
        Route::get('/delete/{id}', [OrderController::class,'delete'])->name('delete.brand');
        Route::get('/pending/confirm/{id}', [OrderController::class,'pendingToConfirm'])->name('pending-confirm');
        Route::get('/confirm/processing/{id}', [OrderController::class,'confirmToProcessing'])->name('confirm-processing');
        Route::get('/processing/pick/{id}', [OrderController::class,'processingToPicked'])->name('processing-pick');
        Route::get('/pick/ship/{id}', [OrderController::class,'pickedToShipped'])->name('pick-ship');
        Route::get('/ship/deliver/{id}', [OrderController::class,'shippedToDeliver'])->name('ship-deliver');
        Route::get('/deliver/cancel/{id}', [OrderController::class,'deliveredToCancel'])->name('deliver-cancel');
        Route::get('/invoice/download/{id}', [OrderController::class,'invoiceDownload'])->name('invoice-download');
    });
});

