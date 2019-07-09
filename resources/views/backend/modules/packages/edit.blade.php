@extends('backend.template.app')


@section('page_title' , 'Royal |-_-| Update Package information')


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

				Packages

			@endslot

			@slot('main_short_note')

				Update package information
			@endslot


			@slot('route_name')
				Update Current Package
			@endslot


			@slot('route_path')
				{{  route('packages.edit' , $package->id)  }}
			@endslot
 
 

		@endcomponent
	

@endsection


@section('content')

	

    <div class="col-sm-12 ">

		
		<div class="card">
			<div class="card-header">
				<h5>Update Current Package</h5>
				<span>this below form is used to update current package information , product will appear in our front website will be listed under packages under categories  <br> packages also  helps in filtration  </span>
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






					{!! Form::model( $package , ['route'=>['packages.update', $package->id ] , 'method'=>'post' , 'files'=>true   ]) !!}
						{!! method_field('put') !!}



						 	<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Title</label>
							<div class="col-sm-8 col-lg-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="icofont icofont-file-text"></i></span>
									<input type="text" name="title" value="{!! $package->title !!}" class="form-control " placeholder="title">
								</div>
							</div>
						</div>


						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Description</label>
							<div class="col-sm-8 col-lg-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="icofont icofont-presentation"></i></span>
									 
									<textarea name="description" class="form-control"  cols="5" rows="5" placeholder="description">{!! $package->description !!}</textarea>
								</div>
							</div>
						</div>
					 


						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Select Category</label>
							<div class="col-sm-8 col-lg-10">
								<div class="input-group">

									 


									<select name="category_id" class="js-example-basic-single ">
									 
									@if(count($categories) > 0 )
										@foreach($categories as $category)
											<option value="{{  $category->id }}" {{  $package->category_id == $category->id ? "selected":"" }}>{{ ucfirst($category->title) }}</option>
										@endforeach
									@endif
									 
									 
									</select>


									 
									 
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
											<a href="{{ asset("uploads/packages/$package->main_image") }}" data-lightbox="1" data-title="{{  $package->title }}">
											<img src="{{ asset("uploads/packages/$package->main_image") }}" alt="{{  $package->title }}" class="img-fluid img-thumbnail">
											</a>
											</div>
										</div>
										 
									</div>

								</div>
							</div>
						</div>


 

						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Publish this ?</label>
							<div class="col-sm-8 col-lg-10">
							 <div class="checkbox-fade fade-in-primary">
								<label>
									<input type="checkbox"  name="status" {!! $package->status == 'active' ? 'checked':'' !!}>
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
							 

								<button id="submit_form" class="btn btn-primary btn-outline-primary" type="submit"><i class="icofont icofont-ui-image"></i>Update current package</button>

								 
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
                message:         '<div class="dropify-message"><span class="icofont icofont-cloud-upload" /> <p>Select package image</p></div>',
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

@endsection
 
  