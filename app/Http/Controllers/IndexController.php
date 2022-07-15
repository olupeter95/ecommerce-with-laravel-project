<?php

namespace App\Http\Controllers;

use App\Actions\Frontend\HomeView;
use Illuminate\Support\Facades\Auth;
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


class IndexController extends Controller
{
    //
    public function home(ViewUser $viewUser)
    {
        $view = $viewUser->handle();
        return $view;
    }

    public function index(HomeView $homeView)
    {
       $view = $homeView->handle();
       return $view;
    }

    public function UserLogout(UserLogout $userLogout)
    {
        $Logout = $userLogout->handle(); 
        return $Logout; 
    }

    public function UserProfile(UserProfile $userProfile)
    {
        $profile = $userProfile->handle();
        return $profile;
    }

    public function UserProfileUpdate(UpdateUserRequest $request, UpdateUser $updateUser)
    {
        $updateUser->handle($request);
        $notification = array(
            'message' => 'User profile updated successfully',
            'alert-type'=> 'success'
         );
         return redirect()->route('dashboard')->with($notification);
    }

    public function ChangePassword(ChangeUserPwd $changeUserPwd)
    {
       $changePwd = $changeUserPwd->handle();
       return $changePwd; 
    }

    public function UpdatePassword(UpdatePasswordRequest $request, UpdatePassword $updatePassword)
    {
        $updatePassword->handle($request);
        Auth::logout();
       return redirect()->route('login');
    }

    public function prodDetails($id, ProductDetails $productDetails)
    {
            $prodDetails =  $productDetails->handle($id);
            return $prodDetails;
            
    }

    public function ProductModalView($id, ModalViewProduct $modalViewProduct)
    {
            $modalViewProd = $modalViewProduct->handle($id);
            return $modalViewProd;    
    }

    public function prodTags($tags, ProductTag $prodTags)
    {
        $prodTags = $prodTags->handle($tags);
        return $prodTags;
    }

    public function prodSubcat($id, $slug, ProdSubCategory $prodSubCategory)
    {
        $prodsubcat = $prodSubCategory->handle($id, $slug);
        return $prodsubcat;
    }

    public function prodSubSubcat($id, $slug, ProdSubSubCategory $prodSubSubCategory)
    {
       $prodsubsubcat = $prodSubSubCategory->handle($id, $slug);
       return $prodsubsubcat;
    }
}
