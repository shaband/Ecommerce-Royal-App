<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public function admin(){

    	return $this->belongsTo('App\Models\User' , 'added_by');
    	
    }

    public function category(){

    	return $this->belongsTo('App\Models\Category' , 'category_id'); 
    }



    public function products(){

    	return $this->hasMany('App\Models\Product' , 'package_id'); 
    }
}
