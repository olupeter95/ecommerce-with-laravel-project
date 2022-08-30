<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Actions\Admin\Subcategory\EditSubCategory;
use App\Actions\Admin\Subcategory\SubCategoryView;
use App\Actions\Admin\Subcategory\CreateSubcategory;
use App\Actions\Admin\Subcategory\DeleteSubcategory;
use App\Actions\Admin\Subcategory\UpdateSubcategory;
use App\Http\Requests\Subcategory\CreateSubCategoryRequest;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

class SubCategoryController extends Controller
{
    /**
     * Undocumented function
     *
     * @param SubCategoryView $subCategoryView
     * @return View|Factory
     */
    public function index(SubCategoryView $subCategoryView): View|Factory
    {
        return $subCategoryView->handle();
    }

    /**
     * Undocumented function
     *
     * @param CreateSubCategoryRequest $request
     * @param CreateSubcategory $subCategory
     * @return Redirector|RedirectResponse
     */
    public function create(
        CreateSubCategoryRequest $request,
        CreateSubcategory $subCategory
    ):  Redirector|RedirectResponse
    {
        $subCategory->handle($request);
        $notification = [
            'message' => 'Subcategory added successfully',
            'alert-type'=> 'success'
        ];
        return redirect()->back()->with($notification);
    }
    
    /**
     * Undocumented function
     *
     * @param int $id
     * @param EditSubCategory $editSubCategory
     * @return View|Factory
     */
    public function edit(
        int $id,
        EditSubCategory $editSubCategory
    ):  View|Factory
    {
        return $editSubCategory->handle($id);
    }
 
    /**
     * Undocumented function
     *
     * @param CreateSubCategoryRequest $request
     * @param UpdateSubcategory $updateSubcategory
     * @return Redirector|RedirectResponse
     */
    public function update(
        CreateSubCategoryRequest $request,
        UpdateSubcategory $updateSubcategory
    ):  Redirector|RedirectResponse
    {
        $updateSubcategory->handle($request);
        $notification = [
            'message' => 'Subcategory updated successfully',
            'alert-type'=> 'success',
        ];
        return redirect()->route('all.subcategory')->with($notification);
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @param DeleteSubcategory $deleteSubcategory
     * @return Redirector|RedirectResponse
     */
    public function delete(
        int $id,
        DeleteSubcategory $deleteSubcategory
    ):  Redirector|RedirectResponse
    {
        $deleteSubcategory->handle($id);
        $notification = [
            'message' => 'category deleted successfully',
            'alert-type'=> 'error',
        ];
        return redirect()->back()->with($notification);
    }

}
