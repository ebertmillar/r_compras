<?php

namespace App;

use App\ShoppingCart;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
	protected $fillable = ['estado'];


    public function approve(){
        $this->updateCustomID();
    }

    public function generateCustomID(){
        return md5("$this->id $this->updated_at");
    }

    public function updateCustomID(){
        $this->estado = 'aprobado';
        $this->customid = $this->generateCustomID();
        $this->save();
    }

    public function inShoppingCart(){
        return $this->hasMany('App\inShoppingCart');
    }

    public function products(){
        return $this->belongsToMany('App\Product', 'in_shopping_carts');
    }

    public function subtotal(){

    }

    public function order(){
        return $this->hasOne('App\Order')->first();
    }

    public function total(){

        // return $this->products()->sum('precio');
        $total =0;
        foreach ($this->inShoppingCart as $key => $in_shopping_cart) {
             $total += $in_shopping_cart->quantity * $in_shopping_cart->productsList->precio;
            
        }
        return $total;
    }

    public function productsQuantity(){
         return $this->inShoppingCart->sum('quantity');
     }

    // public function productsQuantity(){
    //     return $this->products()->count();
    // }


    public static function findOrCreateBySessionId($shopping_cart_id){

        if($shopping_cart_id){
            return ShoppingCart::findBySession($shopping_cart_id);

        }else{
            //crear un carrito de compras
            return ShoppingCart::createWithoutSession();
        }
    
    }

    public static function findBySession($shopping_cart_id){
        return ShoppingCart::findOrFail($shopping_cart_id);
        }

    public static function createWithoutSession(){
        return ShoppingCart::create([
        'estado' => 'incompleto'

        ]);
    }


}
