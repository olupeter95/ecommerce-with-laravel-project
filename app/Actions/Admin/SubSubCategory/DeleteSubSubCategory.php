<?php 
namespace App\Actions\Admin\SubSubCategory;

use App\Models\SubSubCategory;

class DeleteSubSubCategory 
{
    public function handle($id): Bool 
    {
        $subsubcategory = SubSubCategory::findOrFail($id)->delete();
        return $subsubcategory;
    }
}
?>