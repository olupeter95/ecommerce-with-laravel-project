<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use App\Actions\Admin\Subcategory\CreateSubcategory;
use App\Actions\Admin\Subcategory\DeleteSubcategory;
use App\Actions\Admin\Subcategory\UpdateSubcategory;
use App\Http\Requests\Subcategory\CreateSubCategoryRequest;

class SubCategoryController extends Controller
{
    public function index(){
        $id = Auth::id();
        $admin = Admin::find($id);
        $category = Category::all();
        $subcategory = SubCategory::latest()->get();
        return view('admin.subcategory.index',compact('admin','subcategory','category'));
    }

    public function add(CreateSubCategoryRequest $request, CreateSubcategory $subCategory){
        $subCategory->handle($request);
        $notification = array(
           'message' => 'Subcategory added successfully',
           'alert-type'=> 'success'
        );
        return redirect()->back()->with($notification);
   }
   
   public function edit($id){
    $aid = Auth::id();
    $admin = Admin::find($aid);
    $category = Category::all();
    $subcategory = SubCategory::find($id);
   return view('admin.subcategory.edit',compact('category','admin','subcategory'));
}

public function update(CreateSubCategoryRequest $request, UpdateSubcategory $updateSubcategory){
    $updateSubcategory->handle($request);
    $notification = array(
       'message' => 'Subcategory updated successfully',
       'alert-type'=> 'success'
    );
    return redirect()->route('all.subcategory')->with($notification);
}

public function delete($id, DeleteSubcategory $deleteSubcategory){
    $deleteSubcategory->handle($id);
    $notification = array(
      'message' => 'category deleted successfully',
      'alert-type'=> 'error'
   );
   return redirect()->back()->with($notification);
  }

}
