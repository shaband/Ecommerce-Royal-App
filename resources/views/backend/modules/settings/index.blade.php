@extends('backend.template.app')


@section('page_title' , 'Royal |-_-| General Settings ')


@section('styles')


@section('breadcrumb')

	<!-- Make use of slots and components  --> 
	<!-- @author Emad Rashad  --> 
		@component('backend.components.breadcrumb')
			 
			
			@slot('main_icon')
				
				icofont-ui-settings

			@endslot

			@slot('main_title')

				General settings

			@endslot

			@slot('main_short_note')

				Control your website general settings
			@endslot

			@slot('route_name')
				General Settings
			@endslot


			@slot('route_path')
				{{  route('dashboard.get_settings')  }}
			@endslot
 
 

		@endcomponent
	

@endsection


@section('content')

	 


    <div class="col-sm-12 ">

		
		 


		 	<div class="card">
			<div class="card-header">
				<h5>Website General Settings</h5>
				<span>You can use the below options to control you website , improve seo optimization  <br> 
				as well as putting website into maintenance mode , or under construction mode 
				</span>
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






					{!! Form::model( $settings ,  ['route'=>['dashboard.post_settings_update' , $settings->id ] , 'method'=>'post'  ]) !!}

						{!! method_field('put') !!}

						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Options</label>
							<div class="col-sm-8 col-lg-10">


								<!-- site options come here  active - under construction etc  --> 
								 <div class=" radio-inline">

									<label>
										<input type="radio" name="site_status"  value="live" {!! $settings->site_status == 'live' ? 'checked':'' !!}>
										<i class="helper"></i>Live
									</label>


									<label>
										<input type="radio" name="site_status" value="under_construction" {!! $settings->site_status == 'under_construction' ? 'checked':'' !!} >
										<i class="helper"></i>Under Construction
									</label>


									<label>
										<input type="radio" name="site_status" value="under_maintenance"  {!! $settings->site_status == 'under_maintenance' ? 'checked':'' !!}>
										<i class="helper"></i>Under Maintenance
									</label>

								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Seo Description</label>
							<div class="col-sm-8 col-lg-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="icofont icofont-presentation"></i></span>
									 
									<textarea name="seo_description" class="form-control"  cols="5" rows="5" placeholder="website description">{!! $settings->seo_description  !!}</textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Seo Keywords</label>
							<div class="col-sm-8 col-lg-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="icofont icofont-presentation"></i></span>
									<textarea name="seo_keywords" class="form-control "  cols="5" rows="5" placeholder="website seo keywords">{!! $settings->seo_keywords  !!}</textarea>
								</div>
							</div>
						</div>




						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Contact Email</label>
							<div class="col-sm-8 col-lg-10">
 
								 <div class="input-group">
									<span class="input-group-addon"><i class="icofont icofont-ui-email"></i></span>
									<input type="text" name="contact_email" value="{!! $settings->contact_email !!}" class="form-control " placeholder="contact email">
								</div>
							</div>
						</div>


						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Header Email</label>
							<div class="col-sm-8 col-lg-10">
 
								 <div class="input-group">
									<span class="input-group-addon"><i class="icofont icofont-ui-email"></i></span>
									<input type="text" name="header_email" value="  {!! $settings->header_email !!}  " class="form-control " placeholder="header email">
								</div>
							</div>
						</div>

						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Header Phone</label>
							<div class="col-sm-8 col-lg-10">
 
								 <div class="input-group">
									<span class="input-group-addon"><i class="icofont icofont-ui-cell-phone"></i></span>
									<input type="text" name="header_phone" value=" {!! $settings->header_phone !!} " class="form-control " placeholder="header phone">
								</div>
							</div>
						</div>


						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Google Analytic</label>
							<div class="col-sm-8 col-lg-10">
 
								 <div class="input-group">
									<span class="input-group-addon"><i class="icofont icofont-code-not-allowed"></i></span>
									<input type="text" name="google_analytic_number" value="{!! $settings->google_analytic_number !!}" class="form-control " placeholder="Google analytic number">
								</div>
							</div>
						</div>


						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Shipping Cost</label>
							<div class="col-sm-8 col-lg-10">
 
								 <div class="input-group">
									<span class="input-group-addon"><i class="icofont icofont-money"></i></span>
									<input type="text" name="shipping_cost" value="{!! $settings->shipping_cost !!}" class="form-control " placeholder="Shipping cost">
								</div>
							</div>
						</div>
						 
						 

						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Actions</label>
							<div class="col-sm-8 col-lg-10">
							 

								<button id="submit_form" class="btn btn-primary btn-outline-primary" type="submit"><i class="icofont icofont-ui-image"></i>Update general settings</button>

							 

							</div>
						</div>


 					{!! Form::close() !!}


			</div>





	</div>   

 
		
		
	 



@endsection 



@section('scripts')

	<!-- Session Create --> 
	@if(Session::has('update_crud'))

	
	 

		<script>
 			
  
	 		new PNotify({
			    title: 'General settings',
			    text: 'we are glad to inform you that your website general settings has been updated successfully',
			    icon: 'fa fa-bell-o fa-2x'
			});


			var sound = new Audio('{{  asset('sounds/notification_crud.mp3')  }}');
			sound.loop = false;
			sound.play();
 
		</script>
	@endif

 
 

@endsection
 
 