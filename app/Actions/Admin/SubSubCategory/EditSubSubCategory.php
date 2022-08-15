<?php 

namespace App\Actions\Admin\SubSubCategory;

use App\Models\Admin;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Support\Facades\Auth;

class EditSubSubCategory 
{
    public function handle($id){
        $aid = Auth::id();
        $admin = Admin::find($aid);
        $category = Category::all();
        $subcategory = SubCategory::all();
        $subsubcategory = SubSubCategory::find($id);
        return view('admin.subsubcategory.edit',compact('category','admin','subcategory','subsubcategory'));
    }
}