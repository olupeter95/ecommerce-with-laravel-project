<?php

namespace App\Actions\Admin\Shipping;

use App\Models\Admin;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditDivision
{
    public function handle($id)
    {
        $adminId = Auth::id();
        $admin = Admin::findorFail($adminId);
        $ship = Shipping::findorFail($id);
        return view('admin.shipping.edit_division', compact('admin', 'ship')); 
    }
}