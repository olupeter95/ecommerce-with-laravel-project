<?php

namespace App\Actions\Admin\Reports;

use App\Models\Admin;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchByMonth
{
    public function handle(Request $request)
    {
        $id = Auth::id();
        $admin = Admin::findorFail($id);
        $orders = Order::where('order_month', $request->month)
        ->where('order_year',$request->year)->latest()->get();
        return view('admin.report.report_view', compact('orders', 'admin'));
    }
}