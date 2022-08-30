<?php

namespace App\Http\Controllers\User;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use App\Actions\Frontend\User\ViewCart;
use App\Actions\Frontend\User\DecrementCart;
use App\Actions\Frontend\User\IncrementCart;
use App\Actions\Frontend\User\RemoveCartList;

class CartPageController extends Controller
{
    /**
     * Undocumented function
     *
     * @return View|Factory
     */
    public function myCart(): View|Factory
    {
        return view('layouts.pages.cart');
    }

    public function getCart(ViewCart $viewCart)
    {
        return $viewCart->handle();
    }

    /**
     * Undocumented function
     *
     * @param string $id
     * @param RemoveCartList $removeCartList
     * @return void
     */
    public function removeCartList(
        string $id,
        RemoveCartList $removeCartList
    )
    {
        return $removeCartList->handle($id);
    }

    /**
     * Undocumented function
     *
     * @param string $rowId
     * @param IncrementCart $incrementCart
     * @return void
     */
    public function incrementCart(
        string $rowId,
        IncrementCart $incrementCart
    )
    {
        return $incrementCart->handle($rowId);
    }

    public function decrementCart(
        string $rowId,
        DecrementCart $decrementCart
    )
    {
        return $decrementCart->handle($rowId);
    }
}
