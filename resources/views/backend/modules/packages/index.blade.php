@extends('backend.template.app')


@section('page_title' , 'Royal |-_-| List Packages')


@section('styles')


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

				Control website packages
			@endslot

			@slot('route_name')
				Packages
			@endslot


			@slot('route_path')
				{{  route('packages.index')  }}
			@endslot


 

		@endcomponent



	

@endsection


@section('content')

	 


    <div class="col-sm-12 gallery-page">

		
		 


		@if(count($packages) > 0 )

			<div class="grid">

			
  
			@foreach($packages as $package )

				 <figure class="effect-hera">
					<img src="{{  asset("uploads/packages/$package->main_image")  }}" alt="{!! $package->title !!}" />
					<figcaption>
						<h2>{!! ucfirst($package->title) !!}</h2>
						 
						 <p> 	
							 
							<a href="{{ asset("uploads/packages/$package->main_image") }}" data-lightbox="4" 
								data-title='
								<div class="alert alert-primary background-primary">
									<p class="pull-right label bg-success">Category : {{ $package->category->title }}</p>

									<p class="pull-right label bg-success">By : {{ $package->admin->name }}</p>
									 <h3>{{  $package->title  }}</h3>	
									 <p> {{  $package->description }} </p>
								</div>

								'>
								<i data-toggle="tooltip" data-placement="left" data-original-title="see in details" class="icofont icofont-info-square"></i>
							</a>
							
							 
							<a href="{{ route('packages.edit', $package->id) }}">
								<i data-toggle="tooltip" data-placement="right" data-original-title="edit information" class="icofont icofont-edit"></i>
							</a>


							{{-- <a href="{{ route('packages.remove_package', $package->id) }}">
								<i data-toggle="tooltip" data-placement="left" data-original-title="delete package" class="icofont icofont-trash"></i>
							</a> --}}

							 
							<a href="{{ route('packages.products' , $package->id) }}">
								<i data-toggle="tooltip" data-placement="bottom" data-original-title="list products" class="icofont icofont-bag"></i>
							</a>
							 
						</p>
					</figcaption>
				</figure> 

			@endforeach


				

			</div>



		@else


		 
 
		<button class="btn btn-primary pull-right" data-toggle="tooltip" data-placement="top" data-original-title="Add new package"><i class="icofont icofont-ui-image" onclick="window.location.href='{{  route('packages.create')  }}'" ></i></button>
		<div class="p-20 z-depth-bottom-0 waves-effect">
			<p class="text-sm-center">We are sorry , <code>no package</code> added to the system till now </p>

		</div>
 	
 
		@endif


 



	</div>   

 
		
		
	 



@endsection 



@section('scripts')

	 
	@if(Session::has('store_crud')) 

		<script>
 			
 			 
	 		new PNotify({
			    title: 'Package Adding',
			    text: 'we are glad to inform you that Package has been added successfully ',
			    icon: 'fa fa-bell-o fa-2x'
			});


			var sound = new Audio('{{  asset('sounds/notification_crud.mp3')  }}');
			sound.loop = false;
			sound.play();
 
		</script>
	@endif



	@if(Session::has('update_crud')) 

		<script>
 			
 			 
	 		new PNotify({
			    title: 'Package Update',
			    text: 'we are glad to inform you that Package has been updated successfully ',
			    icon: 'fa fa-bell-o fa-2x'
			});


			var sound = new Audio('{{  asset('sounds/notification_crud.mp3')  }}');
			sound.loop = false;
			sound.play();
 
		</script>
	@endif



	 
 


	<script>

		// light box overlay 
	    lightbox.option({
            'resizeDuration': 300,
            'wrapAround': true
	    });

	</script>
 

@endsection
 
 