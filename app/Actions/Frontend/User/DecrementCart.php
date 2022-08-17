<?php

namespace App\Actions\Frontend\User;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\JsonResponse;

class DecrementCart
{
    /**
     * Undocumented function
     *
     * @param [type] $rowId
     * @return JsonResponse
     */
    public function handle($rowId): JsonResponse
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);
        return response()->json(['decrement']);
    }
}