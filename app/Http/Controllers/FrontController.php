<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    function semuaPengaduan() {
        return view('front.semua-pengaduan');
    }

    function semuaStatistik() {
        return view('front.statistik');
    }

    function formPengaduan() {
        return view('front.form-pengaduan');
    }
}
