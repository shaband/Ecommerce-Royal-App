<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



use App\Models\Client ; 
use App\Models\AddressInformation ; 

use Validator ; 


use Auth ; 
use File ; 
use Session ; 

class ClientController extends Controller
{

    /**
     * Get profile dashboard page
     * @return [type] [description]
     */
    public function index(){
 
 	 
        return view('frontend.pages.client.profile'); 
    
    }


    /**
     * Get profile update page
     * @return [type] [description]
     */
    public function profileInfo(){

    	$client = Auth::guard('client')->user(); 

    	return view('frontend.pages.client.profile_information' , compact('client'));

    }

    /**
     * Update profile information 
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function profileInfoUpdate(Request $request , $id ){




            // dd($request->all());


    		// for now only  
    		$client = Client::find($id);  
    		
            $client->name = $request->first_name .' '.$request->last_name ; 
            $client->email = $request->email ; 





            if($request->hasFile('image')){

                $profile_image = $request->file('image'); 
                $extension = $profile_image->getClientOriginalExtension();
                $profile_image_rename = str_random(4). '.' .$extension;
                $profile_image->move(public_path('uploads/profile/'), $profile_image_rename) ;
                $client->image = $profile_image_rename ; 
            }



            $client->save(); 

            // save additional info  
            if($client->accountInformation){

                $client->accountInformation->client_id = $id ; 
                $client->accountInformation->first_name = $request->first_name ; 
                $client->accountInformation->last_name = $request->last_name ; 
                $client->accountInformation->short_description = $request->short_description ; 


                $client->accountInformation->cc_country_code = $request->cc_country_code ; 
                $client->accountInformation->phone_number = $request->phone_number ; 
                $client->accountInformation->city = $request->city ; 
                $client->accountInformation->state = $request->state ; 
                $client->accountInformation->country = $request->country ; 
                $client->accountInformation->postal_code = $request->postal_code ; 

                $client->accountInformation->save(); 


            }

            // there is no else cause am gonna ensure that there will be a record inserted in the table after registeration -_- 
            
            Session::flash('account_updated' , 'Your account information has been updated successfully !'); 


            return back(); 

    }


    /**
     * Update account password
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function profileInfoUpdatePassword(Request $request , $id){

            // validate request first  
            $rules = [

                'password'=>'required|confirmed|min:6' , 
                'password_confirmation'=>'required|min:6'

            ]; 

            $messages = [

                'password.required' =>'Please eneter password' , 
                'password.min'      =>'Please make sure that ur password at least 6 characters' , 
                'password.confirmed' =>'Password and password confirmation are not equal' , 
                'password_confirmation.required'=>'Password confirmation is required' , 
                'password_confirmation.min'=>'Please make sure that ur password confirmation at least 6 characters'

            ];



             $validator = Validator::make($request->all() , $rules , $messages);


            if ($validator->fails()) {
                Session::flash('validation_error' , '') ; 
                return redirect(url('client/profile/profile-info#password_change_div'))
                            ->withErrors($validator)
                            ->withInput();
            }else{

                $client = Client::find($id) ; 
                $client->password = crypt($request->password , '') ; 

                if($client->save()){

                    Session::flash('password_updated' , 'You account password has been updated successfully'); 
                    return redirect(url('client/profile/profile-info#password_change_div'));

                } 





            }
                  
    }


    /**
     * Get address form 
     * @return [type] [description]
     */
    public function getAddAddressForm(){

    	return view('frontend.pages.client.profile_address_information'); 

    }

    /**
     * Post new address to database 
     * @param Request $request [description]
     */
    public function addAddress(Request $request){

    	   



            // validate request first  
            $rules = [

                'address_name'=>'required|unique:address_informations,address_name' , 
                'first_name'=>'required' , 
                'last_name'=>'required' , 
                'telephone'=>'required' , 
                'street_one'=>'required' , 
                'country'=>'required' , 
                'city'=>'required'


            ]; 

            $messages = [

                'address_name.required' =>'Please enter address name' , 
                'address_name.unique'   =>'Please make sure that address name is unique' , 
                'first_name.required'   =>'Please make sure to enter first name' , 
                'last_name.required'    =>'Please make sure to enter last name' , 
                'telephone.required'    =>'Please enter address telephone' , 
                'street_one.required'   =>'Please enter your street info' , 
                'country.required'      =>'Please select your country' , 
                'city.required'         =>'Please enter your city' , 


            ];



            $validator = Validator::make($request->all() , $rules , $messages);


            if ($validator->fails()) {
                Session::flash('address_information_error' , '') ; 
                return redirect(url('client/profile/addresses'))
                            ->withErrors($validator)
                            ->withInput();
            }else{

                $address =  new AddressInformation ; 
                
                $address->client_id = Auth::guard('client')->user()->id ; 
                $address->address_name = $request->address_name ; 
                $address->first_name = $request->first_name ; 
                $address->last_name = $request->last_name ; 
                $address->telephone = $request->telephone ; 
                $address->telephone_code = $request->telephone_code ; 
                $address->fax = $request->fax ; 
                $address->street_one = $request->street_one ; 
                $address->street_two = $request->street_two ; 
                $address->city       = $request->city ; 
                $address->state       = $request->state ; 
                $address->postal_code       = $request->postal_code ; 

                if($address->save()){

                     Session::flash('address_added' , 'A new address has been added successfully'); 
                    return redirect(url('client/profile/addresses')); 
                    // i could say return back() but ana babden 3la nafsi -_- 
 
                }


                

                  

                





            }

    }




    /**
     * Logout a client , kill all sessions
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function logOut(Request $request){

           Auth::guard('client')->logout() ; 


           return redirect()->route('get_client_login');

    }


    /**
     * Fetch all wish list items per client  
     * @return [type] [description]
     */
    public function wishlistItems(){

        return view('frontend.pages.client.wishlist'); 

    }



    public function getEditAddress($id){


        $address = AddressInformation::find($id) ; 

       
        return view('frontend.pages.client.edit_address' , compact('address')); 

    }


    public function updateAddress(Request $request  , $id){



                // validate request first  
                $rules = [

                    'address_name'=>"required|unique:address_informations,address_name,$id" , 
                    'first_name'=>'required' , 
                    'last_name'=>'required' , 
                    'telephone'=>'required' , 
                    'street_one'=>'required' , 
                    'country'=>'required' , 
                    'city'=>'required'


                ]; 

                $messages = [

                    'address_name.required' =>'Please enter address name' , 
                    'address_name.unique'   =>'Please make sure that address name is unique' , 
                    'first_name.required'   =>'Please make sure to enter first name' , 
                    'last_name.required'    =>'Please make sure to enter last name' , 
                    'telephone.required'    =>'Please enter address telephone' , 
                    'street_one.required'   =>'Please enter your street info' , 
                    'country.required'      =>'Please select your country' , 
                    'city.required'         =>'Please enter your city' , 


                ];



             $validator = Validator::make($request->all() , $rules , $messages);


            if ($validator->fails()) {

                    Session::flash('address_information_error' , '') ; 
                    return redirect(url("client/edit_client_address/$id"))
                                ->withErrors($validator)
                                ->withInput();

            }else{

                    $address =   AddressInformation::find($id) ; 
                    
                    $address->client_id = Auth::guard('client')->user()->id ; 
                    $address->address_name = $request->address_name ; 
                    $address->first_name = $request->first_name ; 
                    $address->last_name = $request->last_name ; 
                    $address->telephone = $request->telephone ; 
                    $address->telephone_code = $request->telephone_code ; 
                    $address->fax = $request->fax ; 
                    $address->street_one = $request->street_one ; 
                    $address->street_two = $request->street_two ; 
                    $address->city       = $request->city ; 
                    $address->country       = $request->country ; 


                     $address->state       = $request->state ; 
                $address->postal_code       = $request->postal_code ; 

                    if($address->save()){

                         Session::flash('address_updated' , 'Address has been updated successfully'); 
                        return redirect(url('client/profile')); 
                        // i could say return back() but ana babden 3la nafsi -_- 
     
                    }

 



            }

        


    }



    public function orders(){



        $client = Auth::guard('client')->user(); 

        $orders = $client->orders ; 


        return view('frontend.pages.client.orders' , compact('orders')); 


    }
    
}
