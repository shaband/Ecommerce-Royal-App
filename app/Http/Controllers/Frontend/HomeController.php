<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Tracker ; 

use App\Models\Slider ; 
use App\Models\GeneralSetting ; 
use App\Models\Product ; 
use App\Models\ProductMedia ; 
use App\Models\Category ; 



 

class HomeController extends Controller
{
    
    public function home(){


        /**
         * Put the whole website in modes  
         * 1- Live mode  
         * 2- Under maintenance mode 
         * 3- Under construction mode 
         * @var [type]
         */
    	$setting = GeneralSetting::find(1);  

    	 if($setting->site_status == 'under_maintenance'){
    	 	return view('frontend.pages.under_maintenance'); 
    	 }
    	 if($setting->site_status == 'under_construction'){
    	 	return view('frontend.pages.under_construction'); 
    	 }

    	// fetch latest 4 added slider posts and retrieve in blade -_- 
    	$slider_posts = Slider::where('is_active' , 'active')->latest()->limit(4)->get(); 

        // fetch categories send them to frontend  
        // i think we did this before in app service provider 
        // we shared categories as categories_shared between all views  
        // so there is no need to send it again  
        
        // $categories = Category::where('status' , 'active')->get(); 


        // begin fetch products  : 
        // fetching products based on categories 
        // subscriptions and devices 
        // subscriptions category with id  1 
        
        $subscriptions_products =  Product::where(['category_id'=>1])->get(); 
        $devices_products       =  Product::where(['category_id'=>2])->get(); 

        

  		return view('frontend.pages.index' , compact('slider_posts' , 'subscriptions_products' , 'devices_products')); 
  		 
    }
}
