<?php 
namespace App\Actions\Admin\Subcategory;

use Carbon\Carbon;
use App\Models\SubCategory;
use App\Http\Requests\Subcategory\CreateSubCategoryRequest;

Class DeleteSubcategory {

    public function handle($id): Bool
    {
        $subcategory = SubCategory::findOrFail($id)->delete();

        return $subcategory;
    }

}

?>