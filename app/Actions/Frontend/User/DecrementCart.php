<?php

namespace App\Actions\Frontend\User;

use App\Models\Coupon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

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

        if (Session::has('coupon')) {

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();

            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100), 
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100)  
            ]);
        }
        return response()->json(['decrement']);
    }
}
