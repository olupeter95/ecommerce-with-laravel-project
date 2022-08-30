<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Admin\Slider\EditSlider;
use App\Actions\Admin\Slider\ViewSlider;
use App\Actions\Admin\Slider\ActiveSlider;
use App\Actions\Admin\Slider\CreateSlider;
use App\Actions\Admin\Slider\DeleteSlider;
use App\Actions\Admin\Slider\UpdateSlider;
use App\Http\Requests\Slider\SliderRequest;
use App\Actions\Admin\Slider\InactiveSlider;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

class SliderController extends Controller
{
    /**
     * Undocumented function
     *
     * @param ViewSlider $viewSlider
     * @return View|Factory
     */
    public function viewSlider(ViewSlider $viewSlider): View|Factory
    {
        return $viewSlider->handle();
    }

    /**
     * Undocumented function
     *
     * @param SliderRequest $request
     * @param CreateSlider $createSlider
     * @return Redirector|RedirectResponse
     */
    public function storeSlider(
        SliderRequest $request,
        CreateSlider $createSlider
    ):  Redirector|RedirectResponse
    {
        $createSlider->handle($request);
        $notification = [
            'message' => 'Slider added successfully',
            'alert-type'=> 'success'
        ];
        return redirect()->back()->with($notification);
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @param EditSlider $editSlider
     * @return View|Factory
     */
    public function editSlider(
        int $id,
        EditSlider $editSlider
    ):  View|Factory
    {
        return $editSlider->handle($id);
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @param DeleteSlider $deleteSlider
     * @return Redirector|RedirectResponse
     */
    public function delSlider(
        int $id,
        DeleteSlider $deleteSlider
    ): Redirector|RedirectResponse
    {
        $deleteSlider->handle($id);
        $notification = [
            'message' => 'Slider deleted successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param UpdateSlider $updateSlider
     * @return Redirector|RedirectResponse
     */
    public function updateSlider(
        Request $request,
        UpdateSlider $updateSlider
    ): Redirector|RedirectResponse
    {
        $updateSlider->handle($request);
        $notification = [
            'message' => 'Slider Updated Successfully',
            'alert-type'=> 'success',
        ];
        return redirect()->route('view.slider')->with($notification);

    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @param InactiveSlider $inactiveSlider
     * @return RedirectResponse
     */
    public function inactiveSlider(
        int $id,
        InactiveSlider $inactiveSlider
    ):  RedirectResponse
    {
        return $inactiveSlider->handle($id);
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @param ActiveSlider $activeSlider
     * @return RedirectResponse
     */
    public function activeSlider(
        int $id,
        ActiveSlider $activeSlider
    ):  RedirectResponse
    {
        return $activeSlider->handle($id);
    }
}
