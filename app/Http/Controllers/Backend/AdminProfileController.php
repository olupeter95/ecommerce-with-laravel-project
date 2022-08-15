<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Actions\Admin\Profile\UpdateProfile;
use App\Actions\Admin\Profile\ChangePassword;
use App\Http\Requests\AdminProfile\UpdateAdminRequest;
use App\Http\Requests\AdminProfile\ChangePasswordRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
class AdminProfileController extends Controller
{
    /**
     * Undocumented function
     *
     * @param int $id
     * @return View|Factory
     */
    public function profile(int $id): View|Factory
    {
        $admin = Admin::find($id);
        return view('admin.pages.profile',compact('admin'));
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @return View|Factory
     */
    public function profileEdit(int $id): View|Factory
    {
        $admin = Admin::find($id);
        return view('admin.pages.profile_edit',compact('admin'));
    }
    
    /**
     * Undocumented function
     *
     * @param UpdateAdminRequest $request
     * @param int $id
     * @param UpdateProfile $updateProfile
     * @return Redirector|RedirectResponse
     */
    public function profileUpdate(
        UpdateAdminRequest $request, 
        int $id, 
        UpdateProfile $updateProfile
    ):  Redirector|RedirectResponse
    {
        $updateProfile->handle($request, $id); 
        $notification = [
            'message' => 'brand update successfully',
            'alert-type'=> 'success'
        ];
            
        
        return redirect()->route('admin.profile',[$id])->with($notification);
        
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @return View|Factory
     */
    public function passwordChange(int $id): View|Factory
    {
        $admin = Admin::find($id);
        return view('admin.admin_changepwd',compact('admin'));
    }

    /**
     * Undocumented function
     *
     * @param ChangePasswordRequest $request
     * @param int $id
     * @param ChangePassword $changePassword
     * @return Redirector|RedirectResponse
     */
    public function newPwd(
        ChangePasswordRequest $request, 
        int $id, 
        ChangePassword $changePassword
    ):  Redirector|RedirectResponse
    {
       $changePassword->handle($request, $id);
       Auth::logout();
       return redirect()->route('admin.logout');
    }
}
