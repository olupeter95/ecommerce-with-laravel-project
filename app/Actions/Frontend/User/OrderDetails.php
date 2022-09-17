<?php

namespace App\Actions\Frontend\User;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class OrderDetails
{
    public function handle($order_id)
    {
        $order = Order::with('division', 'district', 'state', 'user')
        ->where('id', $order_id)
        ->where('user_id', Auth::id())->orderBy('id', 'DESC')->first(); 
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->get();
        $user = Auth::user();
        return view('layouts.order.order_view_details', compact('order', 'user', 'orderItem'));
    }
}