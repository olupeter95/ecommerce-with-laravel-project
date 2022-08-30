<?php

namespace App\Actions\Admin\Coupon;

use App\Models\Admin;
use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;

class ViewCoupon
{
    public function handle()
    {
        $id = Auth::id();
        $admin = Admin::find($id);
        $coupons = Coupon::latest()->get();
        return view('admin.Coupon.index',compact('admin','coupons'));
    }
}