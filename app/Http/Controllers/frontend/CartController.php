<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Frontend\Cart\AddCart;

class CartController extends Controller
{
    public function AddCart(Request $request, $id, AddCart $addCart)
    {
        $addtocart = $addCart->handle($request, $id);
        return $addtocart;
    }
}
