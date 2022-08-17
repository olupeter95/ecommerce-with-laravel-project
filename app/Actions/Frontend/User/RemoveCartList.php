<?php

namespace App\Actions\Frontend\User;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;

class RemoveCartList
{
    public function handle($id): JsonResponse|ResponseFactory
    {
        Cart::remove($id);
        return response()->json(['success', 'Product removed from cart']);
    }
}