@extends('backend.template.app')


@section('page_title' , 'Royal |-_-| List Social Media')


@section('styles')

	
	<style>
		.prod_image {
		    max-width: 15%;
		    height: auto;
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

				Social Media

			@endslot

			@slot('main_short_note')

				Control website Social media links 
			@endslot


			@slot('route_name')
				Social Media
			@endslot


			@slot('route_path')
				{{  route('social-media.index')  }}
			@endslot
 
 

		@endcomponent
	

@endsection


@section('content')

	 


    <div class="col-sm-12">

		  
			
		<div class="card">
			<div class="card-header">
				<h5>Social Media List</h5>
				<button type="button" onclick="window.location.href='{{  route('social-media.create')  }}'" class="btn btn-primary waves-effect waves-light f-right d-inline-block md-trigger" data-modal="modal-13"> <i class="icofont icofont-plus m-r-5"></i> Add New Social Media
				</button>
			</div>
			<div class="card-block">
				<div class="table-responsive">
					<div class="table-content">
						<div class="project-table">
							<table id="e-product-list" class="table table-striped dt-responsive nowrap">
								<thead>
									<tr>
										<th>Name</th>
										<th>Added by</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>


								@if(count($social) > 0 )

									@foreach($social as $link)
									<tr>
										 
										 
										<td >{{ $link->name }}</td>
										<td >{{ $link->admin->name }}</td>
										<td ><button class="btn btn-sm btn-rounded btn-{!! $link->status == 'active' ? 'success':'danger' !!}"><span class="badge">{{ $link->status }}</span></button></td>
										
										
										
										<td class="action-icon">

											<a href="{{ route('social-media.edit' , $link->id) }}" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="icofont icofont-ui-edit"></i></a>

											<a href="{{ route('social-media.remove' , $link->id) }}" class="text-muted delete_product" data-product-id= "{{ $link->id }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="icofont icofont-delete-alt"></i></a>
										</td>
									</tr> 
									
									@endforeach

								@else


									
									<tr>
										<td colspan="8" class="text-center"> No Social Media links added till now </td>
									</tr>

								@endif
					 
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div> 

	</div>   

 
		
		
	 



@endsection 



@section('scripts')
 
	 
	@if(Session::has('store_crud')) 

		<script>
 			
 			    
	 		new PNotify({
			    title: 'Adding Social Media link',
			    text: 'we are glad to inform you that  new social media link has been added successfully',
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
			    title: 'Update Social Link',
			    text: 'we are glad to inform you that  social media link  has been updated successfully',
			    icon: 'fa fa-bell-o fa-2x'
			});


			var sound = new Audio('{{  asset('sounds/notification_crud.mp3')  }}');
			sound.loop = false;
			sound.play();
 
		</script>


	@endif




	@if(Session::has('delete_crud')) 

		<script>
 			
 			    
	 		new PNotify({
			    title: 'Delete Social Link',
			    text: 'we are glad to inform you that  social media link has been deleted successfully',
			    icon: 'fa fa-bell-o fa-2x'
			});


			var sound = new Audio('{{  asset('sounds/notification_crud.mp3')  }}');
			sound.loop = false;
			sound.play();
 
		</script>


	@endif

 
 
 

@endsection
 
 