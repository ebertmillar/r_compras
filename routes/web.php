<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home','MainController@home');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('compras/lista', 'ShoppingController@index');

Route::resource('productos', 'ProductsController');
Route::resource('supermercado', 'MarketsController');
Route::resource('in_shopping_carts', 'InShoppingCartController', [ 
	'only' => ['store','destroy']

]);

Route::resource('compras', 'ShoppingCartsController', [ 
	'only' => ['show']
]);

Route::resource('orders', 'OrdersController', [ 
	'only' => ['index','update']
]);

route::resource('cart', 'ShoppingCartsController');
// Route::post('cart', 'ShoppingCartsController@pagar');
