<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Cart ; 
use App\Models\Order ; 
use App\Models\OrderProduct ; 
use App\Models\Wishlist ; 
use App\Models\Product ; 
use App\Models\ProductMedia ; 
use App\Models\GeneralSetting ; 
use App\Models\AddressInformation ; 
use App\Models\Transaction ; 
use App\Models\PaymentGatewayConfiguration ; 

 
 



use Paytabs ; 


use Validator ; 


use Auth ; 
use Session ; 


class ECommerceController extends Controller
{
    
	/**
	 * Get Cart Page 
	 * @return [type] [description]
	 */
	public function cart(){
		
		return view('frontend.pages.cart'); 	
	}


	/**
	 * @param  Request incoming request
	 * @param  id - cart item id  
	 * @return success update reuest regarding the cart
	 */
	public function updateCartProduct(Request $request , $id){

			// validate request first  
            $rules = [

                'product_cart_quantity'=>'required|integer|min:1|max:10'  
            ]; 

            $messages = [

                'product_cart_quantity.required' =>'Quantity can\'t be empty , please enter a quantity' , 
                'product_cart_quantity.integer'  =>'Quantity can\'t be with negative value , please enter a positive one' , 
                'product_cart_quantity.min' 	 =>'Make sure that the minmum quantity is one ( 1 )' , 
                'product_cart_quantity.max' 	 =>'Make sure that the maximum quantity is ten ( 10 )' , 
                
            ];

            $validator = Validator::make($request->all() , $rules , $messages);
            if ($validator->fails()) {
                Session::flash('cart_error' , '') ; 
                return redirect(url('client/cart#cart_information_div'))
                            ->withErrors($validator)
                            ->withInput();
            }else{

                $cart_item  = Cart::find($id) ; 
                $cart_item->quantity =  $request->product_cart_quantity ;

                if($cart_item->save()){

                    Session::flash('cart_updated' , 'Your cart has been updated successfully'); 
                    return redirect(url('client/cart#cart_wrapper_start'));

                } 

            }
	}


	/**
	 * @param Request
	 * @param id - item id to be added to cart  
	 */
	public function addItemToCart(Request $request , $id){
			// validate request first  
            $rules = [

                'to_be_added_to_cart'=>'required|integer|min:1|max:10'
            ]; 

            $messages = [

                'to_be_added_to_cart.required' =>'Quantity can\'t be empty , please enter a quantity' , 
                'to_be_added_to_cart.integer'  =>'Quantity can\'t be with negative value , please enter a positive one' , 
                'to_be_added_to_cart.min' 	 =>'Make sure that the minmum quantity is one ( 1 )' , 
                'to_be_added_to_cart.max' 	 =>'Make sure that the maximum quantity is ten ( 10 )' 
               
            ];

            $validator = Validator::make($request->all() , $rules , $messages);
            if ($validator->fails()) {
                Session::flash('add_to_cart_error' , '') ; 
                return redirect(url("product/$id#cart_information_div"))
                            ->withErrors($validator)
                            ->withInput();
            }else{

                $cart_item  =  new Cart ; 
                $cart_item->product_id = $id ; 
                $cart_item->client_id = Auth::guard('client')->user()->id ; 
                $cart_item->quantity =  $request->to_be_added_to_cart ;
                if($cart_item->save()){

                    Session::flash('cart_item_added' , 'Item has been added successfully to your cart'); 
                    return back();

                } 

            }
	}






	public function addItemToCartPages(Request $request , $id){
		 

             

                $cart_item  =  new Cart ; 
                $cart_item->product_id = $id ; 
                $cart_item->client_id = Auth::guard('client')->user()->id ; 
                $cart_item->quantity =  1 ;
                if($cart_item->save()){

                    Session::flash('cart_item_added_pages' , 'Item has been added successfully to your cart'); 
                    return back();

                } 

           
	}


	/**
	 * Removing item from cart 
	 * @param  Request $request [description]
	 * @param  [type]  $id      [description]
	 * @return all the math is done on the fly  
	 */
	public function deleteItemFromCart(Request $request , $id){

		  $cart_item = Cart::find($id); 
		  $cart_item->delete($id) ; 
		  Session::flash('cart_item_deleted' , 'Item has been deleted successfully from your cart'); 
		  return back();
	}


	/**
	 * Adding item to client wishlist 
	 * @param [type] $id  - product id  
	 */
	public function addItemToWishlist($id){


		$item  = new Wishlist ; 

		$item->product_id = $id ; 	
		$item->client_id  = Auth::guard('client')->user()->id ; 

		$item->save(); 

		Session::flash('item_added_to_wishlist' , 'Congrats , this item has been added to your wishlist successfully'); 

		return back(); 	


	}


	/**
	 * Remove item form wishlist
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function removeItemFromWishlist($id){


		$item  =  Wishlist::where(['product_id'=>$id , 'client_id'=>Auth::guard('client')->user()->id])->first() ; 

		$item->delete($item->id); 

		Session::flash('item_deleted_from_wishlist' , 'Item has been deleted from your wishlist successfully'); 

		return back(); 	

	}

	/**
	 * add product to cart from wishlist
	 * @param [type] $id [description]
	 */
	public function addItemToCartFromWishlist($id){


		$item = new Cart ; 

		$item->product_id = $id ; 
		$item->client_id  = Auth::guard('client')->user()->id ; 
		$item->quantity   = 1 ; 

		$item->save(); 

		Session::flash('item_added_to_cart_from_wishlist' , 'Congrats , item has been added to your cart successfully'); 

		return back(); 


	}



	public function checkout(){


		$client = Auth::guard('client')->user() ; 


		$sub_total  = 0  ;  


		$carts = $client->carts ; 

        foreach ($client->carts as $cart) {  

              $sub_total += $cart->quantity * $cart->product->price ; 

        }


        $addresses = $client->accountAddresses ; 

		return view('frontend.pages.checkout' , compact('sub_total' , 'addresses' , 'carts'));




	}


	public function perform_checkout(Request $request){



		// dd($request->all());


		$shipping_address ; 


		if(!is_null($request->loaded_addresses)){


				// means he has selected an address from the drop list 
				$address_id = $request->loaded_addresses ; 

				$shipping_address = AddressInformation::find($address_id) ; 



		}else{


			  // means he didn't select any address and decide to fill a new one  
			  



			  // validate first : 
			  
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


		// shipping information : 
		
		$shipping_address_name 				=  $shipping_address->address_name ; 
		$shipping_street_name  				=  $shipping_address->street_one  ; 
		$shipping_city						=  $shipping_address->city ; 
		$shipping_state						=  $shipping_address->state ; 

		// dd($shipping_state);
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



        // Begin implementation for our Payment Gateway ( paytabs -_- )
        // This Api needs two required params [ Merchant email , Merchant secret key ]
        // There are many response codes based on different errors  returned by the Api 
 
  //       $merchant_email = "emadtab97@gmail.com"; 
		// $merchant_secretKey = "tAetuRrZAZHsmHThmQkM1l6GXg3VTPsnqGQUyiU9hBCEiwWEngroCx4zN8uHYX5oEVjdedmvOY97u6MRmdgZLkyyt3gs1lRFhaTv"; 


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


	 
	 	// dd($result);
	 


		 if($result->response_code == 4012){

		 	// redirect to pay page where customer will enter his credit card information 
		    return redirect($result->payment_url);
	     } 


         


	}





	public function check_payment(Request $request){

 

		$client = Auth::guard('client')->user(); 

		$merchant_email = "emadtab97@gmail.com"; 
		$merchant_secretKey = "tAetuRrZAZHsmHThmQkM1l6GXg3VTPsnqGQUyiU9hBCEiwWEngroCx4zN8uHYX5oEVjdedmvOY97u6MRmdgZLkyyt3gs1lRFhaTv"; 


		$payment_config = PaymentGatewayConfiguration::find(1) ; 

		$merchant_email 	= $payment_config->merchant_email ; 
		$merchant_secretKey = $payment_config->secret_key ;
		 


		$pt = Paytabs::getInstance($merchant_email , $merchant_secretKey); 
	    $result = $pt->verify_payment($request->payment_reference);


	    if($result->response_code == 100){

	    	/**
	    	 * Payment was successfull 
	    	 * Empty cart 
	    	 * redirect client to his orders listing  
	    	 * record these orders  
	    	 * flush your transaction table  
	    	 */
	    	

	    	// transaction data 
	    	
	    	$transaction = new Transaction ; 

	    	$transaction->client_id = Auth::guard('client')->user()->id ; 
	    	$transaction->invoice_id = $result->pt_invoice_id ; 
	    	$transaction->amount = $result->amount ; 
	    	$transaction->currency = $result->currency ; 
	    	$transaction->reference_no = $result->reference_no ; 
	    	$transaction->transaction_id = $result->transaction_id ; 
	    	$transaction->status = 'payment_success' ; 

	    	$transaction->save(); 


	    	// Flush order 
	    	$order = new Order ; 
	    	$order->order_ticket = "order_" . str_random(4) ; 
	    	$order->client_id    = Auth::guard('client')->user()->id ; 
	    	$order->order_total  = $result->amount ; 
	    	$order->payment_status = 'paid' ; 

	    	$order->save(); 


	    	// Flush Order Product Pivot 
	    	
	    	foreach ($client->carts as $cart) {
	    		
	    		$order_product = new OrderProduct ; 
	    		$order_product->order_id = $order->id ; 
	    		$order_product->product_id = $cart->product_id ; 
	    		$order_product->quantity = $cart->quantity ; 

	    		$order_product->save(); 
	    		 
	    	}


	    	// then i need to empty the cart  on the fly  : 
	    	
	    	foreach ($client->carts as $cart) {

	    		$cart->delete(); 

	    	}



	    	// email customer  pending  
	    	

	    	// email Owner  pending  
	    	


	    	// redirect client to his orders pages with a success flash message 
	    	Session::flash('payment_success' , 'We are glad to inform you that payment went successfully , congratulations') ; 


	    	return redirect()->route('client.orders'); 







	    }else{

	    	/**
	    	 * Payment went wrong there was an issue  
	    	 * proceed with your logic 
	    	 */
	    	


	    	$transaction = new Transaction ; 

	    	$transaction->client_id = Auth::guard('client')->user()->id ; 
	    	$transaction->invoice_id = $result->pt_invoice_id ; 
	    	$transaction->amount = $result->amount ; 
	    	$transaction->currency = $result->currency ; 
	    	$transaction->reference_no = $result->reference_no ; 
	    	$transaction->transaction_id = $result->transaction_id ; 
	    	$transaction->status = 'payment_failed' ; 

	    	$transaction->save(); 
	    	
	    	 // dd($result);


	    	 Session::flash('payment_failed' , $result->result ) ; 

	    	 return redirect()->route('getCheckout'); 
	    	


	    }

	    
	     
	   


	}
	


}
