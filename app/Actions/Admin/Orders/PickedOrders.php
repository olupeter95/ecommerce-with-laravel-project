<?php

namespace App\Actions\Admin\Orders;

use App\Models\Admin;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class PickedOrders
{
    public function handle()
    {
        $id = Auth::id();
        $admin = Admin::find($id);
        $orders = Order::where('status','picked')->orderBy('id','DESC')->get();
        return view('admin.order.picked_orders', compact('admin', 'orders'));
    }
}