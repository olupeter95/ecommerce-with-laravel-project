<?php

namespace App\Actions\Admin\Orders;

use App\Models\Order;

class ProcessingToPicked
{
    public function handle($id)
    {
        Order::findorFail($id)->update([
            'status' => 'picked'
        ]);
        $notification = [
            'message' => 'Order Picked Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('processing-orders')->with($notification);
    }
}