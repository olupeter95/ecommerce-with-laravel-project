<?php

namespace App\Actions\Admin\Shipping;

use Carbon\Carbon;
use App\Models\Shipping;
use Illuminate\Http\Request;

class CreateDivision
{
    public function handle(Request $request)
    {
        return Shipping::insert([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);
    }
}