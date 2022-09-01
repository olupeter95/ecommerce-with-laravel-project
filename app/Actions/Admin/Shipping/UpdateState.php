<?php

namespace App\Actions\Admin\Shipping;

use Carbon\Carbon;
use App\Models\State;
use Illuminate\Http\Request;

class UpdateState
{
    public function handle(Request $request): bool
    {
        $id = $request->id;
        return State::findorFail($id)->update([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'created_at' => Carbon::now(),
        ]);
    }
}