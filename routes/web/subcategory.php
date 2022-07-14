<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubCategoryController;


Route::prefix('subcategory')->group(function(){
    //Admin All subCategory route
Route::get('/all',[SubCategoryController::class, 'index'])->name('all.subcategory')->middleware('auth:admin');
Route::post('/add',[SubCategoryController::class,'create'])->name('add.subcategory');
Route::get('/edit/{id}',[SubCategoryController::class,'edit'])->name('edit.subcategory')->middleware('auth:admin');
Route::post('/update',[SubCategoryController::class,'update'])->name('update.subcategory');
Route::get('/delete/{id}',[SubCategoryController::class,'delete'])->name('delete.subcategory')->middleware('auth:admin');

});

?>