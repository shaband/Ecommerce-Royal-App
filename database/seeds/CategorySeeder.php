<?php

use Illuminate\Database\Seeder;


use App\Models\Category ; 

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subscription = new Category ; 

        $subscription->title = 'subscriptions' ; 
        $subscription->description = 'description test' ; 
        $subscription->added_by = 1 ; 
        $subscription->status = 'active' ; 
        $subscription->save() ; 


        $devices = new Category ;

        $devices->title = 'devices' ; 
        $devices->description = 'description test' ; 
        $devices->added_by = 1 ; 
        $devices->status = 'active' ; 
        $devices->save() ;

          
    }
}
