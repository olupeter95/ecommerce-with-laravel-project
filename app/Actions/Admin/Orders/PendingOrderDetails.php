<?php

namespace App\Actions\Admin\Orders;

use App\Models\Admin;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class PendingOrderDetails
{
    public function handle($id)
    {
        $adminId = Auth::id();
        $admin =  Admin::find($adminId);
        $order = Order::with('division', 'district', 'state', 'user')
        ->where('id', $id)->orderBy('id', 'DESC')->first(); 
        $orderItem = OrderItem::with('product')->where('order_id', $id)->get();
        return view('admin.order.pending_order_details', compact('order', 'orderItem', 'admin'));
    }
}