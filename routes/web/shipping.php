<?php

use App\Http\Controllers\Backend\ShippingController;
use Illuminate\Support\Facades\Route;

Route::prefix('shipping')->group(function () {
    Route::middleware(['auth:admin'])->group(function (){
        Route::get('division', [ShippingController::class, 'viewDivision'])->name('manage-division');
        Route::post('division/add', [ShippingController::class, 'addDivision'])->name('add.division');
        Route::get('division/edit/{id}', [ShippingController::class, 'editDivision'])->name('edit.division');
        Route::get('division/delete/{id}', [ShippingController::class, 'deleteDivision'])->name('delete.division');
        Route::post('division/update', [ShippingController::class, 'updateDivision'])->name('update.division');
    });
});