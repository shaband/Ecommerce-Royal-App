<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Newsletter ; 

use Session ; 

class NewsletterController extends Controller
{
    
	public function subscripe(Request $request){
 		

			$newsletter = new Newsletter ; 
			$newsletter->email = $request->email ; 

			$newsletter->save(); 

			Session::flash('subscripe_made' , 'You have successfully subscriped into our news letter'); 


			return back(); 



	}


}
