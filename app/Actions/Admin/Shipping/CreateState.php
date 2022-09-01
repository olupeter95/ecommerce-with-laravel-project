<?php

namespace App\Actions\Admin\Shipping;

use App\Models\State;
use Illuminate\Http\Request;

class CreateState
{
    public function handle(Request $request)
    {
        return State::insert([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
        ]);
    }
}