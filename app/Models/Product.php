<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function attachements(){
    	return $this->hasMany('App\Models\ProductMedia' , 'product_id');
    }


    public function category(){

    	return $this->belongsTo('App\Models\Category' , 'category_id'); 
    }


    public function package(){

    	return $this->belongsTo('App\Models\Package' , 'package_id'); 
    }



    public function orderProduct(){

    	return $this->belongsTo('App\Models\orderProduct' , 'id' ,  'product_id'); 
    }


  


    
}
