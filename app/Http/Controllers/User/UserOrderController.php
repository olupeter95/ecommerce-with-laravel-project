<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Frontend\User\ViewOrder;
use App\Actions\Frontend\User\OrderDetails;

class UserOrderController extends Controller
{
    /**
     * view order page
     *
     * @param ViewOrder $viewOrder
     * @return void
     */
    public function myOrders(ViewOrder $viewOrder)
    {
        return $viewOrder->handle();
    }

    /**
     * Undocumented function
     *
     * @param int $order_id
     * @param OrderDetails $orderDetails
     * @return void
     */
    public function orderDetails(
        int $order_id,
        OrderDetails $orderDetails
    )
    {
        return $orderDetails->handle($order_id);
    }

    public function orderInvoice($order_id)
    {
        return view('layouts.order.order_invoice');
    }
}
