<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Frontend\Cart\AddCart;
use App\Actions\Frontend\Cart\MiniCart;
use App\Actions\Frontend\Cart\RemoveMiniCart;

class CartController extends Controller
{
    public function AddCart(Request $request, $id, AddCart $addCart)
    {
        $addtocart = $addCart->handle($request, $id);
        return $addtocart;
    }

    public function MiniCart(MiniCart $miniCart)
    {
        $addMiniCart = $miniCart->handle();
        return $addMiniCart;
    }

    public function RemoveMiniCart($rowId, RemoveMiniCart $removeMiniCart)
    {
        $remove = $removeMiniCart->handle($rowId);
        return $remove;
    }
}
