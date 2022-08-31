<?php

namespace App\Actions\Admin\Shipping;

use App\Models\Admin;
use App\Models\Shipping;
use Illuminate\Support\Facades\Auth;

class ViewDivision
{
    public function handle()
    {
        $id = Auth::id();
        $admin = Admin::find($id);
        $ships = Shipping::latest()->get();
        return view('admin.shipping.division.index', compact('admin', 'ships'));
    }
}