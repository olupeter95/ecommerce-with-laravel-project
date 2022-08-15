<?php

namespace App\Actions\Admin\Subcategory;

use App\Models\Admin;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
class SubCategoryView
{
    public function handle(){
        $id = Auth::id();
        $admin = Admin::find($id);
        $category = Category::all();
        $subcategory = SubCategory::latest()->get();
        return view(
            'admin.subcategory.index',
            compact('admin', 'subcategory', 'category')
        );
    }
}
