<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Tracker ; 
 
  

class TrackerController extends Controller
{
    
    public function stats(){ 
  		
  		// get sessions (visits) from the past day
    	$visits = Tracker::sessions(60 * 24);
    	
     
    	return view('backend.modules.tracker.stats' , compact('visits') ); 
    }
}
