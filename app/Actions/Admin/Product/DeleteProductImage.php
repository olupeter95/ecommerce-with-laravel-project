<?php

namespace App\Actions\Admin\Product;

use App\Models\MultiImage;
use Illuminate\Support\Facades\Storage;
class DeleteProductImage 
{
    public function handle($id): bool 
    {
        $oldImg = MultiImage::findorFail($id);
        Storage::delete('public/product/image/'.$oldImg->photo_name);
        return MultiImage::findorFail($id)->delete();
    }
}