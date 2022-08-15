<?php

namespace App\Actions\Frontend\Cart;

use Gloudemans\Shoppingcart\Facades\Cart;

class RemoveMiniCart
{
    public function handle($rowId)
    {
       Cart::remove($rowId);
       return response()->json(['success'=>'Product removed from cart']);
    }

}