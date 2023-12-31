<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller {

    public function index() {
        if ( auth()->user()->role !== 'admin' ) {
            return redirect()->route( 'welcome' )->with( 'message', 'Anda bukan admin' );
        }

        $transactions = Transaction::all();
        return view( 'transaction.index', compact( 'transactions' ) );
    }
}
