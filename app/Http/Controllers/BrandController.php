<?php

namespace App\Http\Controllers;

use App\Actions\Admin\Brand\BrandView;
use App\Actions\Admin\Brand\EditBrand;
use App\Actions\Admin\Brand\CreateBrand;
use App\Actions\Admin\Brand\DeleteBrand;
use App\Actions\Admin\Brand\UpdateBrand;
use App\Http\Requests\Brand\storeBrandRequest;


class BrandController extends Controller
{
    public function index(BrandView $brandView){
       $view = $brandView->handle();
       return $view; 
    }

   public function create(storeBrandRequest $request, CreateBrand $createBrand){
        $createBrand->handle($request);
        $notification = array(
            'message' => 'Brand Added Successfully',
            'alert-type'=> 'success'
         );
        return redirect()->back()->with($notification);
   } 

   public function edit($id, EditBrand $editBrand){
       $edit = $editBrand->handle($id);
       return $edit;
   }

    public function update(storeBrandRequest $request, UpdateBrand $updateBrand){
     $updateBrand->handle($request);
     $notification = array(
        'message' => 'Brand Updated Successfully',
        'alert-type'=> 'success'
     );
     return redirect()->route('all.brand')->with($notification);
    }

   public function delete($id, DeleteBrand $deleteBrand){
      $deleteBrand->handle($id);
      $notification = array(
        'message' => 'brand deleted successfully',
        'alert-type'=> 'error'
     );
     return redirect()->back()->with($notification);
    }

}
