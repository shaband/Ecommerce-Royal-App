<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Transaction ; 
use App\Models\PaymentGatewayConfiguration ; 
use Paytabs ; 
use Auth ;

use Carbon\Carbon ; 




class TransactionController extends Controller
{


	public function index(){ 

			 
			$transactions_array = [] ; 

			return view('backend.modules.transactions.index' , compact('transactions_array')) ; 

	}


	public function filter(Request $request){



			$transaction_startdate = $request->get('transaction_startdate') ; 
			$transaction_enddate = $request->get('transaction_enddate') ; 



			$payment_config = PaymentGatewayConfiguration::find(1) ; 

			$merchant_email 	= $payment_config->merchant_email ; 
			$merchant_secretKey = $payment_config->secret_key ;
	 



			$merchant_email = "emadtab97@gmail.com"; 
			$merchant_secretKey = "tAetuRrZAZHsmHThmQkM1l6GXg3VTPsnqGQUyiU9hBCEiwWEngroCx4zN8uHYX5oEVjdedmvOY97u6MRmdgZLkyyt3gs1lRFhaTv"; 

			$pt = Paytabs::getInstance($merchant_email , $merchant_secretKey); 


			$json_transactions = $pt->runPost( 'https://www.paytabs.com/expressv2/transaction_reports/'  , [

				'merchant_id'		=> $merchant_email , 
				'secret_key'		=> $merchant_secretKey , 

				'startdate'			=> $transaction_startdate , 
				'enddate'			=> $transaction_enddate
				 


			]); 

 

			$transactions 		=  json_decode($json_transactions) ;




			if($transactions->response_code == "4090"){

				$transactions_array =  $transactions->details;

				
			}else{

				$transactions_array = [] ; 

			}

			// dd($transactions);

			 

		

			return view('backend.modules.transactions.index' , compact('transactions' , 'transactions_array')) ; 

		 



	}
    
  



}
