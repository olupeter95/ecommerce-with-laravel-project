<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\CartController;

Route::post('/product/add/cart/{id}', [CartController::class, 'AddCart']);

?>