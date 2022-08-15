<?php

use App\Http\Controllers\Frontend\LanguageController;
use Illuminate\Support\Facades\Route;

Route::get('/language/english', [LanguageController::class, 'english'])->name('english.language');
Route::get('/language/french', [LanguageController::class, 'french'])->name('french.language');



