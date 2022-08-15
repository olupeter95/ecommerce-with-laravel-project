<?php

namespace App\Actions\Admin\Subcategory;

use App\Models\Admin;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;

class EditSubCategory
{
    public function handle($id)
    {
        $aid = Auth::id();
        $admin = Admin::find($aid);
        $category = Category::all();
        $subcategory = SubCategory::find($id);
        return view(
            'admin.subcategory.edit', compact('category', 'admin', 'subcategory'));
    }
}
