<?php

namespace App\Actions\Admin\Coupon;

use App\Models\Coupon;
use Illuminate\Http\Request;

class UpdateCoupon
{
    public function handle(Request $request)
    {
        $id = $request->id;
        return Coupon::findorFail($id)->update([
            'coupon_name' => $request->coupon_name,
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
        ]);
    } 
}