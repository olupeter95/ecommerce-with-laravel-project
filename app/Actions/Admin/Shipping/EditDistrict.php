<?php

namespace App\Actions\Admin\Shipping;

use App\Models\Admin;
use App\Models\District;
use App\Models\Shipping;
use Illuminate\Support\Facades\Auth;

class EditDistrict
{
    public function handle($id)
    {
        $adminId = Auth::id();
        $admin = Admin::findorFail($adminId);
        $divisions = Shipping::latest()->get();
        $district = District::findorFail($id);
        return view('admin.shipping.district.edit_district', compact('admin', 'divisions', 'district'));
    }
}