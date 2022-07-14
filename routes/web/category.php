<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;



//Admin Category Controller
Route::prefix('category')->group(function(){
    Route::get('/all',[CategoryController::class, 'index'])->name('all.category')->middleware('auth:admin');
    Route::post('/add',[CategoryController::class,'create'])->name('add.category');
    Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('edit.category')->middleware('auth:admin');
    Route::post('/update',[CategoryController::class,'update'])->name('update.category');
    Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('delete.category')->middleware('auth:admin');


}); 
//End Admin Category Controller



?>