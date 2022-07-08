<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Support\Facades\Auth;
use App\Actions\Admin\SubSubCategory\CreateSubSubCategory;
use App\Actions\Admin\SubSubCategory\DeleteSubSubCategory;
use App\Actions\Admin\SubSubCategory\UpdateSubSubCategory;
use App\Http\Requests\SubSubCategory\SubSubCategoryRequest;

class SubSubCategoryController extends Controller
{
    //
    public function index(){
        $id = Auth::id();
        $admins = Admin::find($id);
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();
        $category = Category::all();
        return view('admin.subsubcategory.index',compact('admins','subcategory','category','subsubcategory'));
    }

    public function add(SubSubCategoryRequest $request, CreateSubSubCategory $createSubSubCategory){
        $createSubSubCategory->handle($request);
        $notification = array(
           'message' => 'Sub Subcategory added successfully',
           'alert-type'=> 'success'
        );
        return redirect()->back()->with($notification);
   }
   
   public function edit($id){
    $aid = Auth::id();
    $admins = Admin::find($aid);
    $category = Category::all();
    $subcategory = SubCategory::all();
    $subsubcategory = SubSubCategory::find($id);
   return view('admin.subsubcategory.edit',compact('category','admins','subcategory','subsubcategory'));
}

public function update(SubSubCategoryRequest $request, UpdateSubSubCategory $updateSubSubCategory){
    $updateSubSubCategory->handle($request);
    $notification = array(
       'message' => 'Subcategory updated successfully',
       'alert-type'=> 'success'
    );
    return redirect()->route('all.subsubcategory')->with($notification);
}

    public function delete($id, DeleteSubSubCategory $deleteSubSubCategory){
    $deleteSubSubCategory->handle($id);
    $notification = array(
      'message' => 'category deleted successfully',
      'alert-type'=> 'error'
   );
   return redirect()->back()->with($notification);
  }

    public function GetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
     	return json_encode($subcat);
    }

    public function GetSubSubCategory($subcategory_id){
        $subsubcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_en','ASC')->get();
     	return json_encode($subsubcat);
    }

}
