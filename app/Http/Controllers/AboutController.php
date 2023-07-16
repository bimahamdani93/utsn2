<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    function index()
    {
        $pageTitle = 'About';

        return view('about', ['pageTitle' => $pageTitle]);
    }
}
