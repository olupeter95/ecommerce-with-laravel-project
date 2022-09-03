<?php

namespace App\Actions\Frontend\Cart;

use Carbon\Carbon;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class ApplyCoupon
{
    public function handle(Request $request)
    {
        $coupon = Coupon::where('coupon_name', $request->coupon_name)
        ->where('coupon_validity', '>=',Carbon::now()->format('Y-m-d'))->first();
        if($coupon){
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100),
            ]);
            return response()->json([
                'success' => 'Coupon Applied Successfully',
            ]);
        }
        return response()->json(['error' => 'Invalid Coupon']);
    }
}