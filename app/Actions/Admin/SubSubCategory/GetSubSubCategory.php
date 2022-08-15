<?php 

namespace App\Actions\Admin\SubSubCategory;

use App\Models\SubSubCategory;
class GetSubSubCategory 
{
    public function handle($subcategory_id)
    {
        $subsubcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy(
            'subsubcategory_name_en','ASC')->get();
        return json_encode($subsubcat);
    }
}