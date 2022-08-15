<?php

namespace App\Actions\Admin\Subcategory;

use App\Models\SubCategory;
class DeleteSubcategory
{
    public function handle($id): bool
    {
        return SubCategory::findOrFail($id)->delete();
    }
}