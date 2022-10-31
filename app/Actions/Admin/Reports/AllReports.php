<?php

namespace App\Actions\Admin\Reports;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AllReports
{
    public function handle()
    {
        $id = Auth::id();
        $admin = Admin::find($id);
        return view('admin.report.all_reports', compact('admin'));       
    }
}
