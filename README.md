# Ecommerce Royal App
Web application used to book iptv serial numbers based on predefined budget . 
The application use online payments through payment gateway called PayTabs  
Also the application handle Import features for serials through spreadsheets and dump them to database 
The application is categorized as semi-Ecommerce applicaiton . 

## Ecommerce Checkout Sample Code  
```php
	public function perform_checkout(Request $request){


		$shipping_address ; 
		if(!is_null($request->loaded_addresses)){
				// means he has selected an address from the drop list 
				$address_id = $request->loaded_addresses ; 
				$shipping_address = AddressInformation::find($address_id) ; 

		}else{ 
		 
			  $rules = [

			  	'address_name'=>'required' , 	
			  	'first_name'=>'required' , 	
			  	'last_name'=>'required' , 	
			  	'street_one'=>'required' , 	
			  	'city'=>'required' , 	
			  	'country'=>'required' , 	

			  ]; 

			  $messages = [

			  	'address_name.required'		=>'Please give your address a name' , 
                'first_name.required'      	=>'Please enter the first name' , 
                'last_name.required' 		=>'Please enter the last name' , 
                'street_one.required'		=>'Please enter the exactly street name' , 
                'city.required'				=>'Please enter shipping city' , 
                'country.required'				=>'Please select the shipping country'

			  ]; 

			  $validator = Validator::make($request->all() , $rules , $messages);

			  	if ($validator->fails()) {

	                Session::flash('validation_error' , '') ; 
	                return redirect(url('client/checkout#address_error'))
	                            ->withErrors($validator)
	                            ->withInput();

            	}else{

            		  $new_shipping_address = new AddressInformation ; 

					  $new_shipping_address->client_id 			= Auth::guard('client')->user()->id ;  
					  $new_shipping_address->address_name 		= $request->address_name ; 
					  $new_shipping_address->first_name 		= $request->first_name ; 
					  $new_shipping_address->last_name 			= $request->last_name ; 
					  $new_shipping_address->telephone 			= $request->telephone ; 
					  $new_shipping_address->telephone_code 	= $request->telephone_code ; 
					  $new_shipping_address->street_one 		= $request->street_one ; 
					  $new_shipping_address->street_two 		= $request->street_two ; 
					  $new_shipping_address->city 				= $request->city ; 
					  $new_shipping_address->state 				= $request->state ; 
					  $new_shipping_address->country 			= $request->country ; 
					  $new_shipping_address->postal_code 		= $request->postal_code ; 

					  $new_shipping_address->save(); 
					  $shipping_address = $new_shipping_address ; 
 
            	}

		}

		$customer  = Auth::guard('client')->user(); 

		$customer_name 						= $customer->name ; 
		$customer_fname 					= $customer->accountInformation->first_name ; 
		$customer_lname 					= $customer->accountInformation->last_name ; 
		$customer_email 					= $customer->email ; 



		// billing information 

		$customer_billing 					= $customer->accountAddresses->first(); 
		$customer_phone_code 				= $customer_billing->telephone_code ; 
		$customer_phone 					= $customer_billing->telephone ; 
		$customer_address_name 				= $customer_billing->address_name ;  
		$customer_city 						= $customer_billing->city ;  
		$customer_state 					= $customer_billing->state ;  
		$customer_postal					= $customer_billing->postal_code ;  
		$customer_country 					= $customer_billing->country ; 

		$shipping_address_name 				=  $shipping_address->address_name ; 
		$shipping_street_name  				=  $shipping_address->street_one  ; 
		$shipping_city						=  $shipping_address->city ; 
		$shipping_state						=  $shipping_address->state ; 
		$shipping_country					=  $shipping_address->country ; 
		$shipping_postal					=  $shipping_address->postal_code ; 
		$carts = $customer->carts ; 
		$products_titles = [] ; 

		$product_prices = [] ; 

		$product_quantities = [] ; 

		foreach($carts as $cart){

			$products_titles [] = ($cart->product->title ); 
			$product_prices [] = ($cart->product->price ); 
			$product_quantities [] = ($cart->quantity); 

		}


		$products_titles_imploded  = implode($products_titles, " || ");
		$products_prices_imploded  = implode($product_prices, " || ");
		$products_quantities_imploded  = implode($product_quantities, " || ");
		$sub_total  = 0  ;  

        foreach ($customer->carts as $cart) {  

              $sub_total += $cart->quantity * $cart->product->price ; 

        }
 
        $general_shipping = GeneralSetting::find(1)->value('shipping_cost') ;  
		$payment_config = PaymentGatewayConfiguration::find(1) ; 

		$merchant_email 	= $payment_config->merchant_email ; 
		$merchant_secretKey = $payment_config->secret_key ;
		$reference_no 		= $payment_config->reference_no ;
		$site_url 			= $payment_config->site_url ;
		$cms_with_version 	= $payment_config->cms_with_version ;

		$pt = Paytabs::getInstance($merchant_email , $merchant_secretKey); 
		$result = $pt->create_pay_page(array(
		
			"merchant_email" 		=> $merchant_email,
			'secret_key' 			=> $merchant_secretKey,
			'title' 				=> $customer_name ,
			'cc_first_name' 		=> $customer_fname,
			'cc_last_name' 			=> $customer_lname,
			'email' 				=> $customer_email,

			'cc_phone_number' 		=> "$customer_phone_code" ,
			'phone_number' 			=> "$customer_phone",
			'billing_address' 		=> "$customer_address_name",
			'city' 					=> "$customer_city",
			'state' 				=> "$customer_state" , 
			'postal_code' 			=> "$customer_postal",
			'country' 				=> "$customer_country",


			'address_shipping' 		=> "$shipping_street_name" ,
			'city_shipping' 		=> "$shipping_city",
			'state_shipping' 		=> "$shipping_state" ,
			'postal_code_shipping' 	=> "$shipping_postal" ,
			'country_shipping'		=> "$shipping_country" ,
 

			"products_per_title"	=> $products_titles_imploded,
			'currency' 				=> "SAR",
			"unit_price"			=> $products_prices_imploded  ,
			'quantity' 				=> $products_quantities_imploded ,
			'other_charges' 		=> $general_shipping ,
			'amount' 				=> $sub_total + $general_shipping ,
			'discount'				=> "0",


			"msg_lang" 				=> "english",
			"reference_no" 			=> "$reference_no",
			"site_url" 				=> "$site_url",
			'return_url' 			=> url("client/check_payment"),
			"cms_with_version" 		=> "$cms_with_version"


		));


	  
		 if($result->response_code == 4012){
		    return redirect($result->payment_url);
	     } 

	}



```

## Paytabs Payment Gateway
[See Paytabs](https://www.paytabs.com/en/)
