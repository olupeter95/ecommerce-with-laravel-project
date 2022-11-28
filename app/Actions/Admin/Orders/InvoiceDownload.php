<?php

namespace App\Actions\Admin\Orders;

use App\Models\Order;
use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade\Pdf;


class InvoiceDownload
{
    public function handle($id)
    {
        $order = Order::with('division', 'district', 'state', 'user')
        ->where('id', $id)->orderBy('id', 'DESC')->first(); 
        $orderItem = OrderItem::with('product')->where('order_id', $id)->get();
        $pdf = Pdf::loadView('admin.order.order_invoice', compact('order', 'orderItem'))
        ->setPaper('a4')->setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
        ]);
        //dd($pdf);
        return $pdf->download('invoice.pdf');
    }
}