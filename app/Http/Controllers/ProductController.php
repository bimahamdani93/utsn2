<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
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
        $categories = Category::all();
        return view( 'product.create', compact( 'categories' ) );
    }

    /**
    *  save data products
    */

    public function store( Request $request ) {
        $products = new Product;
        $products->nama_barang = $request[ 'nama_barang' ];
        $products->harga = $request[ 'harga' ];
        $products->stok = $request[ 'stok' ];
        $products->category_id = $request[ 'category_id' ];

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
            'categories' => Category::all(),
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
        $product->category_id = $request->category_id;

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