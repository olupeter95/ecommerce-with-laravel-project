<?php

namespace App\Actions\Admin\Shipping;

use App\Models\District;
use Illuminate\Http\Request;

class CreateDistrict
{
    public function handle(Request $request)
    {
        return District::insert([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
        ]);
    }
}