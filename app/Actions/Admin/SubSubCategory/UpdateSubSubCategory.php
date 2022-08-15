<?php

namespace App\Actions\Admin\SubSubCategory;

use Carbon\Carbon;
use App\Models\SubSubCategory;
use App\Http\Requests\SubSubCategory\SubSubCategoryRequest;

class UpdateSubSubCategory 
{
    public function handle(SubSubCategoryRequest $request): bool 
    {
        $id = $request->id;
        return SubSubCategory::find($id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_fr' => $request->subsubcategory_name_fr,
            'subsubcategory_slug_en'=>strtolower(str_replace('', '_', $request->subsubcategory_name_en)),
            'subsubcategory_slug_fr'=>strtolower(str_replace('', '_', $request->subsubcategory_name_fr)),
            'created_at'=> Carbon::now(),
        ]);
    }
}
