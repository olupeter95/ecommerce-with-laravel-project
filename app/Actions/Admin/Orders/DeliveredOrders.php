<?php

namespace App\Actions\Admin\Orders;

use App\Models\Admin;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class DeliveredOrders
{
    public function handle()
    {
        $id = Auth::id();
        $admin = Admin::find($id);
        $orders = Order::where('status','delivered')->orderBy('id','DESC')->get();
        return view('admin.order.delivered_orders', compact('admin', 'orders'));
    }
}