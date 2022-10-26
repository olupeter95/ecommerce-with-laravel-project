<?php

namespace App\Actions\Frontend\User;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class ViewReturnedOrder
{
    public function handle()
    {
        $orders = Order::where('user_id', Auth::id())
        ->where('return_reason','!=', 'null')->orderBy('id', 'DESC')->get(); 
        $user = Auth::user();
        return view('layouts.order.returned_order', compact('orders', 'user'));
    }
}