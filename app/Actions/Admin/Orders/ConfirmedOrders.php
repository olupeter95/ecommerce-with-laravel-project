<?php

namespace App\Actions\Admin\Orders;

use App\Models\Admin;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class ConfirmedOrders
{
    public function handle()
    {
        $id = Auth::id();
        $admin = Admin::find($id);
        $orders = Order::where('status','confirmed')->orderBy('id','DESC')->get();
        return view('admin.order.confirmed_orders', compact('admin', 'orders'));
    }
}