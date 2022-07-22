<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\CartController;

Route::post('/product/add/cart/{id}', [CartController::class, 'AddCart']);
Route::get('/product/mini/cart', [CartController::class, 'MiniCart']);
Route::get('/remove/product/minicart/{rowId}', [CartController::class, 'RemoveMiniCart']);

?>