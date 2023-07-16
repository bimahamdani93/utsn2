<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller {

    /**
    *  store to cart
    */

    public function store( Product $product, Request $request ) {
        $user_id = Auth::id();
        $product_id = $product->id;

        $existing_cart = Cart::where( 'product_id', $product_id )
        ->where( 'user_id', $user_id )
        ->first();

        if ( $existing_cart == null ) {
            $request->validate( [
                'jumlah' => 'required|gte:1|lte:' . $product->stok,
            ] );

            Cart::create( [
                'user_id' => $user_id,
                'product_id' => $product_id,
                'jumlah' => $request->jumlah,
            ] );
        } else {
            $request->validate( [
                'jumlah' => 'required|gte:1|lte:' . ( $product->stok - $existing_cart->jumlah ),
            ] );

            $existing_cart->update( [
                'jumlah' => $existing_cart->jumlah + $request->jumlah,
            ] );
        }

        return Redirect::route( 'carts.show' );
    }

    /**
    *  show cart
    */

    public function show() {
        $user_id = Auth::id();
        $carts = Cart::where( 'user_id', $user_id )->get();

        return view( 'cart.index', compact( 'carts' ) );
    }

    /**
    *  update amount
    */

    public function update( Request $request, Cart $cart ) {
        $request->validate( [
            'jumlah' => 'required|gte:1|lte:' . $cart->product->stok,
        ] );

        $cart->update( [
            'jumlah' => $request->jumlah,
        ] );

        return Redirect::route( 'carts.show' );
    }

    /**
    *  delete product from cart
    */

    public function destroy( Cart $cart ) {
        $cart->delete();
        return Redirect::back();
    }
}
