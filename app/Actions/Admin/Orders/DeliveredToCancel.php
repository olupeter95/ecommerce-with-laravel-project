<?php

namespace App\Actions\Admin\Orders;

use App\Models\Order;

class DeliveredToCancel
{
    public function handle($id)
    {
        Order::findorFail($id)->update([
            'status' => 'cancelled'
        ]);
        $notification = [
            'message' => 'Order Cancelled Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('delivered-orders')->with($notification);
    }
}