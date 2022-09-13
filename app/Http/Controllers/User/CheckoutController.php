<?php

namespace App\Http\Controllers\User;

use App\Actions\Admin\Shipping\GetDistrict;
use App\Actions\Frontend\Cart\StoreCheckout;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function storeCheckout(
        Request $request,
        StoreCheckout $storeCheckout
    )
    {
        return $storeCheckout->handle($request);
    }
}
