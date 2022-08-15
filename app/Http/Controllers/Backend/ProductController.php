<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
     /**
     * Undocumented function
     *
     * @param ProductIndex $productIndex
     * @return View|Factory
     */
     public function index(ProductIndex $productIndex): View|Factory
     {
          return $productIndex->handle();
     }

     /**
      * Undocumented function
      *
      * @param CreateProductRequest $request
      * @param CreateProduct $createProduct
      * @return Redirector|RedirectResponse
      */
     public function addProduct(
          CreateProductRequest $request, 
          CreateProduct $createProduct
     ):   Redirector|RedirectResponse
     {
          $createProduct->handle($request);
          $notification = [
               'message' => 'product added successfully',
               'alert-type'=> 'success'
          ];
          return redirect()->route('view.product')->with($notification);

     }

     /**
      * Undocumented function
      *
      * @param ProductView $productView
      * @return View|Factory
      */
     public function viewProduct(
          ProductView $productView
     ):   View|Factory
     {
          return $productView->handle();
     }

     /**
      * Undocumented function
      *
      * @param int $id
      * @param EditProduct $editProduct
      * @return void
      */
     public function editProduct(int $id,EditProduct $editProduct)
     {
          return $editProduct->handle($id);
     }

     /**
      * Undocumented function
      *
      * @param UpdateProductDataRequest $request
      * @param UpdateProductData $updateProductData
      * @return Redirector|RedirectResponse
      */
     public function updateProductData(
          UpdateProductDataRequest $request, 
          UpdateProductData $updateProductData
     ):   Redirector|RedirectResponse
     {
          $updateProductData->handle($request);
          $notification = [
               'message' => 'product data updated successfully',
               'alert-type'=> 'success'
          ];
          return redirect()->route('view.product')->with($notification);
     }


     /**
      * Undocumented function
      *
      * @param Request $request
      * @param UpdateProductImage $updateProductImage
      * @return Redirector|RedirectResponse
      */
     public function updateProductImg(
          Request $request, 
          UpdateProductImage $updateProductImage
     ):   Redirector|RedirectResponse
     {
          $updateProductImage->handle($request);
          $notification = [
               'message' => 'product image updated successfully',
               'alert-type'=> 'success'
          ];
          return redirect()->back()->with($notification);
     }

     /**
      * Undocumented function
      *
      * @param Request $request
      * @param UpdateProductThumbnail $updateProductThumbnail
      * @return Redirector|RedirectResponse
      */
     public function updateProductThumbnail(
          Request $request, 
          UpdateProductThumbnail $updateProductThumbnail
     ):   Redirector|RedirectResponse
     {
          $updateProductThumbnail->handle($request);
          $notification = [
               'message' => 'product thumbnail updated successfully',
               'alert-type' => 'success'
          ];
          return redirect()->back()->with($notification);    
     }

     /**
      * Undocumented function
      *
      * @param int $id
      * @param DeleteProductImage $deleteProductImage
      * @return Redirector|RedirectResponse
      */
     public function delMulImgProduct(
          int $id, 
          DeleteProductImage $deleteProductImage
     ):   Redirector|RedirectResponse
     {
          $deleteProductImage->handle($id);
          $notification = [
               'message' => 'product Image deleted successfully',
               'alert-type' => 'success'
          ];
          return redirect()->back()->with($notification);  
     }

     /**
      * Undocumented function
      *
      * @param int $id
      * @param ProductInactive $productInactive
      * @return Redirector|RedirectResponse
      */
     public function productInactive(
          int $id, 
          ProductInactive $productInactive
     ):   Redirector|RedirectResponse
     {
          return $productInactive->handle($id);

     }

     /**
      * Undocumented function
      *
      * @param int $id
      * @param ProductActive $productActive
      * @return Redirector|RedirectResponse
      */
     public function productActive(
          int $id, 
          ProductActive $productActive
     ):   Redirector|RedirectResponse
     {
          return $productActive->handle($id);
     }

     /**
      * Undocumented function
      *
      * @param int $id
      * @param ProductDetails $productDetails
      * @return View|Factory
      */
     public function productDetails(
          int $id, 
          ProductDetails $productDetails
     ):   View|Factory
     {
          return $productDetails->handle($id);
     }

     /**
      * Undocumented function
      *
      * @param int $id
      * @param DeleteProduct $deleteProduct
      * @return void
      */
     public function delProduct(
          int $id, 
          DeleteProduct $deleteProduct
     )
     {
          $deleteProduct->handle($id);
          $notification = [
              'message' => 'Product deleted successfully',
              'alert-type' => 'success'
          ];
          return redirect()->back()->with($notification);
     }
}
