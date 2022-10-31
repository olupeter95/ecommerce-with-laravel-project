<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Admin\Reports\AllReports;
use App\Actions\Admin\Reports\SearchByDate;
use App\Actions\Admin\Reports\SearchByMonth;
use App\Actions\Admin\Reports\SearchByYear;

class ReportController extends Controller
{
    public function allReports(AllReports $allReports)
    {
        return $allReports->handle();
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param SearchByDate $searchByDate
     * @return void
     */
    public function searchByDate(
        Request $request,
        SearchByDate $searchByDate)
    {
        return $searchByDate->handle($request);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param SearchByMonth $searchByMonth
     * @return void
     */
    public function searchByMonth(
        Request $request,
        SearchByMonth $searchByMonth
    )
    {
        return $searchByMonth->handle($request);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param SearchByYear $searchByYear
     * @return void
     */
    public function searchByYear(
        Request $request,
        SearchByYear $searchByYear
    )
    {
        return $searchByYear->handle($request);
    }
}
