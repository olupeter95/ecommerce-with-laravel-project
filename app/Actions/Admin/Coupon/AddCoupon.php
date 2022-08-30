<?php

namespace App\Actions\Admin\Coupon;

use Carbon\Carbon;
use App\Models\Coupon;
use Illuminate\Http\Request;

class AddCoupon
{
    public function handle(Request $request)
    {
        return Coupon::create([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_disc,
            'coupon_validity' => $request->coupon_validity,
            'created_at'=> Carbon::now(),
        ]);

        
    }
}