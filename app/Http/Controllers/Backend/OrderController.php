<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Admin\Orders\OrderDetails;
use App\Actions\Admin\Orders\PickedOrders;
use App\Actions\Admin\Orders\PendingOrders;
use App\Actions\Admin\Orders\ShippedOrders;
use App\Actions\Admin\Orders\CancelledOrders;
use App\Actions\Admin\Orders\ConfirmedOrders;
use App\Actions\Admin\Orders\DeliveredOrders;
use App\Actions\Admin\Orders\InvoiceDownload;
use App\Actions\Admin\Orders\PickedToShipped;
use App\Actions\Admin\Orders\PendingToConfirm;
use App\Actions\Admin\Orders\ProcessingOrders;
use App\Actions\Admin\Orders\ShippedToDeliver;
use App\Actions\Admin\Orders\DeliveredToCancel;
use App\Actions\Admin\Orders\ProcessingToPicked;
use App\Actions\Admin\Orders\ConfirmToProcessing;


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
     * @param OrderDetails $OrderDetails
     * @return void
     */
    public function orderDetails(
        int $id,
        OrderDetails $OrderDetails
    )
    {
        return $OrderDetails->handle($id);
    }

    /**
     * Undocumented function
     *
     * @param ConfirmedOrders $confirmedOrders
     * @return void
     */
    public function confirmedOrders(ConfirmedOrders $confirmedOrders)
    {
        return $confirmedOrders->handle();
    }

    /**
     * Undocumented function
     *
     * @param ProcessingOrders $processingOrders
     * @return void
     */
    public function processingOrders(ProcessingOrders $processingOrders)
    {
        return $processingOrders->handle();
    }

    /**
     * Undocumented function
     *
     * @param ShippedOrders $shippedOrders
     * @return void
     */
    public function shippedOrders(ShippedOrders $shippedOrders)
    {
        return $shippedOrders->handle();
    }

    /**
     * Undocumented function
     *
     * @param DeliveredOrders $deliveredOrders
     * @return void
     */
    public function deliveredOrders(DeliveredOrders $deliveredOrders)
    {
        return $deliveredOrders->handle();
    }


    /**
     * Undocumented function
     *
     * @param PickedOrders $pickedOrders
     * @return void
     */
    public function pickedorders(PickedOrders $pickedOrders)
    {
        return $pickedOrders->handle();
    }

    /**
     * Undocumented function
     *
     * @param CancelledOrders $cancelledOrders
     * @return void
     */
    public function cancelledOrders(CancelledOrders $cancelledOrders)
    {
        return $cancelledOrders->handle();
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @param PendingToConfirm $pendingToConfirm
     * @return void
     */
    public function pendingToConfirm(
        int $id,
        PendingToConfirm $pendingToConfirm
    )
    {
        return $pendingToConfirm->handle($id);
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @param ConfirmToProcessing $confirmToProcessing
     * @return void
     */
    public function confirmToProcessing(
        int $id,
        ConfirmToProcessing $confirmToProcessing
    )
    {
        return $confirmToProcessing->handle($id);
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @param ProcessingToPicked $processingToPicked
     * @return void
     */
    public function processingToPicked(
        int $id,
        ProcessingToPicked $processingToPicked
    )
    {
        return $processingToPicked->handle($id);
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @param PickedToShipped $pickedToShipped
     * @return void
     */
    public function pickedToShipped(
        int $id,
        PickedToShipped $pickedToShipped
    )
    {
        return $pickedToShipped->handle($id);
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @param ShippedToDeliver $shippedToDeliver
     * @return void
     */
    public function shippedToDeliver(
        int $id,
        ShippedToDeliver $shippedToDeliver
    )
    {
        return $shippedToDeliver->handle($id);
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @param DeliveredToCancel $deliveredToCancel
     * @return void
     */
    public function deliveredToCancel(
        int $id,
        DeliveredToCancel $deliveredToCancel
    )
    {
        return $deliveredToCancel->handle($id);
    }

    public function invoiceDownload(
        int $id,
        InvoiceDownload $invoiceDownload
    )
    {
        return $invoiceDownload->handle($id);
    }
}
