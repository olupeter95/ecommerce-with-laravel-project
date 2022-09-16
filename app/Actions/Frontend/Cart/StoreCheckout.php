<?php

namespace App\Actions\Frontend\Cart;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class StoreCheckout
{
    public function handle(Request $request)
    {
        $data = $request->all();
        // $data['shipping_name'] = $request->shipping_name;
        // $data['shipping_email'] = $request->shipping_email;
        // $data['shipping_phone'] = $request->shipping_phone;
        // $data['postal_code'] = $request->postal_code;
        // $data['division_id'] = $request->division_id;
        // $data['district_id'] = $request->district_id;
        // $data['state_id'] = $request->state_id;
        // $data['notes'] = $request->notes;
        // $data['payment_method'] = $request->payment_method;
         $cartTotal = Cart::total();
        if ($request->payment_method == 'stripe') {
            return view('layouts.payment.stripe', compact('data', 'cartTotal'));
            } else if ($request->payment_method == 'stripe') {
            return view('layouts.payment.card', compact('data', 'cartTotal'));
        }
        return view('layouts.payment.cash', compact('data', 'cartTotal'));
    }
}