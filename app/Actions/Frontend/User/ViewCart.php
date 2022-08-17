<?php

namespace App\Actions\Frontend\User;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Routing\ResponseFactory;

class ViewCart
{
    public function handle(): JsonResponse|ResponseFactory
    {
        $cart = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        return response()->json([
            'carts'=> $cart,
            'qty'=> $cartQty,
            'total'=> round($cartTotal),
        ]);
    }
}