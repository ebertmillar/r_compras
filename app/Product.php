<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = ['producto', 'descripcion', 'precio', 'supermarket_id'];

	public function market(){
		return $this->belongsTo('App\Supermarket','supermarket_id');
	}
    
    public function scopeProductName($query, $productName){

        return $this->whereHas('market', function($query) use($productName){
            $query->Where('supermarket','LIKE', "%$productName%")->orWhere('producto', 'LIKE', "%$productName%")->orderBy('id', 'desc');;  
        });
                        
    }

    
}
