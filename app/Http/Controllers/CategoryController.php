<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
    
        return view( 'category.index', compact( 'categories' ) );
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view( 'category.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {
        $categories = new Category;
        $categories->nama_kategori = $request[ 'nama_kategori' ];
       
        $categories->save();

        return redirect( '/categories' )->with( 'success', 'Category created successfully.' );
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id ) {
        return view( 'category.edit', [
            'category' => Category::find( $id ),
        ] );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, $id ) {
        $category = Category::find( $id );
        $category->nama_kategori = $request->nama_kategori;
      

        $category->update();

        return redirect( '/categories' )->with( 'success', 'Category updated successfully.' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find( $id );
       
        $category->delete();
        return redirect()->back()->with( 'success', 'Category deleted successfully.' );
    }
}
