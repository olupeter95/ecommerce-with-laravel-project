<?php

namespace App\Actions\Frontend\User;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class ViewOrder
{
    public function handle()
    {
        $orders = Order::where('user_id', Auth::id())->orderBy('id', 'DESC')->get(); 
        $user = Auth::user();
        return view('layouts.order.order_view', compact('orders', 'user'));
    }
}