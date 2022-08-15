<?php

namespace App\Actions\Admin\SubSubCategory;

use App\Models\SubSubCategory;
class DeleteSubSubCategory
{
    public function handle($id): bool 
    {
        return SubSubCategory::findOrFail($id)->delete();
    }
}