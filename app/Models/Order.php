<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    

  
    

    public function orderProduct(){

    	return $this->hasMany('App\Models\OrderProduct' ,  'order_id'); 
    }


    public function  owner(){

    	return $this->belongsTo('App\Models\Client' , 'client_id'); 
    }
}
