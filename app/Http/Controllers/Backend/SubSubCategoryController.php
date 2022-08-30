<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Actions\Admin\SubSubCategory\GetSubCategory;
use App\Actions\Admin\SubSubCategory\GetSubSubCategory;
use App\Actions\Admin\SubSubCategory\EditSubSubCategory;
use App\Actions\Admin\SubSubCategory\SubSubCategoryView;
use App\Actions\Admin\SubSubCategory\CreateSubSubCategory;
use App\Actions\Admin\SubSubCategory\DeleteSubSubCategory;
use App\Actions\Admin\SubSubCategory\UpdateSubSubCategory;
use App\Http\Requests\SubSubCategory\SubSubCategoryRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;

class SubSubCategoryController extends Controller
{
    /**
     * View admin subsubcatery page
     *
     * @param SubSubCategoryView $subSubCategoryView
     * @return View|Factory
     */
    public function index(SubSubCategoryView $subSubCategoryView):View|Factory
    {
        return $subSubCategoryView->handle();
    }

    /**
     * Undocumented function
     *
     * @param SubSubCategoryRequest $request
     * @param CreateSubSubCategory $createSubSubCategory
     * @return Redirector|RedirectResponse
     */
    public function create(
        SubSubCategoryRequest $request,
        CreateSubSubCategory $createSubSubCategory
    ):  Redirector|RedirectResponse
    {
        $createSubSubCategory->handle($request);
        $notification = [
            'message' => 'Sub Subcategory added successfully',
            'alert-type'=> 'success',
        ];
        return redirect()->back()->with($notification);
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @param EditSubSubCategory $editSubSubCategory
     * @return View|Factory
     */
    public function edit(
        int $id,
        EditSubSubCategory $editSubSubCategory
    ):  View|Factory
    {
        return $editSubSubCategory->handle($id);
    }

    /**
     * Undocumented function
     *
     * @param SubSubCategoryRequest $request
     * @param UpdateSubSubCategory $updateSubSubCategory
     * @return Redirector|RedirectResponse
     */
    public function update(
        SubSubCategoryRequest $request,
        UpdateSubSubCategory $updateSubSubCategory
    ): Redirector|RedirectResponse
    {
        $updateSubSubCategory->handle($request);
        $notification = [
            'message' => 'Subcategory updated successfully',
            'alert-type'=> 'success',
        ];
        return redirect()->route('all.subsubcategory')->with($notification);
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @param DeleteSubSubCategory $deleteSubSubCategory
     * @return Redirector|RedirectResponse
     */
    public function delete(
        int $id,
        DeleteSubSubCategory $deleteSubSubCategory
    ): Redirector|RedirectResponse
    {
        $deleteSubSubCategory->handle($id);
        $notification = [
            'message' => 'category deleted successfully',
            'alert-type'=> 'error',
        ];
        return redirect()->back()->with($notification);
    }

    /**
     * Undocumented function
     *
     * @param int $category_id
     * @param GetSubCategory $getSubCategory
     * @return string|false
     */
    public function getSubCategory(
        int $category_id,
        GetSubCategory $getSubCategory
    ): string|false
    {
        return $getSubCategory->handle($category_id);
    }

    /**
     * Undocumented function
     *
     * @param int $subcategory_id
     * @param GetSubSubCategory $getSubSubCategory
     * @return string|false
     */
    public function getSubSubCategory(
        int $subcategory_id,
        GetSubSubCategory $getSubSubCategory
    ): string|false
    {
        return $getSubSubCategory->handle($subcategory_id);
    }

}
