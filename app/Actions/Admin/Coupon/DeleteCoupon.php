<?php

namespace App\Actions\Admin\Coupon;

use App\Models\Coupon;

class DeleteCoupon
{
    public function handle($id)
    {
        return Coupon::findorFail($id)->delete();
    }
}
