@extends('backend.template.app')


@section('page_title' , 'Royal |-_-| List Categories')


@section('styles')


@section('breadcrumb')

	<!-- Make use of slots and components  --> 
	<!-- @author Emad Rashad  --> 
		@component('backend.components.breadcrumb')
			 
			
			@slot('main_icon')
				
				icofont-layers

			@endslot

			@slot('main_title')

				Categories

			@endslot

			@slot('main_short_note')

				Control website categories
			@endslot

			@slot('route_name')
				Categories
			@endslot


			@slot('route_path')
				{{  route('dashboard.categories')  }}
			@endslot



 			
 

		@endcomponent


		{{-- {{  url(Route::current()->uri)  }} --}}
	

@endsection


@section('content')

	 


    <div class="col-sm-12 gallery-page">

		
		 


		@if(count($categories) > 0 )

			<div class="grid">

			
  
			@foreach($categories as $category )

				 <figure class="effect-hera">
					<img src="{{  asset("uploads/categories/$category->category_image")  }}" alt="{!! $category->title !!}" />
					<figcaption>
						<h2>{!! ucfirst($category->title) !!}</h2>
						 
						 <p> 	
							 
							<a href="{{ asset("uploads/categories/$category->category_image") }}" data-lightbox="4" 
								data-title='
								<div class="alert alert-primary background-primary">
									<p class="pull-right label bg-success">Uploaded : {{  date("F j, Y, g:i a" , strtotime($category->created_at))  }}</p>

									<p class="pull-right label bg-success">By : {{ $category->admin->name }}</p>
									 <h3>{{  $category->title  }}</h3>	
									 <p> {{  $category->description }} </p>
								</div>

								'>
								<i data-toggle="tooltip" data-placement="left" data-original-title="see in details" class="icofont icofont-info-square"></i>
							</a>
							
							 
							<a href="{{ route('dashboard.edit_category', $category->id) }}">
								<i data-toggle="tooltip" data-placement="right" data-original-title="edit information" class="icofont icofont-edit"></i>
							</a>

							 
							<a href="{{ route('dashboard.category_products' , $category->id) }}">
								<i data-toggle="tooltip" data-placement="bottom" data-original-title="list products" class="icofont icofont-bag"></i>
							</a>
							 
						</p>
					</figcaption>
				</figure> 

			@endforeach


				

			</div>



		@else


		 
 
		{{-- <button class="btn btn-primary pull-right" data-toggle="tooltip" data-placement="top" data-original-title="Add new category"><i class="icofont icofont-ui-image" onclick="window.location.href='{{  route('slider.create')  }}'" ></i></button> --}}
		<div class="p-20 z-depth-bottom-0 waves-effect">
			<p class="text-sm-center">We are sorry , <code>no category</code> added to the system till now </p>

		</div>
 	
 
		@endif


 



	</div>   

 
		
		
	 



@endsection 



@section('scripts')

	 
	@if(Session::has('update_crud')) 

		<script>
 			
 			 
	 		new PNotify({
			    title: 'Category Update',
			    text: 'we are glad to inform you that Category has been updated successfully ',
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
 
 