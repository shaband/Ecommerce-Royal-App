<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Order ; 
use App\Models\OrderProduct ; 
use App\Models\Product ; 


use Auth ; 


class OrderController extends Controller
{
    

	public function index(){


		// get a list of orders  
		
		$client = Auth::guard('client')->user(); 

		$orders = Order::paginate(10) ; 

		

		return view('backend.modules.orders.index' , compact('orders')); 

	}


}
