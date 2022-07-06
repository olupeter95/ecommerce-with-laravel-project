<?php
namespace App\Actions\Admin\Brand;
 
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;

 
class DeleteBrand
{
    public function handle($id): Brand
    { 
      $brand = Brand::findOrFail($id);
      $img = $brand->brand_image;
      Storage::delete('/public/upload/brand_image/'.$img);
      $brand->delete();
     return $brand;
    }
}