<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product ; 

use DB ; 

class SearchController extends Controller
{
    


	public function search(Request $request){


			$category_id = $request->get('category_id') ; 
			$query		 = $request->get('query') ; 


			$products = Product::where('title' , 'LIKE' , "%$query%")
							   ->where('category_id' , $category_id)
							   ->paginate(12);


			return view('frontend.pages.search' , compact('products' , 'query')); 
 

  			


	}


}
