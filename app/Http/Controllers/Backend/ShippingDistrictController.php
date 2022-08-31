<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Actions\Admin\Shipping\EditDistrict;
use App\Actions\Admin\Shipping\viewDistrict;
use App\Actions\Admin\Shipping\CreateDistrict;
use App\Actions\Admin\Shipping\DeleteDistrict;
use App\Actions\Admin\Shipping\UpdateDistrict;

class ShippingDistrictController extends Controller
{
    public function viewDistrict(ViewDistrict $viewDistrict)
    {
       return $viewDistrict->handle();
    }

    
    /**
     * Undocumented function
     *
     * @param Request $request
     * @param CreateDistrict $createDistrict
     * @return Redirector|RedirectResponse
     */
    public function addDistrict(
        Request $request,
        CreateDistrict $createDistrict
    ): Redirector|RedirectResponse
    {
        $createDistrict->handle($request);
        $notfication = [
            'message' => 'Shipping District Created Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notfication);
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @param EditDistrict $editDistrict
     * @return void
     */
    public function editDistrict(
        int $id,
        EditDistrict $editDistrict
    )
    {
        return $editDistrict->handle($id);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param UpdateDistrict $updateDistrict
     * @return void
     */
    public function updateDistrict(
        Request $request,
        UpdateDistrict $updateDistrict
    )
    {
        $updateDistrict->handle($request);
        $notification = [
            'message' => 'Shipping District Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('manage-district')->with($notification);
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @param DeleteDistrict $deleteDistrict
     * @return Redirector|RedirectResponse
     */
    public function deleteDistrict(
        int $id,
        DeleteDistrict $deleteDistrict
    ): Redirector|RedirectResponse
    {
        $deleteDistrict->handle($id);
        $notification = [
            'message' => 'Shipping District Deleted Successfully',
            'alert-type' => 'danger',
        ];
        return redirect()->back()->with($notification);
    }
}
