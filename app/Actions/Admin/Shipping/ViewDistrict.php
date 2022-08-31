<?php

namespace App\Actions\Admin\Shipping;

use App\Models\Admin;
use App\Models\District;
use App\Models\Shipping;
use Illuminate\Support\Facades\Auth;

class viewDistrict
{
    public function handle()
    {
        $id = Auth::id();
        $admin = Admin::findorFail($id);
        $divisions = Shipping::latest()->get();
        $districts = District::latest()->get();
        return view('admin.shipping.district.index', compact('admin', 'divisions', 'districts'));
    }
}