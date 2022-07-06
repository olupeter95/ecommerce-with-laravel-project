<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Actions\Admin\Category\CreateCategory;
use App\Actions\Admin\Category\DeleteCategory;
use App\Actions\Admin\Category\UpdateCategory;
use App\Http\Requests\category\StoreCategoryRequest;

class CategoryController extends Controller
{
     public function index(){
        $id = Auth::id();
        $admins = Admin::find($id);
        $category = Category::latest()->get();
        return view('admin.category.index',compact('admins','category'));
    }

    public function add(StoreCategoryRequest $request, CreateCategory $createCategory){
        $createCategory->handle($request);
         $notification = array(
           'message' => 'category added successfully',
           'alert-type'=> 'success'
        );
        return redirect()->back()->with($notification);
   }
   
   public function edit($id){
    $aid = Auth::id();
    $admins = Admin::find($aid);
    $category = Category::find($id);
   return view('admin.category.edit',compact('category','admins'));
}

public function update(StoreCategoryRequest $request, UpdateCategory $updateCategory){
   $updateCategory->handle($request); 
    $notification = array(
       'message' => 'category updated successfully',
       'alert-type'=> 'success'
    );
    return redirect()->route('all.category')->with($notification);
}

public function delete($id,DeleteCategory $deleteCategory){
    $deleteCategory->handle($id);
    $notification = array(
      'message' => 'category deleted successfully',
      'alert-type'=> 'error'
   );
   return redirect()->back()->with($notification);
  }

}
