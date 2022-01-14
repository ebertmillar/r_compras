<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supermarket extends Model
{
    protected $fillable = ['supermarket'];

    public function products(){
    	return $this->hasMany('App\Product');
    }

    
}
