<?php

namespace App\Http\Controllers;

use App\InShoppingCart;
use App\Order;
use App\ShoppingCart;
use Illuminate\Http\Request;

class ShoppingCartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shopping_cart_id = \Session::get('shopping_cart_id');

        $shopping_cart = ShoppingCart::findOrCreateBySessionId($shopping_cart_id);

        $carrito = InShoppingCart::where('shopping_cart_id', '=' ,"$shopping_cart->id")->get();

        // $carrito = $carrto->products()->get();

        $total = $shopping_cart->total();

        return view('shopping_carts.index', [
            'carrito' => $carrito,
            'total' => $total ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pagar(Request $request)
    {
    
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

        $products = $shopping_cart->products()->get();

        if($shopping_cart->productsQuantity()){
            
            $shopping_cart->approve();
            \Session::remove('shopping_cart_id');
            $order = Order::createFromCartResponse($shopping_cart);
            
            return redirect(url('compras/'.$shopping_cart->customid));
        }else{
            return redirect(url('compras/'.$shopping_cart->customid));
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
        $shopping_cart = ShoppingCart::where('customid', $id)->first();
        $order = $shopping_cart->order();
        $products = $shopping_cart->InShoppingCart()->get();



        return view("shopping_carts.completed", [
            'shopping_cart' => $shopping_cart,
            'order' => $order,
            'products' =>$products
            ]);
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
        //
    }
}
