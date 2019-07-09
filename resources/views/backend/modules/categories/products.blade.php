@extends('backend.template.app')


@section('page_title' , 'Royal |-_-| List Products under category')


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

			  {{ $category->title }}  /	Products

			@endslot

			@slot('main_short_note')

				Listing Products  under  <code>  {{ $category->title }} </code> 
			@endslot


			@slot('route_name')
				Products
			@endslot


			@slot('route_path')
				{{  route('dashboard.category_products' , $category->id)  }}
			@endslot
 
 

		@endcomponent
	

@endsection


@section('content')

	 


    <div class="col-sm-12">

		  
			
		<div class="card">
			<div class="card-header">
				<h5>Product List</h5>
				<button type="button" onclick="window.location.href='{{  route('dashboard.create_product')  }}'" class="btn btn-primary waves-effect waves-light f-right d-inline-block md-trigger" data-modal="modal-13"> <i class="icofont icofont-plus m-r-5"></i> Add New Product
				</button>
			</div>
			<div class="card-block">
				<div class="table-responsive">
					<div class="table-content">
						<div class="project-table">
							<table id="e-product-list" class="table table-striped dt-responsive nowrap">
								<thead>
									<tr>
										<th>Image</th>
										<th>Code</th>
										<th>Package</th>
										<th>Product info</th>
										<th>Price (S.R)</th>
										<th>Stock</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>


								@if(count($products) > 0 )

									@foreach($products as $product)
									<tr>
										<td class="">
											<a href="{{ asset("uploads/products/main/$product->main_image")  }}" class="fresco">
											<img src="{{ asset("uploads/products/main/$product->main_image")  }}" class="prod_image" alt="tbl">
											</a>
										</td>
										 
										<td >{{ $product->code }}</td>
										<td >{{ $product->package->title }}</td>
										<td class="pro-name">
											<h6>{{  $product->title }}</h6>
											<span>{!! str_limit($product->description , 50 ) !!}</span>
										</td>
										<td>{{ sprintf('%0.2f', $product->price) }}</td>
										<td>

											<label class="text-{!! $product->availability == 'instock' ? 'success'  : 'danger' !!}">{{ $product->availability }}</label>
										</td>
										<td class="action-icon">

											<a href="{{ route('dashboard.edit_product' , $product->id) }}" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="icofont icofont-ui-edit"></i></a>

											<a href="{{ route('dashboard.remove_product' , $product->id) }}" class="text-muted delete_product" data-product-id= "{{ $product->id }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="icofont icofont-delete-alt"></i></a>
										</td>
									</tr> 
									
									@endforeach

								@else
									
									<tr>
										<td colspan="7" class="text-center"> No products added till now </td>
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
			    title: 'Adding product',
			    text: 'we are glad to inform you that  new product has been added successfully',
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
			    title: 'Update product',
			    text: 'we are glad to inform you that  product has been updated successfully',
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
			    title: 'Delete product',
			    text: 'we are glad to inform you that  product has been deleted successfully',
			    icon: 'fa fa-bell-o fa-2x'
			});


			var sound = new Audio('{{  asset('sounds/notification_crud.mp3')  }}');
			sound.loop = false;
			sound.play();
 
		</script>


	@endif

 


 	<!-- script to delete a product -->
	<script>
		

		$(document).ready(function(){
 

			$('.delete_product').on('click' , function(e){

				e.preventDefault(); 

				  
				// get product id 
				var product_id = $(this).attr('data-product-id');
				 


				$.ajax({

					url:"{{  url('dashboard/products/remove//')  }}"+'/'+product_id , 
					method:"get" , 
					dataType:'json' , 
					beforeSend:function(){



					},
					success:function(data){


						console.log(data);

						if(data.status == 'product_deleted'){
 							
 							window.location.href = "{{ route('dashboard.products') }}" ; 

						}

						if(data.status == 'attachement_error'){


						}

					}


				}); 
				return false ; 

			}); 

		});
	</script>

 

@endsection
 
 