@extends('backend.template.app')


@section('page_title' , 'Royal |-_-| List Slider posts')


@section('styles')


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

				Control website front slider posts
			@endslot

			@slot('route_name')
				Slider
			@endslot

			@slot('route_path')
				{{  route('slider.index')  }}
			@endslot
 
 

		@endcomponent
	

@endsection


@section('content')

	 


    <div class="col-sm-12 gallery-page">

		
		{!! $slides->links() !!}


		@if(count($slides) > 0 )

			<div class="grid">

			

			<!-- this is the slider module that will be implemented  --> 
			<!-- Each figure is a slide post  or article or whatever you say on it  --> 
			@foreach($slides as $slide )

				 <figure class="effect-hera">
					<img src="{{  asset("uploads/slider/$slide->slide_image")  }}" alt="{!! $slide->title !!}" />
					<figcaption>
						<h2>{!! ucfirst($slide->title) !!}</h2>
						 
						 <p> 	
							<!--  See in details  --> 
							<a href="{{ asset("uploads/slider/$slide->slide_image") }}" data-lightbox="4" 
								data-title='
								<div class="alert alert-primary background-primary">
									<p class="pull-right label bg-success">Uploaded : {{  date("F j, Y, g:i a" , strtotime($slide->created_at))  }}</p>

									<p class="pull-right label bg-success">By : {{ $slide->admin->name }}</p>
									 <h3>{{  $slide->title  }}</h3>	
									 <p> {{  $slide->description }} </p>
								</div>

								'>
								<i data-toggle="tooltip" data-placement="left" data-original-title="see in details" class="icofont icofont-info-square"></i>
							</a>
							
							<!-- edit information -->
							<a href="{{ route('slider.edit', $slide->id) }}">
								<i data-toggle="tooltip" data-placement="right" data-original-title="edit information" class="icofont icofont-edit"></i>
							</a>

							<!-- Delete slide image  --> 
							<a href="{{ url("dashboard/slider/remove/$slide->id" ) }}">
								<i data-toggle="tooltip" data-placement="bottom" data-original-title="delete slide image" class="icofont icofont-ui-delete"></i>
							</a>
							 
						</p>
					</figcaption>
				</figure> 

			@endforeach


				

			</div>



		@else
 
		<button class="btn btn-primary pull-right" data-toggle="tooltip" data-placement="top" data-original-title="Add new slide"><i class="icofont icofont-ui-image" onclick="window.location.href='{{  route('slider.create')  }}'" ></i></button>
		<div class="p-20 z-depth-bottom-0 waves-effect">
			<p class="text-sm-center">We are sorry , <code>no slider posts</code> added to the system till now </p>

		</div>
 	
 
		@endif







	</div>   

 
		
		
	 



@endsection 



@section('scripts')

	<!-- Session Create --> 
	@if(Session::has('store_crud'))

	
		{{-- <script>
			
			// this is example on desktop notification
			PNotify.desktop.permission();
			(new PNotify({
			    title: 'Slide Post Notification',
			    text: 'a new slider post has been addded successfuly to the system , enjoy !',
			    desktop: {
			        desktop: true
			    }
			}));

		</script> --}}

		<script>
 			
 			// Simple notification with sound  
	 		new PNotify({
			    title: 'Slider Post Crafting',
			    text: 'we are glad to inform you that a new slider post has been added successfully to you database records ',
			    icon: 'fa fa-bell-o fa-2x'
			});


			var sound = new Audio('{{  asset('sounds/notification_crud.mp3')  }}');
			sound.loop = false;
			sound.play();
 
		</script>
	@endif



	<!-- Session Update --> 
	@if(Session::has('update_crud'))

	
		 
		<script>
 			
 			// Simple notification with sound  
	 		new PNotify({
			    title: 'Slider Post Update',
			    text: 'we are glad to inform you that  slider post has been updated successfully',
			    icon: 'fa fa-bell-o fa-2x'
			});


			var sound = new Audio('{{  asset('sounds/notification_crud.mp3')  }}');
			sound.loop = false;
			sound.play();
 
		</script>


	@endif



	
	<!-- Session Destroy -->
	@if(Session::has('destroy_crud'))

			
		<script>
 			
 			// Simple notification with sound  
	 		new PNotify({
			    title: 'Slider Post Deletion',
			    text: 'we are glad to inform you that slider post has been deleted successfully from database records ',
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
 
 