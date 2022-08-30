<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Admin\Coupon\AddCoupon;
use App\Actions\Admin\Coupon\DeleteCoupon;
use App\Actions\Admin\Coupon\EditCoupon;
use App\Actions\Admin\Coupon\ViewCoupon;
use App\Actions\Admin\Coupon\UpdateCoupon;

class CouponController extends Controller
{
    public function index(ViewCoupon $viewCoupon)
    {
        return $viewCoupon->handle();
    }

    public function editCoupon(
        int $id,
        EditCoupon $editCoupon)
    {
        return $editCoupon->handle($id);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param AddCoupon $addCoupon
     * @return void
     */
    public function addCoupon(
        Request $request,
        AddCoupon $addCoupon
    )
    {
        $addCoupon->handle($request);
        $notification = [
            'message' => 'Coupon added successfully',
            'alert-type'=> 'success'
        ];
        return redirect()->back()->with($notification);
        
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param UpdateCoupon $updateCoupon
     * @return void
     */
    public function updateCoupon(
        Request $request,
        UpdateCoupon $updateCoupon
    )
    {
        $updateCoupon->handle($request);
        $notification = [
            'message' => 'Coupon updated successfully',
            'alert-type'=> 'success'
        ];
        return redirect(route('manage.coupon'))->with($notification);   
    }

    public function deleteCoupon(
        int $id,
        DeleteCoupon $deleteCoupon
    )
    {
        $deleteCoupon->handle($id);
        $notification = [
            'message' => 'Coupon updated successfully',
            'alert-type'=> 'success'
        ];
        return redirect(route('manage.coupon'))->with($notification); 
    }
}
