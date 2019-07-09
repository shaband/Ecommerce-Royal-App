<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{

	use Notifiable ; 
	
    protected $guard = 'client' ; 


    protected $fillable = [
       'name', 'email', 'gender' 
    ];


    protected $hidden = [
    	'password' , 'remember_token'
    ]; 


    public function accountInformation(){

    	return $this->hasOne('App\Models\AccountInformation' , 'client_id'); 
    }


    public function accountAddresses(){

        return $this->hasMany('App\Models\AddressInformation' , 'client_id');
    }
 


    public function carts(){

        return $this->hasMany('App\Models\Cart' , 'client_id'); 
    }


    public function wishlistItems(){

        return $this->hasMany('App\Models\Wishlist' , 'client_id'); 
    }



    public function orders(){


        return $this->hasMany('App\Models\Order' , 'client_id') ; 
    }
 
}
