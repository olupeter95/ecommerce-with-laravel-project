<?php

namespace App\Actions\Frontend\User;

use Carbon\Carbon;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AddWishList
{
    public function handle(Request $request, $id)
    {
        if(Auth::check()){

            $exist = Wishlist::where('user_id',Auth::id())->where('product_id',$id)->first();
            if($exist){
                return response()->json(['error'=>'Product already added to wishlist']);     
            }else{
                Wishlist::insert([
                    'user_id'=> Auth::id(),
                    'product_id'=> $id,
                    'created_at'=> Carbon::now()
                ]);
                return response()->json(['success'=>'Wishlist added successfully']); 
            }
           

        }else{
            return response()->json(['error'=>'user not logged in']);   
        }
    }
}