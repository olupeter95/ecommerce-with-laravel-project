<?php

namespace App\Actions\Frontend\User;

use App\Models\Order;
use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class OrderDownload
{
    public function handle($order_id)
    {
        $order = Order::with('division', 'district', 'state', 'user')
        ->where('id', $order_id)
        ->where('user_id', Auth::id())->orderBy('id', 'DESC')->first(); 
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->get();
        $user = Auth::user();
        $pdf = Pdf::loadView('layouts.order.order_invoice', compact('order', 'user', 'orderItem'))
        ->setPaper('a4')->setOptions([
            'tempDir'=> public_path(),
            'chroot'=>public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }
}