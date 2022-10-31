<?php

namespace App\Actions\Admin\Reports;

use DateTime;
use App\Models\Admin;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchByDate
{
    public function handle(Request $request)
    {
        $id = Auth::id();
        $admin = Admin::findorFail($id);
        $date = new DateTime($request->date);
        $formatDate = $date->format('d F Y');
        $orders = Order::where('order_date', $formatDate)->latest()->get();
        return view('admin.report.report_view', compact('orders','admin'));
    }
}