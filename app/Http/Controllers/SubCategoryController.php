<?php

namespace App\Http\Controllers;

use App\Actions\Admin\Subcategory\EditSubCategory;
use App\Actions\Admin\Subcategory\SubCategoryView;
use App\Actions\Admin\Subcategory\CreateSubcategory;
use App\Actions\Admin\Subcategory\DeleteSubcategory;
use App\Actions\Admin\Subcategory\UpdateSubcategory;
use App\Http\Requests\Subcategory\CreateSubCategoryRequest;

class SubCategoryController extends Controller
{
    public function index(SubCategoryView $subCategoryView)
    {
        $view =  $subCategoryView->handle();
        return $view;
    }

    public function create(CreateSubCategoryRequest $request, CreateSubcategory $subCategory)
    {
        $subCategory->handle($request);
        $notification = array(
           'message' => 'Subcategory added successfully',
           'alert-type'=> 'success'
        );
        return redirect()->back()->with($notification);
   }
   
   public function edit($id, EditSubCategory  $editSubCategory)
   {
    $edit = $editSubCategory->handle($id);
    return $edit;
   }

public function update(CreateSubCategoryRequest $request, UpdateSubcategory $updateSubcategory)
{
    $updateSubcategory->handle($request);
    $notification = array(
       'message' => 'Subcategory updated successfully',
       'alert-type'=> 'success'
    );
    return redirect()->route('all.subcategory')->with($notification);
}

public function delete($id, DeleteSubcategory $deleteSubcategory)
{
    $deleteSubcategory->handle($id);
    $notification = array(
      'message' => 'category deleted successfully',
      'alert-type'=> 'error'
   );
   return redirect()->back()->with($notification);
  }

}
