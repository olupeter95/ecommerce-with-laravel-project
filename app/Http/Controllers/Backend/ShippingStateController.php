<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Actions\Admin\Shipping\EditState;
use App\Actions\Admin\Shipping\ViewState;
use App\Actions\Admin\Shipping\CreateState;
use App\Actions\Admin\Shipping\DeleteState;
use App\Actions\Admin\Shipping\GetDistrict;
use App\Actions\Admin\Shipping\GetState;
use App\Actions\Admin\Shipping\UpdateState;

class ShippingStateController extends Controller
{
    /**
     * Undocumented function
     *
     * @param int $division_id
     * @param GetDistrict $getDistrict
     * @return string|false
     */
    public function getDistrict(
        int $division_id,
        GetDistrict $getDistrict
    ): string|false
    {
        return $getDistrict->handle($division_id);
    }

    /**
     * Undocumented function
     *
     * @param int $district_id
     * @param GetState $getState
     * @return string|false
     */
    public function getState(
        int $district_id,
        GetState $getState
    ): string|false
    {
       return $getState->handle($district_id);
    }

    public function viewState(ViewState $viewState)
    {
       return $viewState->handle();
    }

    
    /**
     * Undocumented function
     *
     * @param Request $request
     * @param CreateState $createState
     * @return Redirector|RedirectResponse
     */
    public function addState(
        Request $request,
        CreateState $createState
    ): Redirector|RedirectResponse
    {
        $createState->handle($request);
        $notfication = [
            'message' => 'Shipping State Created Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notfication);
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @param EditState $editState
     * @return void
     */
    public function editState(
        int $id,
        EditState $editState
    )
    {
        return $editState->handle($id);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param UpdateState $updateState
     * @return void
     */
    public function updateState(
        Request $request,
        UpdateState $updateState
    )
    {
        $updateState->handle($request);
        $notification = [
            'message' => 'Shipping State Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('manage-state')->with($notification);
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @param DeleteState $deleteState
     * @return Redirector|RedirectResponse
     */
    public function deleteState(
        int $id,
        DeleteState $deleteState
    ): Redirector|RedirectResponse
    {
        $deleteState->handle($id);
        $notification = [
            'message' => 'Shipping State Deleted Successfully',
            'alert-type' => 'error',
        ];
        return redirect()->back()->with($notification);
    }
}
