<?php 
namespace App\Actions\Frontend\User;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class ViewWishList
{
    public function handle()
    {
        $product = Wishlist::with('product')->where('user_id',Auth::id())->get();
        return response()->json($product);
    }
}
?>