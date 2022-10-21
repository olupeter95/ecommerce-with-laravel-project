<?php

namespace App\Actions\Admin\Orders;

use App\Models\Admin;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class PendingOrders
{
    public function handle()
    {
        $id = Auth::id();
        $admin = Admin::find($id);
        $orders = Order::where('status','pending')->orderBy('id','DESC')->get();
        return view('admin.order.pending_orders', compact('admin', 'orders'));
    }
}