<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
// All Admin Brands route
Route::prefix('brand')->group(function(){
    Route::get('/all',[BrandController::class,'index'])->name('all.brand')->middleware('auth:admin');
    Route::post('/add',[BrandController::class,'create'])->name('add.brand');
    Route::get('/edit/{id}',[BrandController::class,'edit'])->name('edit.brand')->middleware('auth:admin');
    Route::post('/update',[BrandController::class,'update'])->name('update.brand');
    Route::get('/delete/{id}',[BrandController::class,'delete'])->name('delete.brand')->middleware('auth:admin');
});
//End All Admin Brand Route
?>