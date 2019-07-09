<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



use App\Models\GeneralSetting ; 

use Auth ; 

use Session ; 


class GeneralSettingsController extends Controller
{
    
    /**
     * We will ship with update or create functionality 
     */

	public function index(){


	    $settings = GeneralSetting::updateOrCreate(
	    	/**
	    	 * let me explain  
	    	 * if there is a general settings record , then update last updated by 
	    	 * but if it doesn't create a new one  
	    	 */

	    	['id'=>1], 
	    	['last_updated_by'=>Auth::user()->id]
	    );

	    return view('backend.modules.settings.index' , compact('settings')); 

	    

	}


	public function update(Request $request , $id){


		 $settings = GeneralSetting::find($id) ; 


		 $settings->seo_description 		= strip_tags($request->seo_description) ; 
		 $settings->seo_keywords 			= strip_tags($request->seo_keywords) ; 
		 $settings->google_analytic_number 	= $request->google_analytic_number ; 
		 $settings->contact_email			= $request->contact_email ; 
		 $settings->header_email			= $request->header_email ; 
		 $settings->header_phone			= $request->header_phone ; 
		 $settings->site_status				= $request->site_status ; 
		 $settings->shipping_cost			= $request->shipping_cost ; 
		 $settings->last_updated_by			= Auth::user()->id ; 
		 $settings->save(); 



		// flash a success message to user  -_- 
		Session::flash('update_crud' , 'Website general settings has been updated successfully') ; 
		// make a redirection 
		return redirect()->route('dashboard.get_settings'); 





	}


}
