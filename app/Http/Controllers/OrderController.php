<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use PDF;

class OrderController extends Controller {
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function index() {
        if ( auth()->user()->role !== 'admin' ) {
            return redirect()->route( 'welcome' )->with( 'message', 'Anda bukan admin' );
        }
        $orders = Order::all();

        return view( 'order.index', compact( 'orders' ) );
    }

    public function checkout( Request $request ) {

        $user_id = Auth::id();
        $carts = Cart::where( 'user_id', $user_id )->get();

        if ( $carts == null ) {
            return Redirect::back();
        }

        $orders = new Order;
        $orders->total_harga = $request[ 'total_harga' ];

        $orders->user_id = $user_id;
        $orders->save();

        foreach ( $carts as $cart ) {
            $product = Product::find( $cart->product_id );

            $product->update( [
                'stok' => $product->stok - $cart->jumlah,
            ] );

            Transaction::create( [
                'jumlah' => $cart->jumlah,
                'order_id' => $orders->id,
                'product_id' => $cart->product_id,
            ] );

            $cart->delete();
        }

        return Redirect::route( 'orders.show', $orders );
    }

    public function show( Order $order ) {
        $user = Auth::user();

        if ( $order->user_id == $user->id ) {
            return view( 'order.show', compact( 'order' ) );
        }

    }

    public function update( Request $request, $id ) {
        $order = Order::find( $id );
        $order->nama = $request->nama;
        $order->alamat = $request->alamat;
        $order->no_telepon = $request->no_telepon;

        if ( $request->hasFile( 'bukti_pembayaran' ) ) {
            $file = $request->file( 'bukti_pembayaran' );
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move( 'uploads/bukti/', $filename );
            $order->bukti_pembayaran = $filename;
        }

        $order->update();

        return view( 'order.receipt', compact( 'order' ) );
    }

    public function print() {
        $orders = Order::where( 'user_id', auth()->user()->id )->latest( 'id' )->first();
        return view( 'order.print', compact( 'orders' ) );
    }

    public function cetakOrder() {
        $orders = Order::all();
        if ( !$orders->isEmpty() ) {
            $pdf = PDF::loadView( 'order.printPDF', compact( 'orders' ) );
            return $pdf -> download( 'laporan_data_'.date( 'Y-m-d_H-i-s' ).'.pdf' );
        } else {
            Alert::warning( 'Gagal', 'Data Kosong' );
            return back();
        }
    }


}
