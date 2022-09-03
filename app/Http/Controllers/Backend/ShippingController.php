<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Actions\Admin\Shipping\EditDivision;
use App\Actions\Admin\Shipping\ViewDivision;
use App\Actions\Admin\Shipping\CreateDivision;
use App\Actions\Admin\Shipping\DeleteDivision;
use App\Actions\Admin\Shipping\UpdateDivision;

class ShippingController extends Controller
{
    /**
     * Undocumented function
     *
     * @param ViewDivision $viewDivision
     * @return void
     */
    public function viewDivision(ViewDivision $viewDivision)
    {
        return $viewDivision->handle();
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param CreateDivision $createDivision
     * @return Redirector|RedirectResponse
     */
    public function addDivision(
        Request $request,
        CreateDivision $createDivision
    ): Redirector|RedirectResponse
    {
        $createDivision->handle($request);
        $notfication = [
            'message' => 'Shipping Division Created Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notfication);
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @param EditDivision $editDivision
     * @return void
     */
    public function editDivision(
        int $id,
        EditDivision $editDivision
    )
    {
        return $editDivision->handle($id);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param UpdateDivision $updateDivision
     * @return void
     */
    public function updateDivision(
        Request $request,
        UpdateDivision $updateDivision
    )
    {
        $updateDivision->handle($request);
        $notification = [
            'message' => 'Shipping Division Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('manage-division')->with($notification);
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @param DeleteDivision $deleteDivision
     * @return Redirector|RedirectResponse
     */
    public function deleteDivision(
        int $id,
        DeleteDivision $deleteDivision
    ): Redirector|RedirectResponse
    {
        $deleteDivision->handle($id);
        $notification = [
            'message' => 'Shipping Division Deleted Successfully',
            'alert-type' => 'error',
        ];
        return redirect()->back()->with($notification);
    }
}
