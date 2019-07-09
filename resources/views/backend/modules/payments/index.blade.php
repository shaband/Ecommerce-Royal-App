@extends('backend.template.app')


@section('page_title' , 'Royal |-_-| Payment Gateway ')


@section('styles')
	
	<style>
			
		#error_list{
			margin-bottom: 20px ; 
		}


		#errors_div{

			margin-bottom: 0px;
		}



		.alert-danger{


				background-color: #ffb64d !important;
			    border-color: #ffb64d !important;
		}

		.background-danger{

			    background-color: #ffb64d;
    			color: #000;
		}


	</style>


@endsection


@section('breadcrumb')

	<!-- Make use of slots and components  --> 
	<!-- @author Emad Rashad  --> 
		@component('backend.components.breadcrumb')
			 
			
			@slot('main_icon')
				
				icofont-ui-settings

			@endslot

			@slot('main_title')

				Payment Gateway Configurator 

			@endslot

			@slot('main_short_note')

				Control your website integaration with Paytabs Payment Gateway
			@endslot

			@slot('route_name')
				Payment Gateway Configurator 
			@endslot


			@slot('route_path')
				{{  route('backend.payment_configuration')  }}
			@endslot
 
 

		@endcomponent
	

@endsection


@section('content')

	 


    <div class="col-sm-12 ">

		
		 


		 	<div class="card">
			<div class="card-header">
				<h5>Website Payment Gateway Configurator</h5>
				<span>
					please use the below form carefully , cause these are the information you will recieve you funds through , everything must correct in order to make every thing works perfect  
				</span>


				<div class="card-header-right"> <i class="icofont icofont-spinner-alt-5"></i> </div>
			</div>
			<div class="card-block">
				 
					<!-- errors manipulation --> 
					@if($errors->all())

						<div class="alert alert-danger background-danger " id="errors_div">
							{{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<i class="icofont icofont-close-line-circled text-white"></i>
							</button> --}}
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






					{!! Form::model( $payment_configuration ,  ['route'=>['backend.post_payment_configuration' , $payment_configuration->id ] , 'method'=>'post'  ]) !!}

						{!! method_field('put') !!}

						 
						 



						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Merchant Email</label>
							<div class="col-sm-8 col-lg-10">
 
								 <div class="input-group">
									<span class="input-group-addon"><i class="icofont icofont-ui-email"></i></span>
									<input type="text" name="merchant_email" value="{!! $payment_configuration->merchant_email !!}" class="form-control " placeholder="Merchant email">
								</div>

							</div>
						</div>


						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Secret Key</label>
							<div class="col-sm-8 col-lg-10">
 
								 <div class="input-group">
									<span class="input-group-addon"><i class="icofont icofont-ui-email"></i></span>
									<input type="text" name="secret_key" value="{!! $payment_configuration->secret_key !!}" class="form-control " placeholder="Secret key">
								</div>
							</div>
						</div>

						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Reference Number</label>
							<div class="col-sm-8 col-lg-10">
 
								 <div class="input-group">
									<span class="input-group-addon"><i class="icofont icofont-ui-cell-phone"></i></span>
									<input type="text" name="reference_no" value="{!! $payment_configuration->reference_no !!}" class="form-control " placeholder="Reference number">
								</div>
							</div>
						</div>


						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Site URL</label>
							<div class="col-sm-8 col-lg-10">
 
								 <div class="input-group">
									<span class="input-group-addon"><i class="icofont icofont-code-not-allowed"></i></span>
									<input type="text" name="site_url" value="{!! $payment_configuration->site_url !!}" class="form-control " placeholder="Site url">
								</div>
							</div>
						</div>


						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Version and Platform</label>
							<div class="col-sm-8 col-lg-10">
 
								 <div class="input-group">
									<span class="input-group-addon"><i class="icofont icofont-toy-hand"></i></span>
									<input type="text" name="cms_with_version" value="{!! $payment_configuration->cms_with_version !!}" class="form-control " placeholder="Version and Platform">
								</div>
							</div>
						</div>
						 
						 

						<div class="row">
							<label class="col-sm-4 col-lg-2 col-form-label">Actions</label>
							<div class="col-sm-4 col-lg-4">
							  
								<button id="submit_form" class="btn btn-primary btn-outline-primary" type="submit"><i class="icofont icofont-ui-image"></i>Update Payment Configuration</button>
  
							</div>


							<div class="col-sm-4 col-lg-4">

								<img style="opacity: 0.23;" src='https://www.paytabs.com/seals/08.png' />

							</div>
						</div>


 					{!! Form::close() !!}


			</div>





	</div>   

 
		
		
	 



@endsection 



@section('scripts')

	<!-- Session Create --> 
	@if(Session::has('update_payment_configuration_error'))

	
	 

		<script>
 			
  
	 		new PNotify({
			    title: 'Payment Config Errors',
			    text: '{!! Session::get('update_payment_configuration_error') !!}',
			    icon: 'fa fa-bell-o fa-2x', 
			    type: 'error'
			});


			var sound = new Audio('{{  asset('sounds/notification_crud.mp3')  }}');
			sound.loop = false;
			sound.play();
 
		</script>
	@endif


	<!-- Session Create --> 
	@if(Session::has('update_payment_configuration_success'))

	
	 

		<script>
 			
  
	 		new PNotify({
			    title: 'Payment Config Success',
			    text: '{!! Session::get('update_payment_configuration_success') !!}',
			    icon: 'fa fa-bell-o fa-2x' 
			    
			});


			var sound = new Audio('{{  asset('sounds/notification_crud.mp3')  }}');
			sound.loop = false;
			sound.play();
 
		</script>
	@endif

 
 

@endsection
 
 