<?php

namespace App\Actions\Frontend\User;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CancelOrder
{
    public function handle()
    {
        $orders = Order::where('user_id', Auth::id())
        ->where('status', 'cancelled')->orderBy('id', 'DESC')->get(); 
        $user = Auth::user();
        return view('layouts.order.cancelled_order', compact('orders', 'user'));
    }
}