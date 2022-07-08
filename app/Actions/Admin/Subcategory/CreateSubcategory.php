<?php 
namespace App\Actions\Admin\Subcategory;

use Carbon\Carbon;
use App\Models\SubCategory;
use App\Http\Requests\Subcategory\CreateSubCategoryRequest;

Class CreateSubcategory {

    public function handle(CreateSubCategoryRequest $request): Bool
    {
        $subcategory = SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_fr' => $request->subcategory_name_fr,
            'subcategory_slug_en'=>strtolower(str_replace('','_',$request->subcategory_name_en)),
            'subcategory_slug_fr'=>strtolower(str_replace('','_',$request->subcategory_name_fr)),
            'created_at'=> Carbon::now()
        ]);

        return $subcategory;
    }

}






















?>