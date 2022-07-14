<?php

namespace App\Http\Controllers;

use App\Actions\Admin\SubSubCategory\GetSubCategory;
use App\Actions\Admin\SubSubCategory\GetSubSubCategory;
use App\Actions\Admin\SubSubCategory\EditSubSubCategory;
use App\Actions\Admin\SubSubCategory\SubSubCategoryView;
use App\Actions\Admin\SubSubCategory\CreateSubSubCategory;
use App\Actions\Admin\SubSubCategory\DeleteSubSubCategory;
use App\Actions\Admin\SubSubCategory\UpdateSubSubCategory;
use App\Http\Requests\SubSubCategory\SubSubCategoryRequest;

class SubSubCategoryController extends Controller
{
    //
    public function index(SubSubCategoryView  $subSubCategoryView)
    {
        $view = $subSubCategoryView->handle();
        return $view;
    }

    public function create(SubSubCategoryRequest $request, CreateSubSubCategory $createSubSubCategory)
    {
        $createSubSubCategory->handle($request);
        $notification = array(
           'message' => 'Sub Subcategory added successfully',
           'alert-type'=> 'success'
        );
        return redirect()->back()->with($notification);
    }
   
   public function edit($id, EditSubSubCategory $editSubSubCategory)
   {
        $edit = $editSubSubCategory->handle($id);
        return $edit;
   }

    public function update(SubSubCategoryRequest $request, UpdateSubSubCategory $updateSubSubCategory)
    {
            $updateSubSubCategory->handle($request);
            $notification = array(
            'message' => 'Subcategory updated successfully',
            'alert-type'=> 'success'
            );
            return redirect()->route('all.subsubcategory')->with($notification);
   }

    public function delete($id, DeleteSubSubCategory $deleteSubSubCategory)
    {
            $deleteSubSubCategory->handle($id);
            $notification = array(
            'message' => 'category deleted successfully',
            'alert-type'=> 'error'
        );
        return redirect()->back()->with($notification);
  }

    public function GetSubCategory($category_id,GetSubCategory $getSubCategory )
    {
        $getsubcat = $getSubCategory->handle($category_id);
        return $getsubcat;
    }

    public function GetSubSubCategory($subcategory_id, GetSubSubCategory $getSubSubCategory)
    {
        $getsubsubcat = $getSubSubCategory->handle($subcategory_id);
        return $getsubsubcat;
    }

}
