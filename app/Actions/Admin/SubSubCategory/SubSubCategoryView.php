<?php 

namespace App\Actions\Admin\SubSubCategory;

use App\Models\Admin;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Support\Facades\Auth;

class SubSubCategoryView 
{
    public function handle()
    {
        $id = Auth::id();
        $admin = Admin::find($id);
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();
        $category = Category::all();
        return view('admin.subsubcategory.index',compact('admin','subcategory','category','subsubcategory'));
    }
}
