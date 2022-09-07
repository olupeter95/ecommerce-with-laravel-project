<?php

namespace App\Actions\Frontend\User;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Session;

class RemoveCartList
{
    public function handle($id): JsonResponse|ResponseFactory
    {
        Cart::remove($id);
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        return response()->json(['success' => 'Product removed from cart']);
    }
}
