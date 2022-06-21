<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Brand;
use Auth;
use Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


class BrandController extends Controller
{
    public function index(){
        $id = Auth::id();
        $admins = Admin::find($id);
        $brands = Brand::latest()->get();
        return view('admin.brand.index',compact('admins','brands'));
    }

   public function add(Request $request){
        $validateData = $request->validate([
            'brand_name_en'=>'required|max:255',
            'brand_name_fr'=>'required|max:255',
            'brand_image'=>'required|max:2000'
        ],
        [
            'brand_name_en.required'=>'Brand Name En is required',
            'brand_name_en.max'=>'exceed maximum number of character',
            'brand_name_fr.required'=>'Brand Name Fr is required',
            'brand_name_fr.max'=>'exceed maximum number of character',
            'brand_image.required'=>'Brand Image is required',
            'brand_image.mimes'=>'only accept jpg,jpeg and png file type',
            'brand_image.max'=>'Maximum file upload file size, is 2mb',
        ]);
        $file = $request->file('brand_image');
        $img = Image::make($file);
        $img->resize(300,200);
        $name = $file->getClientOriginalName();
        $img->save('storage/upload/brand_image/'.$name);
        
        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_fr' => $request->brand_name_fr,
            'brand_slug_en'=>strtolower(str_replace('','_',$request->brand_name_en)),
            'brand_slug_fr'=>strtolower(str_replace('','_',$request->brand_name_fr)),
            'brand_image' => $name,
            'created_at'=> Carbon::now()
        ]);
        $notification = array(
           'message' => 'brand added successfully',
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

public function update(Request $request){
    $validateData = $request->validate([
        'brand_name_en'=>'required|max:255',
        'brand_name_fr'=>'required|max:255',
    ],
    [
        'brand_name_en.required'=>'Brand Name En is required',
        'brand_name_en.max'=>'exceed maximum number of character',
        'brand_name_fr.required'=>'Brand Name Fr is required',
        'brand_name_fr.max'=>'exceed maximum number of character',    
    ]);    
    
    $id = $request->id;
    $old_image = $request->old_image;
    $file = $request->file('brand_image');
    if($file){
        Storage::delete('/public/upload/brand_image/'.$old_image);
        $img = Image::make($file)->resize(300,200);
        $name = $file->getClientOriginalName();
        $img->save('storage/upload/brand_image/'.$name);
        Brand::find($id)->update([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_fr' => $request->brand_name_fr,
            'brand_slug_en'=>strtolower(str_replace('','_',$request->brand_name_en)),
            'brand_slug_fr'=>strtolower(str_replace('','_',$request->brand_name_fr)),
            'brand_image' => $name,
            'created_at'=> Carbon::now()
        ]);
        $notification = array(
           'message' => 'brand added successfully',
           'alert-type'=> 'success'
        );
        return redirect()->route('all.brand')->with($notification);

    }else{
        Brand::find($id)->update([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_fr' => $request->brand_name_fr,
            'brand_slug_en'=>strtolower(str_replace('','_',$request->brand_name_en)),
            'brand_slug_fr'=>strtolower(str_replace('','_',$request->brand_name_fr)),
            'created_at'=> Carbon::now()
        ]);
        $notification = array(
           'message' => 'brand added successfully',
           'alert-type'=> 'success'
        );
        return redirect()->route('all.brand')->with($notification);
    }

   }

   public function delete($id){
      $brand = Brand::findOrFail($id);
      $img = $brand->brand_image;
      Storage::delete('/public/upload/brand_image/'.$img);
      $brand->delete();
      $notification = array(
        'message' => 'brand deleted successfully',
        'alert-type'=> 'error'
     );
     return redirect()->back()->with($notification);
    }

}
