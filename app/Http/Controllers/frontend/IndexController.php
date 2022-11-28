<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Actions\Frontend\HomeView;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Actions\Frontend\User\ViewUser;
use App\Actions\Frontend\User\UpdateUser;
use App\Actions\Frontend\User\UserLogout;
use App\Actions\Frontend\User\UserProfile;
use App\Actions\Frontend\Product\ProductTag;
use App\Actions\Frontend\User\ChangeUserPwd;
use App\Actions\Frontend\User\UpdatePassword;
use App\Http\Requests\User\UpdateUserRequest;
use App\Actions\Frontend\Product\ProductDetails;
use App\Actions\Frontend\Product\ProdSubCategory;
use App\Http\Requests\User\UpdatePasswordRequest;
use App\Actions\Frontend\Product\ModalViewProduct;
use App\Actions\Frontend\Product\ProdSubSubCategory;
use App\Actions\Frontend\User\SearchCategoryProduct;

class IndexController extends Controller
{
    /**
     * Undocumented function
     *
     * @param ViewUser $viewUser
     * @return View|Factory
     */
    public function home(ViewUser $viewUser): View|Factory
    {
        return $viewUser->handle();
    }

    /**
     * Undocumented function
     *
     * @param HomeView $homeView
     * @return View|Factory
     */
    public function index(HomeView $homeView): View|Factory
    {
       return $homeView->handle();
    }

    /**
     * Undocumented function
     *
     * @param UserLogout $userLogout
     * @return RedirectResponse
     */
    public function userLogout(UserLogout $userLogout): RedirectResponse
    {
        return $userLogout->handle();
    }

    /**
     * Undocumented function
     *
     * @param UserProfile $userProfile
     * @return View|Factory
     */
    public function userProfile(UserProfile $userProfile): View|Factory
    {
        return $userProfile->handle();
    }

    /**
     * Undocumented function
     *
     * @param UpdateUserRequest $request
     * @param UpdateUser $updateUser
     * @return Redirector|RedirectResponse
     */
    public function userProfileUpdate(
        UpdateUserRequest $request,
        UpdateUser $updateUser
    ): Redirector|RedirectResponse
    {
        $updateUser->handle($request);
        $notification = [
            'message' => 'User profile updated successfully',
            'alert-type'=> 'success',
        ];
         return redirect()->route('dashboard')->with($notification);
    }

    /**
     * Undocumented function
     *
     * @param ChangeUserPwd $changeUserPwd
     * @return View|Factory
     */
    public function changePassword(ChangeUserPwd $changeUserPwd): View|Factory
    {
       return $changeUserPwd->handle();
    }

    /**
     * Undocumented function
     *
     * @param UpdatePasswordRequest $request
     * @param UpdatePassword $updatePassword
     * @return Redirector|RedirectResponse
     */
    public function updatePassword(
        UpdatePasswordRequest $request,
        UpdatePassword $updatePassword
    ): Redirector|RedirectResponse
    {
        $updatePassword->handle($request);
        Auth::logout();
        return redirect()->route('login');
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @param ProductDetails $productDetails
     * @return View|Factory
     */
    public function prodDetails(
        int $id,
        ProductDetails $productDetails
    ): View|Factory
    {
        return $productDetails->handle($id);
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @param ModalViewProduct $modalViewProduct
     * @return JsonResponse
     */
    public function productModalView(
        int $id,
        ModalViewProduct $modalViewProduct
    ): JsonResponse
    {
        return $modalViewProduct->handle($id);
    }

    /**
     * Undocumented function
     *
     * @param string $tags
     * @param ProductTag $prodTags
     * @return void
     */
    public function prodTags(
        string $tags,
        ProductTag $prodTags
    )
    {
        return $prodTags->handle($tags);
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @param string $slug
     * @param ProdSubCategory $prodSubCategory
     * @return View|Factory
     */
    public function prodSubcat(
        int $id,
        string $slug,
        ProdSubCategory $prodSubCategory
    ): View|Factory
    {
       return $prodSubCategory->handle($id, $slug);
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @param string $slug
     * @param ProdSubSubCategory $prodSubSubCategory
     * @return View|Factory
     */
    public function prodSubSubcat(
        int $id,
        string $slug,
        ProdSubSubCategory $prodSubSubCategory
    ): View|Factory
    {
       return $prodSubSubCategory->handle($id, $slug);
    }

    public function searchProduct(
        Request $request,
        SearchCategoryProduct $searchCategoryProduct
    )
    {
        return $searchCategoryProduct->handle($request);
    }
}
