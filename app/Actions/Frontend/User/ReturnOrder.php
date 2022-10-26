<?php

namespace App\Actions\Frontend\User;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;


class ReturnOrder
{
    public function handle(Request $request)
    {
        $id = $request->id;
        Order::findorFail($id)->update([
            'return_date' => Carbon::now(),
            'return_reason' => $request->return_reason,
        ]);
        $notification = [
            'message' => 'Return Order Completed',
            'alert-type' => 'success',
        ];
        return redirect()->route('my-orders')->with($notification);
    }
}