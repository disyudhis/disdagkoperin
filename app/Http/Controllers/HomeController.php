<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('wub.index');
    }

    public function information()
    {
        return view('wub.informasi');
    }
}
