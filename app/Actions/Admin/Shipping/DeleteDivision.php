<?php

namespace App\Actions\Admin\Shipping;

use App\Models\Shipping;

class DeleteDivision
{
    public function handle($id)
    {
        return Shipping::findorFail($id)->delete();
    }
}