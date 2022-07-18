<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\LanguageController;

////All frontend route /////
Route::get('/language/english',[LanguageController::class, 'English'])->name('english.language');
Route::get('/language/french',[LanguageController::class, 'French'])->name('french.language');
////End All frontend route /////


?>