<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    protected $fillable = ['email','total','shopping_cart_id'];

    public function shopping_cart(){
        return $this->belongsTo('App\ShoppingCart');
    }

    public function scopeLatest($query){
    	return $query->orderID()->montlhy();
    }

    public function scopeOrderID($query){
    	return $query->orderBy('id','desc');
    }

    public function scopeMonthly($query){
        return $query->whereMonth('created_at', '=', date('m'));
    }
    
    public static function totalMonth(){
        return Order::monthly()->sum('total');
    }

    public static function totalMonthCount(){
        return Order::monthly()->count();
    }
	public static function createFromCartResponse($shopping_cart){

    	$orderData['email'] = Auth::user()->email;
    	$orderData['total'] = $shopping_cart->total();
    	$orderData['shopping_cart_id'] = $shopping_cart->id;


    	return Order::create($orderData);

    }

}
