<?php

namespace App\Actions\Admin\Shipping;

use App\Models\Admin;
use App\Models\State;
use App\Models\District;
use App\Models\Shipping;
use Illuminate\Support\Facades\Auth;

class viewState
{
    public function handle()
    {
        $id = Auth::id();
        $admin = Admin::findorFail($id);
        $divisions = Shipping::latest()->get();
        $districts = District::latest()->get();
        $states = State::latest()->get();
        return view('admin.shipping.state.index', compact('admin', 'divisions', 'districts', 'states'));
    }
}