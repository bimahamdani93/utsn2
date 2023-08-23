<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class RegisterController extends Controller {
    function index() {
        $pageTitle = 'Register';
        $categories = Category::all();

        return view( 'register', compact('categories'), [ 'pageTitle' => $pageTitle ] );
    }

    function store( Request $request ) {
        $validatedData = $request->validate( [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'category_id' => 'required'
        ] );

        User::create( $validatedData );
        return redirect( '/login' )->with( 'success', 'Berhasil Terkirim.' );
    }
}
