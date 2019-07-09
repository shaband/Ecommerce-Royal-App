<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Tracker ;
use Auth ; 


class DashboardController extends Controller
{
    
    public function home(){

 		
    	return view('backend.modules.dashboard.home'); 
    }
   


}
