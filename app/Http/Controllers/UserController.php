<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller {
    public function index() {
        if ( auth()->user()->role !== 'admin' ) {
            return redirect()->route( 'welcome' )->with( 'message', 'Anda bukan admin' );
        }

        $users = User::all();
        return view( 'user.index', compact( 'users' ) );
    }
}
