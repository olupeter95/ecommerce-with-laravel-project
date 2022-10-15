<?php

namespace App\Actions\Frontend\Cart;

use App\Models\Shipping;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class ViewCheckout
{
    public function handle()
    {
        if (Auth::check()) {
            if (Cart::total() > 0) {
                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();
                $divisions = Shipping::latest()->get();
                return view('layouts.pages.checkout', compact('carts', 'cartQty', 'cartTotal', 'divisions'));
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