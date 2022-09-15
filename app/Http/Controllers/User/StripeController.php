<?php

namespace App\Http\Controllers\User;

use App\Actions\Frontend\Payment\StripeOrder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function stripeOrder(
        request $request,
        StripeOrder $stripeOrder
    )
    {
        return $stripeOrder->handle($request);   
    }
}
