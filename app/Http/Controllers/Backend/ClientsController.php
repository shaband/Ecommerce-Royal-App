<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Models\Client ; 

use Session ; 

use Auth ; 





class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all(); 

        return view('backend.modules.clients.index' , compact('clients'));
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $client = Client::find($id) ; 

         if($client->is_active == 1){

            $client->is_active = 0 ; 

         }else{

             $client->is_active = 1 ; 

         }


         $client->save(); 


         Session::flash('account_status_changed' , 'Client account status has been updated successfully'); 

         return redirect()->route('clients.index'); 
    }
 
}
