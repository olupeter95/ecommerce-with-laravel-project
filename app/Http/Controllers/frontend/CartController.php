<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Frontend\Cart\AddCart;
use App\Actions\Frontend\Cart\MiniCart;
use App\Actions\Frontend\Cart\RemoveMiniCart;
use Illuminate\Http\JsonResponse;

class CartController extends Controller
{
    /**
     * Undocumented function
     *
     * @param Request $request
     * @param int $id
     * @param AddCart $addCart
     * @return JsonResponse
     */
    public function addCart(
        Request $request, 
        int $id, 
        AddCart $addCart
    ):  JsonResponse
    {
        return $addCart->handle($request, $id);
    }

    /**
     * Undocumented function
     *
     * @param MiniCart $miniCart
     * @return JsonResponse
     */
    public function miniCart(MiniCart $miniCart): JsonResponse
    {
        return $miniCart->handle();
    }

    
    /**
     * Undocumented function
     *
     * @param int $rowId
     * @param RemoveMiniCart $removeMiniCart
     * @return JsonResponse
     */
    public function removeMiniCart(
        int $rowId, 
        RemoveMiniCart $removeMiniCart
    ):  JsonResponse
    {
        return $removeMiniCart->handle($rowId);
    }
}
