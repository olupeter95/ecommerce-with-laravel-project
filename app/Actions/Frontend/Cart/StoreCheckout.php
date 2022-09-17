<?php

namespace App\Actions\Frontend\Cart;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class StoreCheckout
{
    public function handle(Request $request)
    {
        $data = $request->all();
         $cartTotal = Cart::total();
        if ($request->payment_method == 'stripe') {
            return view('layouts.payment.stripe', compact('data', 'cartTotal'));
            } else if ($request->payment_method == 'stripe') {
            return view('layouts.payment.card', compact('data', 'cartTotal'));
        }
        return view('layouts.payment.cash', compact('data', 'cartTotal'));
    }
}