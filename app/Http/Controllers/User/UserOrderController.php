<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Frontend\User\ViewOrder;
use App\Actions\Frontend\User\CancelOrder;
use App\Actions\Frontend\User\ReturnOrder;
use App\Actions\Frontend\User\OrderDetails;
use App\Actions\Frontend\User\OrderDownload;
use App\Actions\Frontend\User\ViewReturnedOrder;

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

    /**
     * Undocumented function
     *
     * @param int $order_id
     * @param OrderDownload $orderDownload
     * @return void
     */
    public function orderInvoice(
        int $order_id,
        OrderDownload $orderDownload
    )
    {
        return $orderDownload->handle($order_id);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param ReturnOrder $returnOrder
     * @return void
     */
    public function returnOrder(
        Request $request,
        ReturnOrder $returnOrder
    )
    {
        return $returnOrder->handle($request);
    }

    /**
     * Undocumented function
     *
     * @param ViewReturnedOrder $viewReturnedOrder
     * @return void
     */
    public function viewReturnOrder(ViewReturnedOrder $viewReturnedOrder)
    {
        return $viewReturnedOrder->handle();
    }

    public function cancelOrders(CancelOrder $cancelOrder)
    {
        return $cancelOrder->handle();
    }
}
