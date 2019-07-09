@extends('backend.template.app')


@section('page_title' , 'Royal |-_-| Create slider post')


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

				Slider

			@endslot

			@slot('main_short_note')

				Create new slider post
			@endslot


			@slot('route_name')
				Create New Slider
			@endslot

			@slot('route_path')
				{{  route('slider.create')  }}
			@endslot
 
 

		@endcomponent
	

@endsection


@section('content')

	

    <div class="col-sm-12 ">

		
		<div class="card">
			<div class="card-header">
				<h5>New Slider Post</h5>
				<span>this below form is used to create a new slider post , this post will appear in our front website as a slide in the home page <br> sliders helps users , visitors to interact with website so make sure to pick a good quality , meaningful pictures </span>
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






					{!! Form::open(['route'=>'slider.store' , 'method'=>'post' , 'files'=>true   ]) !!}
						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Slide Title</label>
							<div class="col-sm-8 col-lg-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="icofont icofont-file-text"></i></span>
									<input type="text" name="title" value="{!! old('title') !!}" class="form-control " placeholder="slide title">
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Slide Description</label>
							<div class="col-sm-8 col-lg-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="icofont icofont-presentation"></i></span>
									 
									<textarea name="description" class="form-control"  cols="5" rows="5" placeholder="slide description">{!! old('description')  !!}</textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Additional description</label>
							<div class="col-sm-8 col-lg-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="icofont icofont-presentation"></i></span>
									<textarea name="additional_description" class="form-control "  cols="5" rows="5" placeholder="additional description">{!! old('additional_description')  !!}</textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Slide image</label>
							<div class="col-sm-8 col-lg-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="icofont icofont-file-tiff"></i></span>
									  <input  type="file" id="input-file-now" name="slide_image"  class="dropify"  data-show-errors="true"  data-allowed-file-extensions="png jpg jpeg"/>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Publish this ?</label>
							<div class="col-sm-8 col-lg-10">
							 <div class="checkbox-fade fade-in-primary">
								<label>
									<input type="checkbox"  name="is_active">
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
							 

								<button id="submit_form" class="btn btn-primary btn-outline-primary" type="submit"><i class="icofont icofont-ui-image"></i>Add new slider</button>

								<button class="btn btn-inverse btn-outline-inverse" type="reset"><i class="icofont icofont-exchange"></i>Reset</button>

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
                message:         '<div class="dropify-message"><span class="icofont icofont-cloud-upload" /> <p>Select slide image</p></div>',
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
 
  