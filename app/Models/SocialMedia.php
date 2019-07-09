<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    
    public function admin(){


    	return $this->belongsTo('App\Models\User' , 'added_by'); 
    }
}
