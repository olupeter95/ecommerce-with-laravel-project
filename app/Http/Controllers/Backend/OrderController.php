<?php

namespace App\Http\Controllers\Backend;

use App\Actions\Admin\Orders\PendingOrderDetails;
use App\Actions\Admin\Orders\PendingOrders;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Undocumented function
     *
     * @param PendingOrders $pendingOrders
     * @return void
     */
    public function pendingOrders(PendingOrders $pendingOrders)
    {
        return $pendingOrders->handle();
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @param PendingOrderDetails $pendingOrderDetails
     * @return void
     */
    public function pendingDetails(
        int $id,
        PendingOrderDetails $pendingOrderDetails
    )
    {
        return $pendingOrderDetails->handle($id);
    }
}
