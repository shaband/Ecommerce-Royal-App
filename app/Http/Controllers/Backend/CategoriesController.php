<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Models\Product ; 
use App\Models\ProductMedia  ; 
use App\Models\Category  ; 

use Auth ; 
use File ;
use Session ; 
use Storage ; 


class CategoriesController extends Controller
{
    
    public function index(){

    	$categories = Category::all() ; 

    	return view('backend.modules.categories.index' , compact('categories')); 

    }


    public function edit($id){

    	$category = Category::find($id); 
    	return view('backend.modules.categories.edit' , compact('category')); 
    }



    public function update(Request $request , $id){


    	$rules = [

			'title'=>'required' , 
			'description'=>'required' , 
			 
		]; 


		$messages = [

			'title.required'=>'Please enter category title' , 
			'description.required'=>'Please enter category main  description' , 
			 
		]; 

		$this->validate($request,$rules,$messages);



		$category = Category::find($id) ; 

		$category->title = $request->title ; 
		$category->description = $request->description ; 
		$category->another_description = $request->additional_description ; 
		$category->status = $request->status == 'on' ? 'active' : 'not_active' ; 



		if($request->hasFile('category_image')){



			// incoming request has a new slide image attached with it  
			// so , i need to upload the new one and getride of the oldest one  
			
			$old_cat_image  = $category->category_image ; 
			if($old_cat_image){

            	$old_slide_path   = public_path()."/uploads/categories/".$old_cat_image;
            	File::delete($old_slide_path);

            }


            // begin crud for the new image  

			$category_image = $request->file('category_image'); 
			$extension = $category_image->getClientOriginalExtension();
            $cat_image_rename = str_random(4). '.' .$extension;
            $category_image->move(public_path('uploads/categories'), $cat_image_rename) ;
            $category->category_image = $cat_image_rename ; 

		}



		$category->save(); 

		// flash a success message to user  -_- 
		Session::flash('update_crud' , 'Category has been updated successfully') ; 
		// make a redirection 
		return redirect()->route('dashboard.categories'); 






    }



    public function category_products($id){


    	  $category = Category::find($id) ; 
    	  $products = $category->products ; 

    	  return view('backend.modules.categories.products' , compact('products' , 'category')); 

    }

}
