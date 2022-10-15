<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Actions\Frontend\User\AddWishList;
use App\Actions\Frontend\User\ViewWishList;
use App\Actions\Frontend\User\RemoveWishList;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('addWishList');
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param int $id
     * @param AddWishList $addWishList
     * @return JsonResponse
     */
    public function addWishList(
        Request $request,
        int $id,
        AddWishList $addWishList
    ): JsonResponse
    {
        return $addWishList->handle($request, $id);
    }

    /**
     * Undocumented function
     *
     * @return View|Factory
     */
    public function wishlistIndex(): View|Factory
    {
        return view('layouts.pages.wishlist');
    }

    /**
     * Undocumented function
     *
     * @param ViewWishList $viewWishList
     * @return JsonResponse
     */
    public function wishListProduct(ViewWishList $viewWishList): JsonResponse
    {
        return $viewWishList->handle();
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @param RemoveWishList $removeWishList
     * @return JsonResponse
     */
    public function removeWishList(
        int $id,
        RemoveWishList $removeWishList
    ): JsonResponse
    {
        return $removeWishList->handle($id);
        
    }
}
