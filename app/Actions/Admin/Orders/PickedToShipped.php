<?php

namespace App\Actions\Admin\Orders;

use App\Models\Order;

class PickedToShipped
{
    public function handle($id)
    {
        Order::findorFail($id)->update([
            'status' => 'shipped'
        ]);
        $notification = [
            'message' => 'Order Shipped Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('picked-orders')->with($notification);
    }
}