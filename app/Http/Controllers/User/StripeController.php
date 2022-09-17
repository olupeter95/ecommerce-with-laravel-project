<?php

namespace App\Http\Controllers\User;

use App\Actions\Frontend\Payment\StripeOrder;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class StripeController extends Controller
{
    /**
     * Undocumented function
     *
     * @param request $request
     * @param StripeOrder $stripeOrder
     * @return Redirector|RedirectResponse
     */
    public function stripeOrder(
        request $request,
        StripeOrder $stripeOrder
    ): Redirector|RedirectResponse
    {
        $stripeOrder->handle($request);  
        $notification = [
			'message' => 'Order Placed Successfully',
			'alert-type'=> 'success',
		];
		return redirect()->route('home')->with($notification);
    }
}
