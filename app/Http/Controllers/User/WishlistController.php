<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Frontend\User\AddWishList;
use App\Actions\Frontend\User\ViewWishList;
use App\Actions\Frontend\User\RemoveWishList;

class WishlistController extends Controller
{
    public function AddWishList(Request $request, $id, AddWishList $addWishList)
    {
        $add = $addWishList->handle($request, $id);
        return $add;
    }

    public function wishlistIndex()
    {
        return view('layouts.pages.wishlist');
    }

    public function wishListProduct(ViewWishList $viewWishList){
        $view = $viewWishList->handle();
        return $view;
    }

    public function removeWishList($id, RemoveWishList $removeWishList){
        $remove = $removeWishList->handle($id);
        return $remove;
    }
}
