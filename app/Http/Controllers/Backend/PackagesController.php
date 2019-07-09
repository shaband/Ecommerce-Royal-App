<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category ; 
use App\Models\Package ; 


use File ; 
use Session ; 
use Auth ; 



class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::latest()->paginate(6); 

        return view('backend.modules.packages.index' , compact('packages')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status' , 'active')->get(); 
        return view('backend.modules.packages.create' , compact('categories'));
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

            'title'=>'required|min:6' , 
            'description'=>'required' , 
            'category_id'=>'required' , 
            
         ]; 


         $messages = [

            'title.required'=>'Please enter package title' , 
            'title.min'=>'the minimum allowed characters for title are six ' , 
            'description.required'=>'Please enter package main description' , 
            'category_id.required'=>'Please Make sure to select category' , 
             

         ];

        // validate the request 
        $this->validate($request , $rules  , $messages) ; 

        // begin database play around  : 
        $package = new Package ; 

        $package->title = $request->title ; 
        $package->description = strip_tags($request->description) ; 

        $package->category_id = $request->category_id ; 
        
        $package->status = $request->status == 'on' ? 'active' : 'not_active' ; 

        $package->added_by = Auth::user()->id ; 

        if($request->hasFile('main_image')){

            $package_image = $request->file('main_image'); 
            $extension = $package_image->getClientOriginalExtension();
            $package_image_rename = str_random(4). '.' .$extension;
            $package_image->move(public_path('uploads/packages/'), $package_image_rename) ;
            $package->main_image = $package_image_rename ; 

        }

        // then at final save  
        $package->save(); 
        // flash a success message to user  -_- 
        Session::flash('store_crud' , 'A new Package has been added successfully') ; 
        // make a redirection 
        return redirect()->route('packages.index'); 


    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = Package::find($id); 
        $categories = Category::where('status' , 'active')->get(); 
        return view('backend.modules.packages.edit' , compact('package' , 'categories'));  
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

            'title'=>'required|min:6' , 
            'description'=>'required' , 
            'category_id'=>'required' , 
            
         ]; 


         $messages = [

            'title.required'=>'Please enter package title' , 
            'title.min'=>'the minimum allowed characters for title are six ' , 
            'description.required'=>'Please enter package main description' , 
            'category_id.required'=>'Please Make sure to select category' , 
             

         ];

        // validate the request 
        $this->validate($request , $rules  , $messages) ; 

        // begin database play around  : 
        $package =  Package::find($id) ; 

        $package->title = $request->title ;

        $package->description = strip_tags($request->description) ; 

        $package->category_id = $request->category_id ; 
        
        $package->status = $request->status == 'on' ? 'active' : 'not_active' ; 

        if($request->hasFile('main_image')){


            $old_package_image  = $package->main_image ; 
            if($old_package_image){

                $old_package_path   = public_path()."/uploads/packages/".$old_package_image;
                File::delete($old_package_path);

            }



            $package_image = $request->file('main_image'); 
            $extension = $package_image->getClientOriginalExtension();
            $package_image_rename = str_random(4). '.' .$extension;
            $package_image->move(public_path('uploads/packages/'), $package_image_rename) ;
            $package->main_image = $package_image_rename ; 

        }

        // then at final save  
        $package->save(); 
        // flash a success message to user  -_- 
        Session::flash('update_crud' , 'Package has been updated successfully') ; 
        // make a redirection 
        return redirect()->route('packages.index'); 


    }

   public function remove_package($id){

        dd('am here'); 
    
   }



   public function packageProducts($id){


        $package = Package::find($id); 

        $products =  $package->products ;  

        return view('backend.modules.packages.products' , compact('products' , 'package'));

   }

   /**
    * Return packages under specific category 
    */

   public function categoryPackages(Request $request){


            if($request->ajax()){

                $category = Category::find($request->category_id); 
                $packages = $category->packages ; 
                return $packages ; 

            }

   }



  
}
