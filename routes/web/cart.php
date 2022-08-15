<?php

use App\Http\Controllers\Frontend\CartController;
use Illuminate\Support\Facades\Route;

Route::post('/product/add/cart/{id}', [CartController::class, 'addCart']);
Route::get('/product/mini/cart', [CartController::class, 'miniCart']);
Route::get('/remove/product/minicart/{rowId}', [CartController::class, 'removeMiniCart']);

