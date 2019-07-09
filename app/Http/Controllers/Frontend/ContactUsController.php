<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Contact ; 
use Session ; 

class ContactUsController extends Controller
{
    public function index(){


    	return view('frontend.pages.contact');

    }


    public function postContact(Request $request){


    	$contact = new Contact ; 

    	$contact->email = $request->email ; 
    	$contact->name = $request->name ; 
    	$contact->message = $request->message ; 


    	$contact->save(); 


    	Session::flash('contact_saved' , 'Contact message has been sent successfully') ; 


    	return back(); 


    }
}
