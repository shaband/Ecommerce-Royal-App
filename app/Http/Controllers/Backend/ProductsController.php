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



class ProductsController extends Controller
{
    

	public function index(){


		$products = Product::latest()->paginate(10);

		return view('backend.modules.products.index' , compact('products')); 

	}



	public function create_product(){


		// send categories with our view  -_- 
		$categories = Category::where('status' , 'active')->get(); 
		return view('backend.modules.products.create' , compact('categories')); 

	}



	public function post_product(Request $request){



		
		$rules = [

			'title'=>'required' , 
			'description'=>'required' , 
			// 'quantity'=>'required' , 
			'price'=>'required' , 
			'main_image'=>'required'  , 
			'category_id'=>'required' ,
			'package_id'=>'required' , 
		]; 


		$messages = [

			'title.required'=>'Please enter product title' , 
			'description.required'=>'Please enter product main description' , 
			// 'quantity.required'=>'You should enter product quantity' , 
			'price.required'=>'Please you need to add product price' , 
			'main_image.required'=>'Please make sure to select product main image', 
			'category_id.required'=>'Please make sure to select product category', 
			'package_id.required'=>'Please make sure to select product package', 

		]; 


		 



		$this->validate($request,$rules,$messages); 



		$product  = new Product ; 

		$product->code =  'prod_'.str_random(4) ; 
		$product->title = $request->title ; 
		$product->description = $request->description ; 
		$product->another_description = $request->additional_description ; 
		$product->category_id = $request->category_id ; 
		$product->package_id = $request->package_id ; 
		$product->quantity = $request->quantity ; 
		$product->availability = $request->availability  ; 
		 
		$product->price = $request->price  ; 
		$product->discount = $request->discount  ; 
		$product->added_by = Auth::user()->id ; 
		$product->status = $request->status == 'on' ? 'active':'not_active' ; 



		// main product image  : 
		if($request->hasFile('main_image')){

			$product_main_image = $request->file('main_image'); 
			$extension = $product_main_image->getClientOriginalExtension();
            $product_main_image_rename = 'main_img_'.str_random(4). '.' .$extension;
            $product_main_image->move(public_path('uploads/products/main/'), $product_main_image_rename) ;
            $product->main_image = $product_main_image_rename ; 

		}



		// save product 
		$product->save(); 



		// product attachements : 
		// we save each product attachement into a separated table  
		// am limiting attachements to 4 images only through file init  javascript 
		if($request->hasFile('attachements')){

			$attachements = $request->file('attachements'); 

			foreach ($attachements as $attachement) {
			
				 
				$extension = $attachement->getClientOriginalExtension();
	            $product_attachement_image_rename = 'attachement_img_'.str_random(4). '.' .$extension;
	            $attachement->move(public_path('uploads/products/attachements/'), $product_attachement_image_rename) ;


	            $media = new ProductMedia ; 

	            $media->product_id = $product->id ; 
	            $media->product_image =$product_attachement_image_rename ; 

	            $media->save(); 


			}

		 

		}




		// flash a success message to user  -_- 
		Session::flash('store_crud' , 'A product has been added successfully') ; 
		// make a redirection 
		return redirect()->route('dashboard.products'); 



		 
	}


	public function edit_product($id){


		$product = Product::find($id) ; 

		$categories = Category::where('status' , 'active')->get(); 
		return view('backend.modules.products.edit' , compact('product' , 'categories')); 

	}



	public function update_product(Request $request , $id){


		$rules = [

			'title'=>'required' , 
			'description'=>'required' , 
			// 'quantity'=>'required' , 
			'price'=>'required' , 
			'category_id'=>'required' ,
			'package_id'=>'required' ,
		]; 


		$messages = [

			'title.required'=>'Please enter product title' , 
			'description.required'=>'Please enter product main description' , 
			// 'quantity.required'=>'You should enter product quantity' , 
			'price.required'=>'Please you need to add product price' , 
			'category_id.required'=>'Please make sure to select product category', 
			'package_id.required'=>'Please make sure to select product package', 
		]; 



		$this->validate($request,$rules,$messages);


		$product  = Product::find($id) ; 

		 
		$product->title = $request->title ; 
		$product->description = $request->description ; 
		$product->another_description = $request->additional_description ; 
		$product->category_id = $request->category_id ; 
		$product->package_id = $request->package_id ; 
		$product->quantity = $request->quantity ; 
		$product->availability = $request->availability  ; 
		$product->price = $request->price  ; 
		$product->discount = $request->discount  ; 
		$product->status = $request->status == 'on' ? 'active':'not_active' ; 



		// main product image  : 
		if($request->hasFile('main_image')){



			// incoming request has a new slide image attached with it  
			// so , i need to upload the new one and getride of the oldest one  
			
			$old_main_product_image  = $product->main_image ; 
			if($old_main_product_image){

            	$old_image_path   = public_path()."/uploads/products/main/".$old_main_product_image;
            	File::delete($old_image_path);

            }



			$product_main_image = $request->file('main_image'); 
			$extension = $product_main_image->getClientOriginalExtension();
            $product_main_image_rename = 'main_img_'.str_random(4). '.' .$extension;
            $product_main_image->move(public_path('uploads/products/main/'), $product_main_image_rename) ;
            $product->main_image = $product_main_image_rename ; 

		}



		// save product 
		$product->save(); 



		// product attachements : 
		// we save each product attachement into a separated table  
		// am limiting attachements to 4 images only through file init  javascript 
		if($request->hasFile('attachements')){





			$attachements = $request->file('attachements'); 

			foreach ($attachements as $attachement) {
			
				 
				$extension = $attachement->getClientOriginalExtension();
	            $product_attachement_image_rename = 'attachement_img_'.str_random(4). '.' .$extension;
	            $attachement->move(public_path('uploads/products/attachements/'), $product_attachement_image_rename) ;


	            $media = new ProductMedia ; 

	            $media->product_id = $product->id ; 
	            $media->product_image =$product_attachement_image_rename ; 

	            $media->save(); 


			}

		 

		}



		// flash a success message to user  -_- 
		Session::flash('update_crud' , 'A product has been updated successfully') ; 
		// make a redirection 
		return redirect()->route('dashboard.products'); 









	}

	/**
	 * Remove Product
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function remove(Request $request ,  $id){


		// delete a product it self  
		// i must take care of its main image and attachements -_- 
		// so lets fucking do it man  -_- 
		
		if($request->ajax()){


			$product = Product::find($id) ; 


			// remove main image file  
		 	$main_image = $product->main_image ; 
            $old_main_image_path   = public_path()."/uploads/products/main/".$main_image;
            File::delete($old_main_image_path);

			// remove attachements if found also i mean images it self 
			$attachements = $product->attachements ; 

			if(count($attachements) > 0){

				foreach ($attachements as $attachement) {
					
					$image = $attachement->product_image ; 
            		$old_attachement_image_path   = public_path()."/uploads/products/attachements/".$image;
            		File::delete($old_attachement_image_path);

				}

			}
			

			// then destroy product record it self  
			if($product->destroy($id)){


				// flash a success message to user  -_- 
				Session::flash('delete_crud' , 'A product has been updated successfully') ; 
		  
				return response()->json([

					'status'=>'product_deleted'

				]);
			}else{

				return response()->json([

					'status'=>'product_delete_error'

				]);


			}

		}

		 

	}



	public function removeAttachement(Request $request , $id){



		if($request->ajax()){

			// get the attachement -_- 
		 	$attachement = ProductMedia::find($id) ;
		 	$old_attachement_image  = $attachement->product_image ; 
            $old_image_path   = public_path()."/uploads/products/attachements/".$old_attachement_image;

            // delete image  
            File::delete($old_image_path);

            // then delete the record it self  -_- 
            if($attachement->destroy($id)){

            	return response()->json([

            		'status'=>'attachement_deleted'

            	]);
            }else{

            	return response()->json([

            		'status'=>'attachement_error'

            	]);
            }



            
			
		}



		
	}


}
