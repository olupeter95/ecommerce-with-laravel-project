<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SubSubCategoryController;


//Admin Category Controller
Route::prefix('category')->group(function(){
    Route::get('/all',[CategoryController::class, 'index'])->name('all.category')->middleware('auth:admin');
    Route::post('/add',[CategoryController::class,'add'])->name('add.category');
    Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('edit.category')->middleware('auth:admin');
    Route::post('/update',[CategoryController::class,'update'])->name('update.category');
    Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('delete.category')->middleware('auth:admin');
//Admin All subCategory route
Route::get('/sub/all',[SubCategoryController::class, 'index'])->name('all.subcategory')->middleware('auth:admin');
Route::post('/sub/add',[SubCategoryController::class,'add'])->name('add.subcategory');
Route::get('/sub/edit/{id}',[SubCategoryController::class,'edit'])->name('edit.subcategory')->middleware('auth:admin');
Route::post('/sub/update',[SubCategoryController::class,'update'])->name('update.subcategory');
Route::get('/sub/delete/{id}',[SubCategoryController::class,'delete'])->name('delete.subcategory')->middleware('auth:admin');
//Admin All SUb subCategory route
Route::get('/sub/sub/all',[SubSubCategoryController::class, 'index'])->name('all.subsubcategory')->middleware('auth:admin');
Route::post('/sub/sub/add',[SubSubCategoryController::class,'add'])->name('add.subsubcategory');
Route::get('/sub/sub/edit/{id}',[SubSubCategoryController::class,'edit'])->name('edit.subsubcategory')->middleware('auth:admin');
Route::post('/sub/sub/update',[SubSubCategoryController::class,'update'])->name('update.subsubcategory');
Route::get('/sub/sub/delete/{id}',[SubSubCategoryController::class,'delete'])->name('delete.subsubcategory');

Route::get('/subcategory/ajax/{category_id}',[SubSubCategoryController::class,'GetSubCategory']);
Route::get('/sub-subcategory/ajax/{subcategory_id}',[SubSubCategoryController::class,'GetSubSubCategory']);
}); 
//End Admin Category Controller



?>