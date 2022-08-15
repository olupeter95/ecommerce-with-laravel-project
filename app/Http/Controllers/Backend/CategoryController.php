<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Actions\Admin\Category\CategoryView;
use App\Actions\Admin\Category\EditCategory;
use App\Actions\Admin\Category\CreateCategory;
use App\Actions\Admin\Category\DeleteCategory;
use App\Actions\Admin\Category\UpdateCategory;
use App\Http\Requests\category\StoreCategoryRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
   /**
    * Undocumented function
    *
    * @param CategoryView $categoryView
    * @return View|Factory
    */
   public function index(CategoryView $categoryView): View|Factory
   {
      return $categoryView->handle();
   }

   /**
    * Undocumented function
    *
    * @param StoreCategoryRequest $request
    * @param CreateCategory $createCategory
    * @return Redirector|RedirectResponse
    */
   public function create(
      StoreCategoryRequest $request, 
      CreateCategory $createCategory
   ): Redirector|RedirectResponse 
   {
      $createCategory->handle($request);
      $notification = [
         'message' => 'category added successfully',
         'alert-type'=> 'success'
      ];
      return redirect()->back()->with($notification);
   }

   /**
    * Undocumented function
    *
    * @param int $id
    * @param EditCategory $editCategory
    * @return View|Factory
    */
   public function edit(
      int $id, 
      EditCategory $editCategory
   ): View|Factory
   {
      return $editCategory->handle($id);
   }

   /**
    * Undocumented function
    *
    * @param StoreCategoryRequest $request
    * @param UpdateCategory $updateCategory
    * @return Redirector|RedirectResponse
    */
   public function update(
      StoreCategoryRequest $request, 
      UpdateCategory $updateCategory
   ): Redirector|RedirectResponse
   {
      $updateCategory->handle($request); 
      $notification = [
         'message' => 'category updated successfully',
         'alert-type'=> 'success'
      ];
      return redirect()->route('all.category')->with($notification);
   }

   /**
    * Undocumented function
    *
    * @param int $id
    * @param DeleteCategory $deleteCategory
    * @return Redirector|RedirectResponse
    */
   public function delete(
      int $id,
      DeleteCategory $deleteCategory
   ): Redirector|RedirectResponse
   {
      $deleteCategory->handle($id);
      $notification = [
         'message' => 'category deleted successfully',
         'alert-type'=> 'error'
      ];
      return redirect()->back()->with($notification);
   }

}
