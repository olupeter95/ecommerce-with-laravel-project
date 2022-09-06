<?php

namespace App\Actions\Frontend\Cart;

use Illuminate\Support\Facades\Session;

class CouponRemove
{
    public function handle()
    {
        Session::Forget('coupon');
        return response()->json(['success' => 'Coupon Removed Successfully']);
    }
}