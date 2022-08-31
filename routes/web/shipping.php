<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ShippingController;
use App\Http\Controllers\Backend\ShippingDistrictController;

Route::prefix('shipping')->group(function () {
    Route::middleware(['auth:admin'])->group(function (){
        Route::get('division/view', [ShippingController::class, 'viewDivision'])->name('manage-division');
        Route::post('division/add', [ShippingController::class, 'addDivision'])->name('add.division');
        Route::get('division/edit/{id}', [ShippingController::class, 'editDivision'])->name('edit.division');
        Route::get('division/delete/{id}', [ShippingController::class, 'deleteDivision'])->name('delete.division');
        Route::post('division/update', [ShippingController::class, 'updateDivision'])->name('update.division');
        ///shipping district route
        Route::get('district/view', [ShippingDistrictController::class,'viewDistrict'])->name('manage-district');
        Route::post('district/add', [ShippingDistrictController::class, 'addDistrict'])->name('add.district');
        Route::get('district/edit/{id}', [ShippingDistrictController::class, 'editDistrict'])->name('edit.district');
        Route::get('district/delete/{id}', [ShippingDistrictController::class, 'deleteDistrict'])->name('delete.district');
        Route::post('district/update', [ShippingDistrictController::class, 'updateDistrict'])->name('update.district');
        ///shipping state route
        Route::get('state/view', [ShippingStateController::class,'viewState'])->name('manage-state');
        Route::post('state/add', [ShippingStateController::class, 'addState'])->name('add.state');
        Route::get('state/edit/{id}', [ShippingStateController::class, 'editState'])->name('edit.state');
        Route::get('state/delete/{id}', [ShippingStateController::class, 'deleteState'])->name('delete.state');
        Route::post('state/update', [ShippingStateController::class, 'updateState'])->name('update.state');
    });
});