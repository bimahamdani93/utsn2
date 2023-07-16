<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    function index()
    {
        $pageTitle = 'Register';

        return view('register', ['pageTitle' => $pageTitle]);
    }

    function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            // 'username' => 'required|min:5|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5'
        ]);

        User::create($validatedData);
        return redirect('/login')->with('success', 'Berhasil Terkirim.');
    }
}
