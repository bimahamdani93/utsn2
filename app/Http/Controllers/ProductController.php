<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller {

    public function __construct() {
        $this->middleware( 'auth' );
    }

    /**
    *  show all product
    */

    public function index() {
        $products = Product::all();
        if ( Auth::user()->role == 'admin' ) {
            return view( 'product.index', compact( 'products' ) );
        } else {
            return view( 'product', compact( 'products' ) );
        }
    }

    /**
    *  show Specific product
    */

    public function show( $id ) {
        return view( 'product.show', [
            'product' => Product::find( $id ),
        ] );
    }

    /**
    *  Show the form for creating data products
    */

    public function create() {
        return view( 'product.create' );
    }

    /**
    *  save data products
    */

    public function store( Request $request ) {
        $products = new Product;
        $products->nama_barang = $request[ 'nama_barang' ];
        $products->harga = $request[ 'harga' ];
        $products->stok = $request[ 'stok' ];

        if ( $request->hasFile( 'foto' ) ) {
            $file = $request->file( 'foto' );
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move( 'uploads/products/', $filename );
            $products->foto = $filename;
        }

        $products->save();

        return redirect( '/products' )->with( 'success', 'Product created successfully.' );
    }

    /**
    * edit data products
    */

    public function edit( $id ) {
        return view( 'product.edit', [
            'product' => Product::find( $id ),
        ] );
    }

    /**
    * Update data products
    */

    public function update( Request $request, $id ) {
        $product = Product::find( $id );
        $product->nama_barang = $request->nama_barang;
        $product->harga = $request->harga;
        $product->stok = $request->stok;

        if ( $request->hasFile( 'foto' ) ) {
            $destination = 'uploads/products/'.$product->foto;

            if ( File::exists( $destination ) ) {
                File::delete( $destination );
            }

            $file = $request->file( 'foto' );
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move( 'uploads/products/', $filename );
            $product->foto = $filename;
        }

        $product->update();

        return redirect( '/products' )->with( 'success', 'Product updated successfully.' );
    }

    /**
    * Remove data product
    */

    public function destroy( $id ) {
        $product = Product::find( $id );
        $destination = 'uploads/products/'.$product->foto;
        if ( File::exists( $destination ) ) {
            File::delete( $destination );
        }
        $product->delete();
        return redirect()->back()->with( 'success', 'Product deleted successfully.' );
    }
}