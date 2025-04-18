<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    public function latarBelakang()
    {
        return view('pages.latarbelakang');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
