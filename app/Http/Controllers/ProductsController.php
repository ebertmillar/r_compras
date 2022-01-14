<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormValidationRequest;
use App\Product;
use App\Supermarket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $marketName = $request->get('producto');
        $productName = $request->get('producto');

        $products = Product::productName($productName)->get();


        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $markets = Supermarket::orderBy('supermarket','asc')->get();
        return view('products.create', ['markets' => $markets]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( FormValidationRequest $request)
    {
        
        $products = new Product;
        $products->producto =  $request->producto;
        $products->descripcion = $request->descripcion;
        $products->precio = $request->precio;
        $products->supermarket_id = $request->supermercado;
        $products->user_id = Auth::user()->id;
        $products->save();

        return redirect(route('productos.create'))->with('mensaje', 'El producto se ha registrado : '.$products->producto);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $product = Product::findOrFail($id);
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $markets = Supermarket::orderBy('supermarket','asc')->get();
        $product = Product::findOrFail($id);
        return view('products.edit', ['product' => $product, 'markets' => $markets]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormValidationRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->producto =  $request->producto;
        $product->descripcion = $request->descripcion;
        $product->precio = $request->precio;
        $product->supermarket_id = $request->supermercado;

        $product->update();

        return redirect(route('productos.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
