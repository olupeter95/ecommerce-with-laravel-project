<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ReportController;

Route::prefix('reports')->group(function () {
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/all', [ReportController::class,'allReports'])->name('all-reports');
        Route::post('/search/by/date', [ReportController::class,'searchByDate'])->name('search-by-date');
        Route::post('/search/by/month', [ReportController::class,'searchByMonth'])->name('search-by-month');
        Route::post('/search/by/year', [ReportController::class,'searchByYear'])->name('search-by-year');
    });
});

