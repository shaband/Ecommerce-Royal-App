<?php

use Illuminate\Database\Seeder;

use App\Models\User ; 

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin  = new User ; 

        $admin->name  = 'administrator' ; 
        $admin->email = 'admin@royal.com' ; 
        $admin->access_level = 'administrator' ; 
        $admin->password = crypt(123456 , '');
        $admin->save() ; 



    }
}
