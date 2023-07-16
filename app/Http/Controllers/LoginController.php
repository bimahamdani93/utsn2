<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        $pageTitle = 'Login';

        return view('login', ['pageTitle' => $pageTitle]);
    }

    public function login(request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 'admin') {
                $request->session()->regenerate();
                return redirect()->intended('employees');
            } else {
                $request->session()->regenerate();
                return redirect()->intended('welcome');
            }
        }

        return back()->with('loginError', 'login failed');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function index()
    {
        $pageTitle = 'Login';

        return view('login', ['pageTitle' => $pageTitle]);
    }
}
