<?php

namespace App\Http\Controllers;

use App\Actions\Admin\Category\CategoryView;
use App\Models\Admin;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Actions\Admin\Category\CreateCategory;
use App\Actions\Admin\Category\DeleteCategory;
use App\Actions\Admin\Category\EditCategory;
use App\Actions\Admin\Category\UpdateCategory;
use App\Http\Requests\category\StoreCategoryRequest;

class CategoryController extends Controller
{
     public function index(CategoryView $categoryView)
     {
        $view = $categoryView->handle();
        return $view;
    }

    public function create(StoreCategoryRequest $request, CreateCategory $createCategory) 
    {
        $createCategory->handle($request);
         $notification = array(
           'message' => 'category added successfully',
           'alert-type'=> 'success'
        );
        return redirect()->back()->with($notification);
    }
   
   public function edit($id, EditCategory $editCategory)
   {
      $edit = $editCategory->handle($id);
      return $edit;
   }

public function update(StoreCategoryRequest $request, UpdateCategory $updateCategory)
{
   $updateCategory->handle($request); 
    $notification = array(
       'message' => 'category updated successfully',
       'alert-type'=> 'success'
    );
    return redirect()->route('all.category')->with($notification);
}

public function delete($id,DeleteCategory $deleteCategory)
{
    $deleteCategory->handle($id);
    $notification = array(
      'message' => 'category deleted successfully',
      'alert-type'=> 'error'
   );
   return redirect()->back()->with($notification);
  }

}
