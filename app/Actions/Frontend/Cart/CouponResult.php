<?php

namespace App\Actions\Frontend\Cart;

use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CouponResult
{
    public function handle()
    {
        if(Session::has('coupon')){
            return response()->json([
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ]);
        }
        return response()->json([
            'total' => Cart::total(),
        ]);
    }
}