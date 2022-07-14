<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubSubCategoryController; 


Route::prefix('subsubcategory')->group(function(){

//Admin All SUb subCategory route
Route::get('/all',[SubSubCategoryController::class, 'index'])->name('all.subsubcategory')->middleware('auth:admin');
Route::post('/add',[SubSubCategoryController::class,'create'])->name('add.subsubcategory');
Route::get('/edit/{id}',[SubSubCategoryController::class,'edit'])->name('edit.subsubcategory')->middleware('auth:admin');
Route::post('/update',[SubSubCategoryController::class,'update'])->name('update.subsubcategory');
Route::get('/delete/{id}',[SubSubCategoryController::class,'delete'])->name('delete.subsubcategory');

Route::get('/subcategory/ajax/{category_id}',[SubSubCategoryController::class,'GetSubCategory']);
Route::get('/sub-subcategory/ajax/{subcategory_id}',[SubSubCategoryController::class,'GetSubSubCategory']);

});

?>