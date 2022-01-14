<?php

namespace App\Http\Controllers;

use App\InShoppingCart;
use App\Product;
use App\ShoppingCart;
use Illuminate\Http\Request;

class InShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shopping_cart_id = \Session::get('shopping_cart_id');

        $shopping_cart = ShoppingCart::findOrCreateBySessionId($shopping_cart_id);
        
        $carrito = InShoppingCart::create([
            'product_id' => $request->producto_id,
            'shopping_cart_id' => $shopping_cart->id,
            'quantity' => $request->quantity

         ]);

        if(false){
            return redirect('/carrito');

        }else{
            return back();
         }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shopping_cart_id = \Session::get('shopping_cart_id');

        $shopping_cart = ShoppingCart::findOrCreateBySessionId($shopping_cart_id);
        
        $carrito = InShoppingCart::findOrFail($id);
        $carrito->delete();

        // dd(InShoppingCart::select('id')->where('shopping_cart_id','=',"$shopping_cart->id" and 'product_id','=','$id'));
        return back();
    }
}
