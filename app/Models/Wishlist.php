<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    

	public function wishedItemOwner(){

		return $this->belongsTo('App\Models\Client'); 
	}


	public function WishlistProduct(){

		return $this->hasOne('App\Models\Product' , 'id' ,  'product_id'); 
	}

}
