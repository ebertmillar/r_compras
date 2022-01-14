<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InShoppingCart extends Model
{
    protected $fillable = ['product_id', 'shopping_cart_id','quantity'];

    public function productsList(){
    	return $this->belongsTo('App\Product','product_id');
    }
}
