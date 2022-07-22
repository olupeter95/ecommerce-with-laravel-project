<?php 
namespace App\Actions\Frontend\User;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class RemoveWishList
{
    public function handle($id){
        Wishlist::where('user_id',Auth::id())->Where('id',$id)->delete();
        return response()->json(['success'=>'Product Successfully removed from wishlist']);
    }
}

?>