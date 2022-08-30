<?php

namespace App\Actions\Admin\Shipping;

use Carbon\Carbon;
use App\Models\Shipping;
use Illuminate\Http\Request;

class UpdateDivision
{
    public function handle(Request $request): bool
    {
        $id = $request->id;
        return Shipping::findorFail($id)->update([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);
    }
}