<?php

namespace App\Http\Controllers;

use App\ShoppingCart;
use Illuminate\Http\Request;

class MainController extends Controller
{

	public function home(){

	// $shopping_cart_id = \Session::get('shopping_cart_id');

 //    $shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);

 //    \Session::put("shopping_cart_id", $shopping_cart->id);

	    // return view('main.home', ['shopping_cart' => $shopping_cart]);
	    return view('main.home');
	}

}
