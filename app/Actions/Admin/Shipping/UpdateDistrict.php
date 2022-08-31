<?php

namespace App\Actions\Admin\Shipping;

use Carbon\Carbon;
use App\Models\District;
use Illuminate\Http\Request;

class UpdateDistrict
{
    public function handle(Request $request): bool
    {
        $id = $request->id;
        return District::findorFail($id)->update([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);
    }
}