<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Actions\Admin\Brand\BrandView;
use App\Actions\Admin\Brand\EditBrand;
use App\Actions\Admin\Brand\CreateBrand;
use App\Actions\Admin\Brand\DeleteBrand;
use App\Actions\Admin\Brand\UpdateBrand;
use App\Http\Requests\Brand\storeBrandRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;

class BrandController extends Controller
{
   /**
    * Undocumented function
    *
    * @param BrandView $brandView
    * @return View|Factory
    */
    public function index(BrandView $brandView): View|Factory
    {
       return $brandView->handle();
    }

   /**
    * Undocumented function
    *
    * @param storeBrandRequest $request
    * @param CreateBrand $createBrand
    * @return Redirector|RedirectResponse
    */
   	public function create(
      storeBrandRequest $request, 
      CreateBrand $createBrand
   	): Redirector|RedirectResponse
   	{
         $createBrand->handle($request);
         $notification = [
            'message' => 'Brand Added Successfully',
            'alert-type'=> 'success'
         ];
	   	return redirect()->back()->with($notification);
   	} 

  /**
   * Undocumented function
   *
   * @param int $id
   * @param EditBrand $editBrand
   * @return View|Factory
   */
   	public function edit(
      int $id, 
      EditBrand $editBrand
   	): View|Factory
   	{
         return $editBrand->handle($id);
   	}

   /**
    * Undocumented function
    *
    * @param storeBrandRequest $request
    * @param UpdateBrand $updateBrand
    * @return Redirector|RedirectResponse
    */
   	public function update(
      storeBrandRequest $request, 
      UpdateBrand $updateBrand
   	): Redirector|RedirectResponse
   	{
      	$updateBrand->handle($request);
      	$notification = [
         	'message' => 'Brand Updated Successfully',
         	'alert-type'=> 'success'
      	];
      	return redirect()->route('all.brand')->with($notification);
   	}

   /**
    * Undocumented function
    *
    * @param int $id
    * @param DeleteBrand $deleteBrand
    * @return Redirector|RedirectResponse
    */
   	public function delete(
      int $id, 
      DeleteBrand $deleteBrand
   	): Redirector|RedirectResponse
   	{
      	$deleteBrand->handle($id);
      	$notification = [
			'message' => 'brand deleted successfully',
			'alert-type'=> 'error'
      	];
      	return redirect()->back()->with($notification);
   	}

}
