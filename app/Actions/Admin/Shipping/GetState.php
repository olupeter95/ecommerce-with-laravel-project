<?php

namespace App\Actions\Admin\Shipping;

use App\Models\State;

class GetState
{
    public function handle($district_id)
    {
        $state = State::where('district_id', $district_id)
        ->orderBy('state_name', 'ASC')->get();
        return json_encode($state);
    }
}