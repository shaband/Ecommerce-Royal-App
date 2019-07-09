@extends('backend.template.app')


@section('page_title' , 'Royal |-_-| Edit Social Media Link')


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
				
				icofont-abacus-alt

			@endslot

			@slot('main_title')

				Social Media

			@endslot

			@slot('main_short_note')

				Edit  social media link 
			@endslot



			@slot('route_name')
				Edit Current social media
			@endslot


			@slot('route_path')
				{{  route('social-media.edit' , $link->id)  }}
			@endslot
 

		@endcomponent
	

@endsection


@section('content')

	

    <div class="col-sm-12 ">

		
		<div class="card">
			<div class="card-header">
				<h5> Social Media link</h5>
				<span>this below form is used to update current social media link ,  social media helps in increasing websites visitor and spreading of your website  , that link should appear in footer of your front website</span>
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
									<li>{!! $error  !!}</li>
								@endforeach
							</ol>
						</div>

					@endif






					{!! Form::model($link , ['route'=>['social-media.update' , $link->id ], 'method'=>'post' , 'files'=>true   ]) !!}
						
						
						 {!! method_field('PUT') !!}

						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Name of Link</label>
							<div class="col-sm-8 col-lg-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="icofont icofont-file-text"></i></span>
									<input type="text" name="name" value="{!! $link->name !!}" class="form-control " placeholder="name of the link">
								</div>
							</div>
						</div>


						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Url</label>
							<div class="col-sm-8 col-lg-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="icofont icofont-presentation"></i></span>
									 
									 <input type="url" name="url" value="{!! $link->url !!}" class="form-control " placeholder="link url">
								</div>
							</div>
						</div>


						 <div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Social icon</label>
							<div class="col-sm-8 col-lg-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="icofont icofont-presentation"></i></span>
									 
									 <input type="text" name="icon" value="{!! $link->icon !!}" class="form-control " placeholder="link icon">
								</div>
							</div>
						</div>
						 

 
  


						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Publish this ?</label>
							<div class="col-sm-8 col-lg-10">
							 <div class="checkbox-fade fade-in-primary">
								<label>
									<input type="checkbox"  name="status" {!! $link->status == 'active' ? 'checked':'' !!}>
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
							 

								<button id="submit_form" class="btn btn-primary btn-outline-primary" type="submit"><i class="icofont icofont-ui-image"></i>Edit Current social link</button>

							 

							</div>
						</div>


 					{!! Form::close() !!}


			</div>


	</div>   



@endsection 



@section('scripts')
 
 

	<script>


	  $(document).ready(function(){

	  		$( "#submit_form" ).click(function() {

		  		NProgress.inc();

			});
		 

	  });
		

		 

	</script>

 


@endsection
 
  