<?php

namespace App\Actions\Admin\Coupon;

use App\Models\Admin;
use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;

class EditCoupon
{
    public function handle($id)
    {
        $adminId = Auth::id();
        $admin = Admin::find($adminId);
        $coupon = Coupon::findorFail($id);
        return view('admin.coupon.edit',compact('admin','coupon'));
    }
}