<?php

namespace App\Actions\Admin\Orders;

use App\Models\Admin;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class ShippedOrders
{
    public function handle()
    {
        $id = Auth::id();
        $admin = Admin::find($id);
        $orders = Order::where('status','shipped')->orderBy('id','DESC')->get();
        return view('admin.order.shipped_orders', compact('admin', 'orders'));
    }
}