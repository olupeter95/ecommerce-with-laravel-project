<?php

namespace App\Actions\Admin\Category;

use App\Models\Category;
class DeleteCategory
{
    public function handle($id): bool
    {
        return Category::findOrFail($id)->delete();
    }   
}
