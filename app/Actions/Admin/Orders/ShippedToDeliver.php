<?php

namespace App\Actions\Admin\Orders;

use App\Models\Order;

class ShippedToDeliver
{
    public function handle($id)
    {
        Order::findorFail($id)->update([
            'status' => 'delivered'
        ]);
        $notification = [
            'message' => 'Order Delivered Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('shipped-orders')->with($notification);
    }
}