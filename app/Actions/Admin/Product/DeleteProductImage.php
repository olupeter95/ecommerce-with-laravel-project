<?php 
namespace App\Actions\Admin\Product;

use App\Models\MultiImage;
use Illuminate\Support\Facades\Storage;

class DeleteProductImage 
{
    public function handle($id): Bool 
    {
        $oldImg = MultiImage::findorFail($id);
        Storage::delete('public/product/image/'.$oldImg->photo_name);
        $product =  MultiImage::findorFail($id)->delete();
        return $product;
    }
}
?>