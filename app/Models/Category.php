<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
     public function admin(){


    	return $this->belongsTo('App\Models\User' , 'added_by');

    }



    public function products(){

    	return $this->hasMany('App\Models\Product' , 'category_id'); 
    }


    public function packages(){

    	return $this->hasMany('App\Models\Package' , 'category_id'); 
    }
}
