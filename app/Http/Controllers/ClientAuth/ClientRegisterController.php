<?php

namespace App\Http\Controllers\ClientAuth;

use App\Models\Client;
use App\Models\AccountInformation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


use Session; 
use Auth ; 

class ClientRegisterController extends Controller
{
    

    public function register(Request $request){


        

        $rules = [

                'first_name'=>'required' , 
                'last_name'=>'required' , 
                'username'=>'required|unique:clients,name' , 
                'email'=>'required|email|unique:clients,email' , 
                'password'=>'required|min:6' , 

        ]; 

        $messages = [

                'first_name.required' =>'Please enter your first name' , 
                'last_name.required' =>'Please enter your last name' , 
                'username.required'  =>'Please enter your username' , 
                'username.unique'   =>'Username is already taken , write a unique one' , 
                'email.required'     =>'Please enter your email address' , 
                'email.email'        =>'Please make sure to enter a valid email address' , 
                'email.unique'        =>'Email is already taken , write a unique one' , 
                'password.required'  =>'Please enter your password' , 
                'password.min'  =>'Please make sure your password at least are 6 characters minimum' , 
    
        ];

        // validate request  : 
        $validator = Validator::make($request->all() , $rules , $messages);


        if ($validator->fails()) {
 
            Session::flash('registration_errors' , '') ; 
            return redirect(url('client/login'))
                        ->withErrors($validator)
                        ->withInput();
        }else{


            // create a new client  : 
            $client = new Client ; 
            $client->name = $request->username ; 
            $client->email = $request->email ; 
            $client->gender = $request->gender ; 
            $client->is_active = 1  ; 
            $client->password = crypt($request->password , ''); 

            $client->save(); 


            // create additional info  : 
            $accountInformation = new AccountInformation ; 
            $accountInformation->client_id = $client->id ; 
            $accountInformation->first_name = $request->first_name ; 
            $accountInformation->last_name = $request->last_name ; 


            $accountInformation->save(); 


             if(Auth::guard('client')->attempt(['email' => $request->email , 'password' => $request->password ]))
            {


                Session::flash('account_created' , ' , your account has been created successfully , we also sent you an email with your account credentials incase you forgot them , enjoy with us '); 

                return redirect(url('client/profile'));
                

            }

            // our validation passes -_- 
            // authenticate user
           
            // Auth::guard('client')->user(); 

           

        }

        // recieve values  : 
        

        // auto login new customer ( clients )


    }


}
