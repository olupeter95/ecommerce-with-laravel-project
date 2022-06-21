<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function English(){

        Session::get('language');
        Session::forget('language');
        Session::put('language','english');
        return redirect()->back();
    }

    public function French(){
        Session::get('language');
        Session::forget('language');
        Session::put('language','french');
        return redirect()->back();
    }
}
