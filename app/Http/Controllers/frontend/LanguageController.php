<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;

class LanguageController extends Controller
{
    /**
     * Undocumented function
     *
     * @return Redirector|RedirectResponse
     */
    public function english(): Redirector|RedirectResponse
    {

        Session::get('language');
        Session::forget('language');
        Session::put('language', 'english');
        return redirect()->back();
    }

    /**
     * Undocumented function
     *
     * @return Redirector|RedirectResponse
     */
    public function french(): Redirector|RedirectResponse
    {
        Session::get('language');
        Session::forget('language');
        Session::put('language', 'french');
        return redirect()->back();
    }
}
