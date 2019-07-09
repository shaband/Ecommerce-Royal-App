 @extends('backend.template.app')


@section('page_title' , 'Royal |-_-| List Orders')


@section('styles')

	
	<style>
		.prod_image {
		    max-width: 100%;
		    height: auto;
		}


		.card .card-block code{

			margin:5px!important; 
		}


		.payment_success{

			background-color: #93be52;
		    padding: 9px;
		    border-top-left-radius: 20px;
		    border-bottom-left-radius: 20px;
		    color: #ffffff ; 
		    font-size: 10px;

		}
		.payment_failed{

			background-color: #fc6180;
		    padding: 9px;
		    border-top-left-radius: 20px;
		    border-bottom-left-radius: 20px;
		    color: #ffffff ; 
		    font-size: 10px;

		}

		.money{

			background-color: #ffb64d;
		    padding: 9px;
		    border-top-left-radius: 20px;
		    border-bottom-left-radius: 20px;
		    color: #ffffff ; 
		    font-size: 10px;

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

				Orders

			@endslot

			@slot('main_short_note')

				Listing orders made by your clients  
			@endslot


			@slot('route_name')
				Orders
			@endslot


			@slot('route_path')
				{{  route('backend.orders')  }}
			@endslot
 
 

		@endcomponent
	

@endsection


@section('content')

	 


    <div class="col-sm-12">

		  
			
		<div class="card">
			<div class="card-header">
				<h5>Orders List</h5>
				 
			</div>
			<div class="card-block">
				<div class="table-responsive">
					<div class="table-content">
						<div class="project-table">
							<table id="e-product-list" class="table table-striped dt-responsive nowrap">
								<thead>
									<tr>
										<th>Order ticket</th>
										<th>Order Owner</th>
										<th>Order total</th>
										<th>Order payment status</th> 
										<th>Action</th>
									</tr>
								</thead>
								<tbody>


								@if(count($orders) > 0 )

									@foreach($orders as $order)
									<tr>
										 
										 
										<td >{{ $order->order_ticket }}</td>
										<td >{{ $order->owner->name }}</td>
										<td ><span class="money">{{ sprintf('%0.2f' , $order->order_total ) }}</span> <code>SAR</code></td>
										<td ><span class="payment_success">{{ ucfirst($order->payment_status) }}</span></td>
										 
										<td>
											
											<a href="{!! asset('order_give.png') !!}" 
												data-lightbox="4" 
												data-title='

												   <div class="table-responsive">




                                                        <table class="table">

                                                            <thead>

                                                                <tr>

                                                                    <th>Product title</th>
                                                                    <th>Product price</th>
                                                                    <th>Quantity ordered</th>


                                                                </tr>

                                                            </thead>

                                                            <tbody>


                                                                @if(count($order->orderProduct) > 0 )

                                                                    @foreach( $order->orderProduct as $order_product)
                                                                    
                                                                    <tr>
                                                                        <td>{!! $order_product->product->title !!}</td>
                                                                        <td><code>{!! $order_product->product->price !!}</code> SAR</td>
                                                                        <td>{!! $order_product->quantity !!}</td>
                                                                    </tr>

                                                                    @endforeach

                                                                    

                                                                @endif

                                                                    
                                                               

                                                            </tbody>

                                                        </table>

                                                    </div>

												'>
												<i data-toggle="tooltip" data-placement="left" data-original-title="See order details" class="fa fa-bell-o"></i>
											</a>



											 

										</td>
									</tr> 
									
									@endforeach

								@else
									
									<tr>
										<td colspan="8" class="text-center"> No Order has been made yet added till now </td>
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
 
  

@endsection
 
 