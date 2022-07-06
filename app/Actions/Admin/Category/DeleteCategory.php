<?php
namespace App\Actions\Admin\Category;

use App\Models\Category;

Class DeleteCategory
{
    public function handle($id): Category|Bool
    {
        $category = Category::findOrFail($id)->delete();
        return $category;
    }   
}




?>