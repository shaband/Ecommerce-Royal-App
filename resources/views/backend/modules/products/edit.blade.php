@extends('backend.template.app')


@section('page_title' , 'Royal |-_-| Update product information')


@section('styles')

	<style>


		.j-pro .j-footer{
			
			padding: 20px 25px;
    		position: inherit;
    		background-color: #e8eaf6;
    		border-top:none;

		}

		.alert{

			margin-bottom: 0 !important ; 
		}


		#error_list{
			margin-bottom: 20px ; 
		}


		ol > li {
			color: #fc6180;
		}



		.img-thumbnail{

			    height: 200px !important;
		}



		.hide{

			display: none ; 
		}





	</style>


 

@endsection


@section('breadcrumb')

	<!-- Make use of slots and components  --> 
	<!-- @author Emad Rashad  --> 
		@component('backend.components.breadcrumb')
			 
			
			@slot('main_icon')
				
				icofont-layers

			@endslot

			@slot('main_title')

				Products

			@endslot

			@slot('main_short_note')

				Update product information
			@endslot


			@slot('route_name')
				Edit Current product
			@endslot


			@slot('route_path')
				{{  route('dashboard.edit_product' , $product->id)  }}
			@endslot
 
 

		@endcomponent
	

@endsection


@section('content')

	

    <div class="col-sm-12 ">

		
		<div class="card">
			<div class="card-header">
				<h5>Update Current Product</h5>
				<span>this below form is used to update current product information , product will appear in our front website will be listed under categories  </span>
				<div class="card-header-right"> <i class="icofont icofont-spinner-alt-5"></i> </div>
			</div>
			<div class="card-block">
				 
					<!-- errors manipulation --> 
					@if($errors->all())

						<div class="alert alert-danger background-danger">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<i class="icofont icofont-close-line-circled text-white"></i>
							</button>
							<strong>Please wait</strong> you should fix these errors before you can continue
						</div>
						<div id="error_list" class="p-20 z-depth-top-0 waves-effect" >
							<ol>
								@foreach($errors->all() as $error)
									<li>{{  $error  }}</li>
								@endforeach
							</ol>
						</div>

					@endif






					{!! Form::model( $product , ['route'=>['dashboard.update_product', $product->id ] , 'method'=>'post' , 'files'=>true   ]) !!}
						{!! method_field('put') !!}
						 


						 <div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Title</label>
							<div class="col-sm-8 col-lg-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="icofont icofont-file-text"></i></span>
									<input type="text" name="title" value="{!! $product->title !!}" class="form-control " placeholder="title">
								</div>
							</div>
						</div>


						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Description</label>
							<div class="col-sm-8 col-lg-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="icofont icofont-presentation"></i></span>
									 
									<textarea name="description" class="form-control"  cols="5" rows="5" placeholder="description">{!! $product->description  !!}</textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Additional description</label>
							<div class="col-sm-8 col-lg-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="icofont icofont-presentation"></i></span>
									<textarea name="additional_description" class="form-control "  cols="5" rows="5" placeholder="another description">{!! $product->another_description  !!}</textarea>
								</div>
							</div>
						</div>


						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Select Category</label>
							<div class="col-sm-8 col-lg-10">
								<div class="input-group">

									 


									<select name="category_id" class="js-example-basic-single " id="category_selector">
									 <option value="" selected="" disabled="">Select Category</option>
									@if(count($categories) > 0 )
										@foreach($categories as $category)
											<option data-category-id="{{  $category->id  }}" value="{{  $category->id }}" {{ ( $product->category_id == $category->id ? "selected":"") }}>{{ $category->title }}</option>
										@endforeach
									@endif
									 
									 
									</select>


								 
									 
								</div>
							</div>
						</div>



						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Select Package</label>
							<div class="col-sm-8 col-lg-10">
								<div class="input-group">

									 


									<select name="package_id" class="js-example-basic-single " id="packages_selector">
									 <option value="" selected="" disabled="" class="select_value">Select Package</option>
									 
									 



									 
									</select>


									 
								</div>
							</div>
						</div>



						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Quantity</label>
							<div class="col-sm-8 col-lg-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="icofont icofont-space-shuttle"></i></span>
									<input type="number" name="quantity" value="{!! $product->quantity !!}" class="form-control " placeholder="quantity">
								</div>
							</div>
						</div>



						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Cost Per Item</label>
							<div class="col-sm-8 col-lg-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="icofont icofont-money-bag"></i></span>
									<input type="text" name="price" value="{!! $product->price !!}" class="form-control " placeholder="price">
								</div>
							</div>
						</div>







						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Availability</label>
							<div class="col-sm-8 col-lg-10">
								<div class="input-group">
									 
								 
											<select name="availability" class="js-example-basic-single ">

										 
										<option value="instock" {{  $product->availability == 'instock' ? 'selected':'' }}>In Stock</option>
										<option value="unavailable" {{  $product->availability == 'unavailable' ? 'selected':'' }} >Unavailable</option>

									</select>


								</div>
							</div>
						</div>



						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Discount</label>
							<div class="col-sm-8 col-lg-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="icofont icofont-architecture-alt"></i></span>
									<input type="number" name="discount" value="{!! $product->discount !!}" class="form-control " placeholder="discount">
								</div>
							</div>
						</div>











						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Main image</label>
							<div class="col-sm-8 col-lg-10">


								<div class="row">	
									<div class="col-sm-6">
										<div class="input-group">
									  		<input  type="file" id="input-file-now" name="main_image"  class="dropify"  data-show-errors="true"  data-allowed-file-extensions="png jpg jpeg"/>	
									 	</div>
									</div>


									<div class="col-sm-6">
										



									 	<div class="thumbnail">
											<div class="thumb">
											<a href="{{ asset("uploads/products/main/$product->main_image") }}" data-lightbox="1" data-title="{{  $product->title }}">
											<img src="{{ asset("uploads/products/main/$product->main_image") }}" alt="{{  $product->title }}" class="img-fluid img-thumbnail">
											</a>
											</div>
										</div>
										 
									</div>

								</div>
								 
							</div>
						</div>



						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Attachements</label>
							<div class="col-sm-8 col-lg-10">
							 
									 
								  
										<input type="file" name="attachements[]" id="filer_input1" multiple="multiple">
									 
 
							</div>
						</div>


						<div class="row">
							
							<label class="col-sm-4 col-lg-2 col-form-label">Already attached</label>
							<div class="col-sm-8 col-lg-10">


								<div class="alert alert-primary hide" id="attachement_alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<i class="icofont icofont-close-line-circled"></i>
									</button>
									<strong>Warning!</strong> no image attached right now if you wish update product or drag new images to attach again 
								</div>

								<br>
							 
								
								@if(count($product->attachements) > 0 ) 

								<div class="row">
									@foreach($product->attachements as $image)

										<div class="col-xl-4 col-md-6 col-sm-6 col-xs-12 attachement_div">
											<div class="card prod-view">
												<div class="prod-item text-center">
													<div class="prod-img">

														<!-- delete option will come soon -->
														<a href="#" class="hvr-shrink " >
														<img src="{{  asset("uploads/products/attachements/$image->product_image") }}" class="img-fluid o-hidden" alt="{{ $image->product->title }}">
														</a>
														<div class="p-new"><a href="#" class="delete_attachement" data-attachement-id="{{  $image->id }}" > Delete </a></div>
													</div>
													 
												</div>
											</div>
										</div>	
											  
									@endforeach

								</div>
	 
								@endif
								   

							 
										 
									 
 
							</div>

						</div>


						


						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Publish this ?</label>
							<div class="col-sm-8 col-lg-10">
							 <div class="checkbox-fade fade-in-primary">
								<label>
									<input type="checkbox" {!! $product->status == 'active' ? 'checked':'' !!}  name="status">
									<span class="cr">
									<i class="cr-icon icofont icofont-ui-check txt-primary"></i>
									</span>
								 
								</label>
							</div>
							</div>
						</div>


						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Actions</label>
							<div class="col-sm-8 col-lg-10">
							 

								<button id="submit_form" class="btn btn-primary btn-outline-primary" type="submit"><i class="icofont icofont-ui-image"></i>Update product info</button>

								 

							</div>
						</div>


 					{!! Form::close() !!}


			</div>


	</div>   



@endsection 



@section('scripts')

	<script>
		// for image input 
		 jQuery(document).ready(function() {

         $('.dropify').dropify({
            tpl: {
                wrap:            '<div class="dropify-wrapper"></div>',
                loader:          '<div class="dropify-loader"></div>',
                message:         '<div class="dropify-message"><span class="icofont icofont-cloud-upload" /> <p>Select category image</p></div>',
                preview:         '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message"></p></div></div></div>',
                filename:        '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
                clearButton:     '<button type="button" class="dropify-clear">Remove</button>',
                errorLine:       '<p class="dropify-error"></p>',
                errorsContainer: '<div class="dropify-errors-container"><ul></ul></div>'
            }, 

             errorTimeout: 3e3,
             errorsPosition: "overlay",
             imgFileExtensions: ["png", "jpg", "jpeg"],
             allowedFileExtensions: ["png", "jpg", "jpeg"],


             messages: {
                    
                    error: "Ooops, something wrong appended."
            },


            error: {
                    
                    imageFormat: "The image format is not allowed only).",
                  
            },


        });


     });



	</script>

	



	<script>


	  $(document).ready(function(){

	  		$( "#submit_form" ).click(function() {

		  		NProgress.inc();

			});
		 

	  });
		

		 

	</script>



	<!-- script to remove an image attachement -->
	<script>
		

		$(document).ready(function(){



			var divs = $('.attachement_div').length;


			if(divs <= 0 ){

				$('#attachement_alert').removeClass('hide') ; 

			}else{

				$('#attachement_alert').addClass('hide') ;

			}
			

			$('.delete_attachement').on('click' , function(e){

				e.preventDefault(); 

				// clone a tag
				var a_tag = $(this) ; 

				// cahce pasting the whole div to remove it later after specific response -_-
				var whole_holder_div = a_tag.parent().parent().parent().parent().parent()

			 

				// return false ; 

				// get attachement id 
				var attachement_id = $(this).attr('data-attachement-id');
				 


				$.ajax({

					url:"{{  url('dashboard/products/attachement/remove//')  }}"+'/'+attachement_id , 
					method:"get" , 
					dataType:'json' , 
					beforeSend:function(){



					},
					success:function(data){


						console.log(data);

						if(data.status == 'attachement_deleted'){

							whole_holder_div.slideUp( "slow", function() {
							    whole_holder_div.remove(); 


							  

							    var count_divs = $('.attachement_div').length; 
							    
								if(count_divs <= 0 ){

									$('#attachement_alert').removeClass('hide') ; 

								}else{

									$('#attachement_alert').addClass('hide') ;

								}


							});


							
							

						}

						if(data.status == 'attachement_error'){


						}

					}


				}); 
				return false ; 

			}); 

		});
	</script>




	<script>
		

		$(document).ready(function(){

			$('#category_selector').on('change' , function(e){

				var category_selected = $(this).children(":selected").attr("data-category-id");

				$.ajax({

					url:"{{  route('packages.category_packages') }}" , 
					method:'GET' , 
					dataType:'Json' , 
					data:{category_id:category_selected}, 
					beforeSend:function(){

					}, 
					success:function(packages){

						if(packages.length > 0 ){


							$('#packages_selector')
							.find('option')
							.not('.select_value')
							.remove();

						 	packages.forEach(function(val , key){
						 		
						 		$('#packages_selector').append($('<option>', { 
							        value: val.id,
							        text : val.title 
							    }));
													 		
						 	});

						}else{

							$('#packages_selector')
							.find('option')
							.not('.select_value')
							.remove();

						}
						
					}


				}); 
				return false ; 

			});


		}); 


	</script>



	<script>
		
			$(document).ready(function(){

		 

				var category_selected = $('#category_selector').children(":selected").attr("data-category-id");

				$.ajax({

					url:"{{  route('packages.category_packages') }}" , 
					method:'GET' , 
					dataType:'Json' , 
					data:{category_id:category_selected}, 
					beforeSend:function(){

					}, 
					success:function(packages){

						if(packages.length > 0 ){

						 	packages.forEach(function(val , key){
						 		
						 		$('#packages_selector').append($('<option>', { 
							        value: val.id,
							        text : val.title 
							    }));
													 		
						 	});

						}else{

							$('#packages_selector')
							.find('option')
							.not('.select_value')
							.remove();

						}
						
					}


				}); 
				return false ; 

			 


		}); 


	</script>

@endsection
 
  