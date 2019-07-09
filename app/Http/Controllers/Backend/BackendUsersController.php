<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User ; 

use Validator ; 

use Session ; 


use File ;

use Auth ; 



class BackendUsersController extends Controller
{
    

    public function profile($id){

    	 $user = User::find($id) ; 
    	 return view('backend.modules.backend_users.profile' , compact('user')) ; 


    }


    public function updateProfile(Request $request , $id){




            $rules = [

                'name'=>'required' , 
                'email'=>'required|email' , 
            ]; 

            $messages = [

                'name.required' =>'Please enter the name' , 
                'email.required'  =>'Email address is required ' , 
                'email.email' 	 =>'Make sure you entered a correct email' , 
                
               
            ];

            $validator = Validator::make($request->all() , $rules , $messages);
            if ($validator->fails()) {
                Session::flash('update_admin_profile_error' , '') ; 
                return redirect(url("dashboard/admin/$id/profile#errors_div"))
                            ->withErrors($validator)
                            ->withInput();
            }else{

                $user  =  User::find($id) ; 
                $user->name = $request->name ; 
                $user->email = $request->email ; 



                if($request->hasFile('image')){


                	if(!is_null($user->image)){

                		$old_image = $user->image ; 

                		$old_image_path   = public_path()."/uploads/profile/".$old_image;
            			File::delete($old_image_path);


                	} 


                	$image = $request->file('image'); 
					$extension = $image->getClientOriginalExtension();
		            $image_rename = str_random(4). '.' .$extension;
		            $image->move(public_path('uploads/profile'), $image_rename) ;
		            $user->image = $image_rename ; 
                		


                }


                if(!is_null($request->password)){

                        $user->password = crypt($request->password , ''); 

                }
              
                if($user->save()){

                    Session::flash('admin_profile_updated' , 'Profile has been updated successfully'); 
                    return back();

                } 

            }


    }




    public function logout(Request $request){

          Auth::logout();
          return redirect()->route('login');

    }


    


}
