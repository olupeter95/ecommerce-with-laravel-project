<?php

namespace App\Actions\Admin\Shipping;

use App\Models\District;

class DeleteDistrict
{
    public function handle($id)
    {
        return District::findorFail($id)->delete();
    }
}