<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\SocialMedia ; 

use Auth ; 
use Session; 


class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $social = SocialMedia::latest()->get(); 

        return view('backend.modules.social.index' , compact('social')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.social.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $rules = [

            'name'=>'required' , 
            'url'=>'required' , 
            'icon'=>'required' , 
            
        ]; 


        $messages = [

            'name.required'=>'Please enter social link name title' , 
            'url.required'=>'Please enter social link url like (ex : http://www.example.com)' , 
            'icon.required'=>"Please enter social link icon see this <a target='_blank' href='https://fontawesome.com/'>Icons</a>" , 
            

        ]; 


        $this->validate($request,$rules,$messages);



        $link = new SocialMedia ; 

        $link->name = $request->name ; 
        $link->url = $request->url ; 
        $link->icon = $request->icon ; 
        $link->status = $request->status == 'on' ? 'active':'not_active' ; 
        $link->added_by = Auth::user()->id ; 


        $link->save(); 

        Session::flash('store_crud' , 'New Social Media Link has been added successfully'); 


        return redirect()->route('social-media.index'); 



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $link = SocialMedia::find($id) ; 

        return view('backend.modules.social.edit' , compact('link')); 
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


        

        $rules = [

            'name'=>'required' , 
            'url'=>'required' , 
            'icon'=>'required' , 
            
        ]; 


        $messages = [

            'name.required'=>'Please enter social link name title' , 
            'url.required'=>'Please enter social link url like (ex : http://www.example.com)' , 
            'icon.required'=>"Please enter social link icon see this <a target='_blank' href='https://fontawesome.com/'>Icons</a>" , 
            

        ]; 


        $this->validate($request,$rules,$messages);



        $link =  SocialMedia::find($id) ; 

        $link->name = $request->name ; 
        $link->url = $request->url ; 
        $link->icon = $request->icon ; 
        $link->status = $request->status == 'on' ? 'active':'not_active' ; 
        $link->added_by = Auth::user()->id ; 


        $link->save(); 

        Session::flash('update_crud' , 'Current Social Media Link has been updated successfully'); 


        return redirect()->route('social-media.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         
    }



    public function remove($id){


        


        // remove social media link 
        $link = SocialMedia::find($id) ; 

     


        $link->destroy($id) ; 


        Session::flash('delete_crud' , 'Social Media Link has been deleted successfully'); 


        return redirect()->route('social-media.index'); 

    }
}
