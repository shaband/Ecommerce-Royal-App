<?php

use Illuminate\Database\Seeder;

use App\Models\Client ;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client  = new Client ; 

        $client->name  = 'client' ; 
        $client->email = 'client@royal.com' ; 
        $client->gender = 'male' ; 
        $client->password = crypt(123456 , '');
        $client->save() ; 
    }
}
