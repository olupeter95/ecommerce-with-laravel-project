<?php

namespace App\Actions\Admin\Orders;

use App\Models\Order;

class ConfirmToProcessing
{
    public function handle($id)
    {
        Order::findorFail($id)->update([
            'status' => 'processing'
        ]);
        $notification = [
            'message' => 'Order Processed successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('confirmed-orders')->with($notification);
    }
}