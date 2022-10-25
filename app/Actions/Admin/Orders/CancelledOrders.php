<?php

namespace App\Actions\Admin\Orders;

use App\Models\Admin;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CancelledOrders
{
    public function handle()
    {
        $id = Auth::id();
        $admin = Admin::find($id);
        $orders = Order::where('status','cancelled')->orderBy('id','DESC')->get();
        return view('admin.order.cancelled_orders', compact('admin', 'orders'));
    }
}