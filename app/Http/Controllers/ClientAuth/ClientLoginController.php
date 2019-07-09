<?php

namespace App\Http\Controllers\ClientAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


use Auth ; 
use Session ; 

class ClientLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/client/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
      
      $this->middleware('guest:client', ['except' => ['logout']]);
     
    }


    /**
     * Function to handle showing of login view  
     * BTW , we are overriding this function from AuthenticatesUsers trait 
     * @return [type] [description]
     */
    public function showLoginForm()
    {
        return view('client_authentication.login');
    }


    public function postLogin(Request $request){
        
         $email = $request->email ; 
         $password = $request->password ;  


        //  $this->validate($request, [
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);


        $rules = [

                'email'=>'required' , 
                'password'=>'required' , 
                
        ]; 

        $messages = [
  
                'email.required'     =>'Please enter your email address' ,  
                'password.required'  =>'Please enter your password' , 
        ];

        // validate request  : 
        $validator = Validator::make($request->all() , $rules , $messages);


        if ($validator->fails()) {
            Session::flash('login_error' , '') ; 
            return redirect(url('client/login'))
                        ->withErrors($validator)
                        ->withInput();
        }else{


            if(Auth::guard('client')->attempt(['email' => $email , 'password' => $password ]))
            {
                return redirect()->route('client.profile');

            }else{

                Session::flash('invalid_credentials' , 'Sorry but we couldn\'t find any account associated with these credentials ! '); 
                return back(); 

            } 



        }




       

    }
}
