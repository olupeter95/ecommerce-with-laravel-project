<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\Admin;
use App\Models\Product;
use App\Models\MultiImage;
use Auth;
use Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function index(){
        $id = Auth::id();
        $admins = Admin::find($id);
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('admin.product.add',compact('admins','categories','brands'));
    }

    public function addProduct(Request $request){
        $validateData =$request->validate([
            'brand_id'=>'required',
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'subsubcategory_id'=>'required',
            'product_name_en'=>'required',
            'product_name_fr'=>'required',
            'product_code'=>'required',
            'product_qty'=>'required',
            'product_tags_en'=>'required',
            'product_tags_fr'=>'required',
            'product_size_en'=>'required',
            'product_size_fr'=>'required',
            'product_color_en'=>'required',
            'product_color_fr'=>'required',
            'selling_price'=>'required',
            'product_thumbnail'=>'required',
            'photo_name'=>'required',
            'short_desc_en'=>'required',
            'short_desc_fr'=>'required',
            'description_en'=>'required',
            'description_fr'=>'required',
        ]);

        $file = $request->file('product_thumbnail');
        $img = Image::make($file);
        $img->resize(917,1000);
        $name = $file->getClientOriginalName();
        $img->save('storage/upload/product/thumbnail/'.$name);

        $prdouct_id = Product::insertGetId([
            'brand_id'=>$request->brand_id,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'subsubcategory_id'=>$request->subsubcategory_id,
            'product_name_en'=>$request->product_name_en,
            'product_name_fr'=>$request->product_name_fr,
            'product_slug_en'=> strtolower(str_replace(" ","-",$request->product_name_en)),
            'product_slug_fr'=>strtolower(str_replace(" ","-",$request->product_name_fr)),
            'product_code'=>$request->product_code,
            'product_qty'=>$request->product_qty,
            'product_tags_en'=>$request->product_tags_en,
            'product_tags_fr'=>$request->product_tags_fr,
            'product_size_en'=>$request->product_size_en,
            'product_size_fr'=>$request->product_size_fr,
            'product_color_en'=>$request->product_color_en,
            'product_color_fr'=>$request->product_color_fr,
            'selling_price'=>$request->selling_price,
            'discount_price'=>$request->discount_price,
            'short_desc_en'=>$request->short_desc_en,
            'short_desc_fr'=>$request->short_desc_fr,
            'description_en'=>$request->description_en,
            'description_fr'=>$request->description_fr,
            'product_thumbnail'=>$name,
            'featured'=>$request->featured,
            'hot_deals'=>$request->hot_deals,
            'special_offer'=>$request->special_offer,
            'special_deals'=>$request->special_deals,
            'status'=>1,
            'created_at' => Carbon::now(), 
        ]);

        ////// Multiple Image upload //////
        $files = $request->file('photo_name');
        foreach($files as $imgs){
            $imgs = Image::make($file);
            $imgs->resize(917,1000);
            $names = $file->getClientOriginalName();
            $imgs->save('storage/upload/product/image/'.$name);

            MultiImage::insert([
                'product_id'=>$prdouct_id,
                'photo_name'=>$names,
                'created_at' => Carbon::now(),
            ]);
        }
        

        ////// End Multiple Image upload //////

        $notification = array(
            'message' => 'product added successfully',
            'alert-type'=> 'success'
         );
         return redirect()->route('view.product')->with($notification);

    }

    public function viewProduct(){
        $id = Auth::id();
        $admins = Admin::find($id);
        $product = Product::latest()->get();
        return view('admin.product.view',compact('product','admins'));
    }

    public function editProduct($id){
        $aid = Auth::id();
        $admins = Admin::find($aid);
        $products = Product::findorFail($id);
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        return view('admin.product.edit',compact('admins','products','brands','categories','subcategories',
        'subsubcategories'));
    }


    
}
