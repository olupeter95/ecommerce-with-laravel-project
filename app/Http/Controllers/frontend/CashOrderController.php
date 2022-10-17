<?php

namespace App\Http\Controllers\Frontend;

use App\Actions\Frontend\Payment\CashOrder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CashOrderController extends Controller
{
    public function cashOrder(
        Request $request,
        CashOrder $cashOrder
    )
    {
        $cashOrder->handle($request);
        $notification = [
			'message' => 'Order Placed Successfully',
			'alert-type'=> 'success',
		];
		return redirect()->route('home')->with($notification);
    }
}
