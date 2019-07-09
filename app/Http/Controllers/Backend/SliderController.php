<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Slider ; 

use File ;
use Session ; 
use Storage ; 
use Auth ; 

class SliderController extends Controller
{
   
	/**
	 * List all slides  
	 * @return collection of slides -_- 
	 */
	public function index(){

		$slides = Slider::latest()->paginate(6) ; 
		
		return view('backend.modules.slider.index' , compact('slides')); 
	}


	public function create(){

		return view('backend.modules.slider.create');
	}


	public function store(Request $request){


		 $rules = [

		 	'title'=>'required|min:6' , 
		 	'description'=>'required' , 
		 	'slide_image'=>'required' ,  
		 ]; 


		 $messages = [

		 	'title.required'=>'Please enter slide title' , 
		 	'title.min'=>'the minimum allowed characters for title are six ' , 
		 	'description.required'=>'Please enter slide post description' , 
		 	'slide_image.required'=>'Please make sure to select slide post image' , 

		 ];

		// validate the request 
		$this->validate($request , $rules  , $messages) ; 

		// begin database play around  : 
		$slide = new Slider ; 

		$slide->title = $request->title ; 
		$slide->description = strip_tags($request->description) ; 
		$slide->another_description = strip_tags($request->additional_description) ; 
		$slide->is_active = $request->is_active == 'on' ? 'active' : 'not_active' ; 
		$slide->added_by = Auth::user()->id ; 

		if($request->hasFile('slide_image')){

			$slide_image = $request->file('slide_image'); 
			$extension = $slide_image->getClientOriginalExtension();
            $slide_rename = str_random(4). '.' .$extension;
            $slide_image->move(public_path('uploads/slider'), $slide_rename) ;
            $slide->slide_image = $slide_rename ; 

		}

		// then at final save  
		$slide->save(); 
		// flash a success message to user  -_- 
		Session::flash('store_crud' , 'A new slider post has been added successfully') ; 
		// make a redirection 
		return redirect()->route('slider.index'); 

	}




	public function edit($id){

		$slide = Slider::find($id);

		return view('backend.modules.slider.edit' , compact('slide')); 
	}

	public function update(Request $request , $id){

		$rules = [

		 	'title'=>'required|min:6' , 
		 	'description'=>'required'  
		 	   
		 ]; 


		 $messages = [

		 	'title.required'=>'Please enter slide title' , 
		 	'title.min'=>'the minimum allowed characters for title are six ' , 
		 	'description.required'=>'Please enter slide post description' 
		 	

		 ];

		// validate the request 
		$this->validate($request , $rules  , $messages) ; 

		// begin database play around  : 
		$slide =  Slider::find($id) ; 

		$slide->title = $request->title ; 
		$slide->description = strip_tags($request->description) ; 
		$slide->another_description = strip_tags($request->additional_description) ; 
		$slide->is_active = $request->is_active == 'on' ? 'active' : 'not_active' ; 
		$slide->added_by = Auth::user()->id ; 

		if($request->hasFile('slide_image')){



			// incoming request has a new slide image attached with it  
			// so , i need to upload the new one and getride of the oldest one  
			
			$old_slide_image  = $slide->slide_image ; 
            $old_slide_path   = public_path()."/uploads/slider/".$old_slide_image;
            File::delete($old_slide_path);

            // begin crud for the new image  

			$slide_image = $request->file('slide_image'); 
			$extension = $slide_image->getClientOriginalExtension();
            $slide_rename = str_random(4). '.' .$extension;
            $slide_image->move(public_path('uploads/slider'), $slide_rename) ;
            $slide->slide_image = $slide_rename ; 

		}

		// then at final save  
		$slide->save(); 
		// flash a success message to user  -_- 
		Session::flash('update_crud' , 'Slider post has been updated successfully'); 
		// make a redirection 
		return redirect()->route('slider.index');  

	}



	public function remove($id){


		 $slide = Slider::find($id) ; 


		 // remember to delete image :
		 $old_slide_image  = $slide->slide_image ; 
         $old_slide_path   = public_path()."/uploads/slider/".$old_slide_image;
         File::delete($old_slide_path);


		 // delete slide record  
		 $slide->delete(); 


		// flash a success message to user  -_- 
		Session::flash('destroy_crud' , 'Slider post has been deleted successfully') ; 
		// make a redirection 
		return redirect()->route('slider.index'); 

	}

}
