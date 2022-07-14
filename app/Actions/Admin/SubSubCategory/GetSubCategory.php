<?php 
namespace App\Actions\Admin\SubSubCategory;

use App\Models\SubCategory;


class GetSubCategory 
{
    public function handle($category_id)
    {
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);
     	
    }
}
?>