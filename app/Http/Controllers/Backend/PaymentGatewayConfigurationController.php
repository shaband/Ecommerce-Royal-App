<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\PaymentGatewayConfiguration;

use Validator ; 

use Session ; 

class PaymentGatewayConfigurationController extends Controller
{
    


	public function index(){


		$payment_configuration = PaymentGatewayConfiguration::updateOrCreate(
	    	/**
	    	 * let me explain  
	    	 * if there is a payment configuration record , then update last updated by 
	    	 * but if it doesn't create a new one  
	    	 */

	    	['id'=>1]
	    	 
	    );

		return view('backend.modules.payments.index' , compact('payment_configuration')); 

	}



	public function update( Request $request , $id ){

			
		 $rules = [

                'merchant_email'=>'required|email' , 
                'secret_key'=>'required' , 
                'reference_no'=>'required' , 
                'site_url'=>'required'  
                 
            ]; 

            $messages = [

                'merchant_email.required' 	=>'Please enter Paytabs Api Merchant Email' , 
                'merchant_email.email' 		=>'Please Make sure that email is well formatted' , 
                'secret_key.required'  		=>'Please enter Paytabs Api Secret Key' , 
                'site_url.required' 	 	=>'Please enter site url , make sure it is compatible with the one entered on Paytabs configuration' , 
                
               
            ];

            $validator = Validator::make($request->all() , $rules , $messages);

            if ($validator->fails()) {

                Session::flash('update_payment_configuration_error' , 'Please fix these errors first') ; 
                return redirect(url("dashboard/payment_configuration#errors_div"))
                            ->withErrors($validator)
                            ->withInput();

            }else{



				$payment_configuration = PaymentGatewayConfiguration::find($id);


				$payment_configuration->merchant_email 	 = $request->merchant_email ;  
				$payment_configuration->secret_key 		 = $request->secret_key ;  
				$payment_configuration->reference_no	 = $request->reference_no ;  
				$payment_configuration->site_url 		 = $request->site_url ;  
				$payment_configuration->cms_with_version = $request->cms_with_version ;  
				

				$payment_configuration->save(); 



				 Session::flash('update_payment_configuration_success' , 'Payment configuration has been updated successfully , enjoy Payments with Paytabs Api') ; 



				 return redirect()->route('backend.payment_configuration'); 




            }







	}


}
