<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function index(Request $request){

    	$productName = $request->get('producto');

        $products = Product::productName($productName)->get();

        return view('compras.index', ['products' => $products]);
    }
}
