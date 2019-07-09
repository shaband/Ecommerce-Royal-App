<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    

    public function product(){

    	return $this->hasOne('App\Models\Product' , 'id'  , 'product_id') ; 
    }


}
