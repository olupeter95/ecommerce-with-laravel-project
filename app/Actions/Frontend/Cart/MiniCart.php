<?php

namespace App\Actions\Frontend\Cart;

use Gloudemans\Shoppingcart\Facades\Cart;
class MiniCart
{
    public function handle()
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