<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Models\GeneralSetting ; 

use App\Models\Category; 
use App\Models\SocialMedia; 

use App\Models\Cart ; 

use Auth ; 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        Schema::defaultStringLength(191);

        $categories = Category::where(['status'=>'active'])->get(); 

        $social     = SocialMedia::where('status' , 'active')->get(); 
 
 
        $general_settings = GeneralSetting::find(1); 



         


        view()->share([


            'categories_shared'=>$categories , 
            'social_shared'=>$social , 
            'general_settings_shared'=>$general_settings
            

        ]);
       


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
