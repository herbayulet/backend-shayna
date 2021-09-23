<?php

namespace App\Http\Controllers;

use App\Models\Models\Product;
use App\Models\Models\ProductGallery;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

// use Illuminate\Support\Str;

class ProductController extends Controller
{   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // jika ingin masuk ke product gallery terutama lihat barang harus login dahulu
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Product::all();

        return view('pages.products.index') ->with([
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'type' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|integer',
            'quantity' => 'required|integer'
        ]);

        $data = $request->all();
        // $data['slug'] = Str::slug($request->name);

        Product::create($data);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Product::findOrFail($id);

        return view('pages.products.edit')->with([
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'type' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|integer',
            'quantity' => 'required|integer'
        ]);

        $data = $request->all();
        // $data['slug'] = Str::slug($request->name);
        $item = Product::findOrFail($id);
        $item->update($data);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Product::findOrFail($id);
        $item->delete();

        return redirect()->route('products.index');
    }

    public function gallery (Request $request, $id) 
    {
        $product = Product::findOrFail($id);
        $items = ProductGallery::with('products')
        ->where('products_id', $id)
        ->get();

        return view('pages.products.gallery')->with([
            'product' => $product,
            'items' => $items,
        ]);
    }
}
