<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImage;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use Illuminate\Support\Facades\Auth;
use App\Actions\Admin\Product\CreateProduct;
use App\Actions\Admin\Product\DeleteProduct;
use App\Actions\Admin\Product\UpdateProductData;
use App\Actions\Admin\Product\DeleteProductImage;
use App\Actions\Admin\Product\UpdateProductImage;
use App\Http\Requests\Product\CreateProductRequest;
use App\Actions\Admin\Product\UpdateProductThumbnail;
use App\Http\Requests\Product\UpdateProductDataRequest;



class ProductController extends Controller
{
    public function index(){
        $id = Auth::id();
        $admin = Admin::find($id);
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('admin.product.add',compact('admin','categories','brands'));
    }

    public function addProduct(CreateProductRequest $request, CreateProduct $createProduct){
        $createProduct->handle($request);
        $notification = array(
            'message' => 'product added successfully',
            'alert-type'=> 'success'
         );
         return redirect()->route('view.product')->with($notification);

    }

    public function viewProduct(){
        $id = Auth::id();
        $admin = Admin::find($id);
        $product = Product::latest()->get();
        return view('admin.product.view',compact('product','admin'));
    }

    public function editProduct($id){
        $aid = Auth::id();
        $admin = Admin::find($aid);
        $products = Product::findorFail($id);
        $multiImg = MultiImage::Where('product_id',$id)->get();
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        return view('admin.product.edit',compact('admin','products','brands','categories','subcategories',
        'subsubcategories','multiImg'));
    }


    public function updateProductData(UpdateProductDataRequest $request, UpdateProductData $updateProductData){
        $updateProductData->handle($request);
        $notification = array(
            'message' => 'product data updated successfully',
            'alert-type'=> 'success'
         );
         return redirect()->route('view.product')->with($notification);
        
    }

    public function updateProductImg(Request $request, UpdateProductImage $updateProductImage){
        $updateProductImage->handle($request);
        $notification = array(
            'message' => 'product image updated successfully',
            'alert-type'=> 'success'
         );
         return redirect()->back()->with($notification);
    }

    public function updateProductThumbnail(Request $request, UpdateProductThumbnail $updateProductThumbnail){
        $updateProductThumbnail->handle($request);
        $notification = array(
            'message' => 'product thumbnail updated successfully',
            'alert-type'=> 'success'
         );
         return redirect()->back()->with($notification);    
    }
   public function delMulImgProduct($id, DeleteProductImage $deleteProductImage){
       $deleteProductImage->handle($id);
       $notification = array(
            'message' => 'product Image deleted successfully',
            'alert-type'=> 'success'
         );
         return redirect()->back()->with($notification);  
   }

   public function ProductInactive($id){
        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
        'message' => 'Product Inactive',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
   }

   public function ProductActive($id){
    Product::findOrFail($id)->update(['status' => 1]);
    $notification = array(
       'message' => 'Product Active',
       'alert-type' => 'success'
   );

   return redirect()->back()->with($notification);
   }

   public function productDetails($id){
     $aid = Auth::id();
     $admin = Admin::find($aid);
     $prods = Product::findorFail($id);
     return view('admin.product.product-details',compact('admin','prods'));
   }

   public function delProduct($id, DeleteProduct $deleteProduct){
    $deleteProduct->handle($id);
    $notification = array(
        'message' => 'Product deleted successfully',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);
   }
}
