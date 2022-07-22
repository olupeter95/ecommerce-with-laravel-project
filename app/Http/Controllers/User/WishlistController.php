<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Frontend\User\AddWishList;

class WishlistController extends Controller
{
    public function AddWishList(Request $request, $id, AddWishList $addWishList)
    {
        $add = $addWishList->handle($request, $id);
        return $add;
    }
}
