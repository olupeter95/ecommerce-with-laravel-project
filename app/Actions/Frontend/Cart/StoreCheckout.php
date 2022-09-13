<?php

namespace App\Actions\Frontend\Cart;

use Illuminate\Http\Request;

class StoreCheckout
{
    public function handle(Request $request)
    {
        $data = $request->except('_token');
        if ($request->payment_method == 'stripe') {
            return view('layouts.payment.stripe', compact('data'));
        } else if ($request->payment_method == 'stripe') {
            return view('layouts.payment.card', compact('data'));
        }
        return view('layouts.payment.cash', compact('data'));
    }
}