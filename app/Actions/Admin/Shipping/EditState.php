<?php

namespace App\Actions\Admin\Shipping;

use App\Models\Admin;
use App\Models\State;
use App\Models\District;
use App\Models\Shipping;
use Illuminate\Support\Facades\Auth;

class EditState
{
    public function handle($id)
    {
        $adminId = Auth::id();
        $admin = Admin::findorFail($adminId);
        $divisions = Shipping::latest()->get();
        $districts = District::latest()->get();
        $state = State::findorFail($id);
        return view('admin.shipping.state.edit_state', compact('admin', 'divisions', 'districts', 'state'));
    }
}