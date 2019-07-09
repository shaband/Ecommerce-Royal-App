@extends('backend.template.app')


@section('page_title' , 'Royal |-_-| List Clients')


@section('styles')

	
	<style>
		.prod_image {
		    max-width: 15%;
		    height: auto;
		}



		.lb-data .lb-caption{

			    line-height: 1.3em !important;
		}


		.label{

			    margin-bottom: 8px !important;
			    font-size: 86% !important;
		}


		.lb-data .lb-details{

			width: 90% !important;
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

				Clients

			@endslot

			@slot('main_short_note')

				Control website clients disable or enable their account 
			@endslot


			@slot('route_name')
				Clients
			@endslot


			@slot('route_path')
				{{  route('clients.index')  }}
			@endslot
 
 

		@endcomponent
	

@endsection


@section('content')

	 


    <div class="col-sm-12">

		  
			
		 <div class="card">
			<div class="card-header">
				<h5>Clients List</h5>
				{{-- <button type="button" onclick="window.location.href='{{  route('dashboard.create_product')  }}'" class="btn btn-primary waves-effect waves-light f-right d-inline-block md-trigger" data-modal="modal-13"> <i class="icofont icofont-plus m-r-5"></i> Add New Product
				</button> --}}
			</div>
			<div class="card-block">
				<div class="table-responsive">
					<div class="table-content">
						<div class="project-table">
							<table id="e-product-list" class="table table-striped dt-responsive nowrap">
								<thead>
									<tr>
										<th>Image</th>
										<th>Full Name</th>
										<th>Email</th>
										<th>Join Date</th>
										<th>Account status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>


								@if(count($clients) > 0 )

									@foreach($clients as $client)
									<tr>
										<td class="">

											@if(!is_null($client->image))
												<a href="{{ asset("uploads/profile/$client->image")  }}" class="fresco">
													<img src="{{ asset("uploads/profile/$client->image")  }}" class="prod_image" alt="tbl">
												</a>
											@else
												<a href="{{ asset("client_placeholder.png")  }}" class="fresco">
													<img src="{{ asset("client_placeholder.png")  }}" class="prod_image" alt="tbl">
												</a>

											@endif
										</td>
										 
										<td>{{ $client->name  }}</td>
										<td>{{ $client->email }}</td>
										<td>{!! date('l jS \of F Y h:i:s A' , strtotime($client->created_at)) !!}</td>
										<td>{{ $client->is_active == 1 ? 'Active' : 'Not active' }}</td>
										 
										 
										 
										 
										<td class=" ">

										{{-- 	<a href="{{ route('dashboard.edit_product' , $product->id) }}" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="icofont icofont-ui-edit"></i></a>

											<a href="{{ route('dashboard.remove_product' , $product->id) }}" class="text-muted delete_product" data-product-id= "{{ $product->id }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="icofont icofont-delete-alt"></i></a> --}}


										<a href="{!! is_null($client->image) == true ?   asset("client_placeholder.png")  :  asset("uploads/profile/$client->image") !!}" data-lightbox="4" 
											data-title='
											<div class="">

												

												<div class="row">

													 

													  <h3>{{  $client->name  }}</h3>	
												 	  <p> {{  $client->accountInformation->short_description }} </p>

													 
												</div>

													<div class="row">

													  <div class="col-md-12">
															<label>Joined : </label>
															<p class="label bg-success">{{  date("F j, Y h:i:s A" , strtotime($client->created_at))  }}</p>
													  </div>

													  <br>
													  <div class="col-md-12">
														<label>Email : </label>
														<p class=" label bg-success">{{ $client->email }}</p>
													  </div>
													  <br>
													  <div class="col-md-12">
														<label>Status : </label>
														<p class=" label bg-{{ $client->is_active == 1 ? "success" : "danger" }}">{{ $client->is_active == 1 ? "Active" : "Not Active" }}</p>
													 </div>

													 


												</div>
												

											</div>

											'>
											<i data-toggle="tooltip" data-placement="top" data-original-title="see in details" class="fa fa-bell-o"></i>
										</a>



										<a href="{!! route("clients.update" , $client->id ) !!}">
											<i class="fa fa-play-circle" data-toggle="tooltip" data-placement="top" data-original-title="Change account status to {!! $client->is_active == 1 ? 'not active' : 'active' !!}"></i>
										</a>


										</td>
									</tr> 
									
									@endforeach

								@else
									
									<tr>
										<td colspan="6" class="text-center"> No registered clients till now</td>
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
 
	  

	@if(Session::has('account_status_changed')) 

		<script>
 			
 			    
	 		new PNotify({
			    title: 'Account Status',
			    text: '{!! Session::get("account_status_changed") !!}',
			    icon: 'fa fa-bell-o fa-2x'
			});


			var sound = new Audio('{{  asset('sounds/notification_crud.mp3')  }}');
			sound.loop = false;
			sound.play();
 
		</script>


	@endif




	<script>
		
		$(document).ready(function(){

			// light box overlay 
		    lightbox.option({
	            'resizeDuration': 300,
	            'wrapAround': true
		    });

		});

	</script>
 
 

@endsection
 
 