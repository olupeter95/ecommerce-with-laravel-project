<?php

namespace App\Actions\Frontend\Cart;

use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class viewCheckout
{
    public function handle()
    {
        if (Auth::check()) {
            if (Cart::total() > 0) {
                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();
                return view('layouts.pages.checkout', compact('carts', 'cartQty', 'cartTotal'));
            } else {
                $notification = [
                    'message' => 'Shopping cart is empty add item',
                    'alert-type'=> 'error',
                ];
                return redirect()->route('home')->with($notification);
            }
        } else {
            $notification = [
                'message' => 'You need to login first',
                'alert-type' => 'error',
            ];
            return redirect()->route('login')->with($notification);
        }
        
    }
}