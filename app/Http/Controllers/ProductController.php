<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\Admin\Product\EditProduct;
use App\Actions\Admin\Product\ProductView;
use App\Actions\Admin\Product\ProductIndex;
use App\Actions\Admin\Product\CreateProduct;
use App\Actions\Admin\Product\DeleteProduct;
use App\Actions\Admin\Product\ProductActive;
use App\Actions\Admin\Product\ProductDetails;
use App\Actions\Admin\Product\ProductInactive;
use App\Actions\Admin\Product\UpdateProductData;
use App\Actions\Admin\Product\DeleteProductImage;
use App\Actions\Admin\Product\UpdateProductImage;
use App\Http\Requests\Product\CreateProductRequest;
use App\Actions\Admin\Product\UpdateProductThumbnail;
use App\Http\Requests\Product\UpdateProductDataRequest;



class ProductController extends Controller
{
    public function index(ProductIndex $productIndex)
    {
       $view = $productIndex->handle();
       return $view;
    }

    public function addProduct(CreateProductRequest $request, CreateProduct $createProduct)
    {
        $createProduct->handle($request);
        $notification = array(
            'message' => 'product added successfully',
            'alert-type'=> 'success'
         );
         return redirect()->route('view.product')->with($notification);

    }

    public function viewProduct(ProductView $productView)
    {
       $view = $productView->handle();
       return $view;
    }

    public function editProduct($id,EditProduct $editProduct)
    {
       $edit = $editProduct->handle($id);
       return $edit;
    }


    public function updateProductData(UpdateProductDataRequest $request, UpdateProductData $updateProductData)
    {
        $updateProductData->handle($request);
        $notification = array(
            'message' => 'product data updated successfully',
            'alert-type'=> 'success'
         );
         return redirect()->route('view.product')->with($notification);
        
    }

    public function updateProductImg(Request $request, UpdateProductImage $updateProductImage)
    {
        $updateProductImage->handle($request);
        $notification = array(
            'message' => 'product image updated successfully',
            'alert-type'=> 'success'
         );
         return redirect()->back()->with($notification);
    }

    public function updateProductThumbnail(Request $request, UpdateProductThumbnail $updateProductThumbnail)
    {
        $updateProductThumbnail->handle($request);
        $notification = array(
            'message' => 'product thumbnail updated successfully',
            'alert-type'=> 'success'
         );
         return redirect()->back()->with($notification);    
    }
   public function delMulImgProduct($id, DeleteProductImage $deleteProductImage)
   {
       $deleteProductImage->handle($id);
       $notification = array(
            'message' => 'product Image deleted successfully',
            'alert-type'=> 'success'
         );
         return redirect()->back()->with($notification);  
   }

   public function ProductInactive($id, ProductInactive $productInactive)
   {
        $inactive = $productInactive->handle($id);
        return $inactive;
   }

   public function ProductActive($id, ProductActive $productActive)
   {
        $active = $productActive->handle($id);
        return $active;
   }

   public function productDetails($id, ProductDetails $productDetails)
   {
        $details = $productDetails->handle($id);
        return $details;
   }

   public function delProduct($id, DeleteProduct $deleteProduct)
   {
        $deleteProduct->handle($id);
        $notification = array(
            'message' => 'Product deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
   }
}
