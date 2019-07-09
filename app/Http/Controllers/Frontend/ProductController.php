<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Models\Category ; 
use App\Models\Package ; 
use App\Models\Product ; 
use App\Models\ProductMedia ;

use Auth ; 
use Session ; 


class ProductController extends Controller
{
    	
    	public function subscriptions(){

			$subscriptions_products =  Product::where(['category_id'=>1 , 'status'=>'active'])->get(); 
			return view('frontend.pages.subscriptions' , compact('subscriptions_products'))  ; 
		}

		public function  devices(){

			
        	$devices_products       =  Product::where(['category_id'=>2 , 'status'=>'active'])->get(); 

			return view('frontend.pages.devices' , compact('devices_products'))  ; 

		}


		public function productDetails($id){


			$product = Product::find($id) ; 


			return view('frontend.pages.product_details' , compact('product'));

		}





}
