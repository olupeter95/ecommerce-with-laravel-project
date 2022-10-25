<?php

namespace App\Actions\Admin\Orders;

use App\Models\Order;

class PendingToConfirm
{
    public function handle($id)
    {
        Order::findorFail($id)->update([
            'status' => 'confirmed'
        ]);
        $notification = [
            'message' => 'Order Confirmed successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('pending-orders')->with($notification);
    }
}