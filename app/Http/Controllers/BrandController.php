<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use App\Actions\Admin\Brand\CreateBrand;
use App\Actions\Admin\Brand\DeleteBrand;
use App\Actions\Admin\Brand\UpdateBrand;
use App\Http\Requests\Brand\storeBrandRequest;


class BrandController extends Controller
{
    public function index(){
        $id = Auth::id();
        $admins = Admin::find($id);
        $brands = Brand::latest()->get();
        return view('admin.brand.index',compact('admins','brands'));
    }

   public function add(storeBrandRequest $request, CreateBrand $createBrand){
        $createBrand->handle($request);
        $notification = array(
            'message' => 'Brand Added Successfully',
            'alert-type'=> 'success'
         );
        return redirect()->back()->with($notification);
   } 

   public function edit($id){
        $aid = Auth::id();
        $admins = Admin::find($aid);
       $brands = Brand::find($id);
       return view('admin.brand.edit',compact('brands','admins'));
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
