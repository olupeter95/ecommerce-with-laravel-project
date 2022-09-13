<?php 

namespace App\Actions\Admin\Shipping;

use App\Models\District;


class GetDistrict 
{
    public function handle($division_id)
    {
        $district = District::where('division_id',$division_id)
        ->orderBy( 'district_name','ASC')->get();
        return json_encode($district);
    }
}