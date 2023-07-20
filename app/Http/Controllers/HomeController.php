<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    function index()
    {
        $pageTitle = 'Home';

        return view('home', ['pageTitle' => $pageTitle]);
    }

    function product(){
        $products = Product::all();
       
        return view( 'welcome', compact( 'products' ) );
        
    }
}
