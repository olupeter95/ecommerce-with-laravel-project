<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SliderController;

//Admin slider route///
Route::prefix('slider')->group(function(){
    Route::get('/manage',[SliderController::class,'viewSlider'])->name('view.slider')->middleware('auth:admin');
    Route::post('/store',[SliderController::class,'storeSlider'])->name('store.slider');
    Route::get('/edit/{id}',[SliderController::class,'editSlider'])->name('edit.slider')->middleware('auth:admin');
    Route::get('/delete/{id}',[SliderController::class,'delSlider'])->name('delete.slider');
    Route::post('/update',[SliderController::class,'updateSlider'])->name('update.slider');
    Route::get('/inactive/{id}',[SliderController::class,'inactiveSlider'])->name('slider.inactive');
    Route::get('/active/{id}',[SliderController::class,'activeSlider'])->name('slider.active');
});
/////end slider route///

?>