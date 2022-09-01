<?php

namespace App\Actions\Admin\Shipping;

use App\Models\State;

class DeleteState
{
    public function handle($id)
    {
        return State::findorFail($id)->delete();
    }
}