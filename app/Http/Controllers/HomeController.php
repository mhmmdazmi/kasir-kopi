<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function tentang()
    {
        return view('dashboards.tentang');
    }

    public function sejarah()
    {
        return view('dashboards.sejarah');
    }
    public function layanan()
    {
        return view('dashboards.layanan');
    }

    public function contact()
    {
        return view('contact.contact');
    }

    public function login()
    {
        return view('layout.login');
    }
}
