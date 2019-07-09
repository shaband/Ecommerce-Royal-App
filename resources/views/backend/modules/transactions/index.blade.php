 @extends('backend.template.app')


@section('page_title' , 'Royal |-_-| List Transactions')


@section('styles')

	
	<style>
		.prod_image {
		    max-width: 100%;
		    height: auto;
		}


		.card .card-block code{

			margin:5px!important; 
		}


		.h4_label{

			margin-bottom: .5rem;
		    font-family: inherit;
		    font-weight: bolder;
		    line-height: 1.1;
		    font-size: 15px;


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

				Transactions

			@endslot

			@slot('main_short_note')

				Listing Transactions made by your clients  
			@endslot


			@slot('route_name')
				Transactions
			@endslot


			@slot('route_path')
				{{  route('backend.transactions')  }}
			@endslot
 
 

		@endcomponent
	

@endsection


@section('content')




	<div class="col-sm-12">

		  
			
			<div class="card">
				<div class="card-header">
					<h5>Filter Transactions</h5>
					<p>In case we are using Paytabs Api to proecess payment so we need to enter a start and end date to get a list of transactions processed by your merchant account </p>


						{!! Form::open(["route"=>"backend.transactions_filter" , 'method'=>'GET']) !!}

					<div class="row">


						

						<div class="col-sm-4">
							<h4 class="h4_label">Start Date</h4>
							 
							<input id="transaction_start" required="" name="transaction_startdate" class="form-control" type="text" placeholder="select start date" />
						</div>


						<div class="col-sm-4">
							<h4 class="h4_label">End Date</h4>
							 
							<input id="transaction_end" required="" name="transaction_enddate" class="form-control" type="text" placeholder="select end date" />
						</div>





						<div class="col-sm-4">
							<h4 class="h4_label">Filter Transactions</h4>
							 
							<input class="btn btn-primary btn-block" type="submit" value="Filter Transactions" />
						</div>

						
					</div>
						{!! Form::close() !!}
					 
				</div>
	 

			</div> 



	</div>   

	 


    <div class="col-sm-12">

		  
			
		<div class="card">
			<div class="card-header">
				<h5>Transactions List</h5>
				 
			</div>
			<div class="card-block">

				<h4 class="h4_label">Transactions Count : <code>{!!  isset($transactions->transaction_count) == true ? $transactions->transaction_count : 'Hit the search' !!}</code></h4>

				<div class="table-responsive">
					<div class="table-content">
						<div class="project-table">
							<table id="e-product-list" class="table table-xl dt-responsive nowrap">
								<thead>
									<tr>
										<th>Tid</th>
										<th>Order id</th>
										<th>Customer</th>
										<th>Amount</th> 
										{{-- <th>Currency</th> --}}
										{{-- <th>Net Amount</th> --}}
										{{-- <th>Net Amount Currency</th>
										<th>Net Amount Credited</th>
										<th>Net Amount Credited Currency</th> --}}
										<th>Date</th>
										<th>Status</th>
									</tr>
								</thead>

								<tbody>


								@if(count($transactions_array) > 0 )

									@foreach($transactions_array as $transaction)
									<tr>
										 
										 
										<td >{{ $transaction->transaction_id }}</td>
										<td >{{ $transaction->order_id }}</td>
										<td >{{ $transaction->transaction_title }}</td>
										<td ><span class="money">{{ $transaction->amount }}</span> <code>{{ $transaction->currency }}</code></td>
										{{-- <td >{{ $transaction->currency }}</td> --}}
										{{-- <td >{{ $transaction->net_amount }}</td>
										<td >{{ $transaction->net_amount_currency }}</td>
										<td >{{ $transaction->net_amount_credited }}</td> --}}
										{{-- <td >{{ $transaction->net_amount_credited_currency }}</td> --}}
										<td >{{ $transaction->transaction_datetime }}</td>
										<td ><span class="{!! $transaction->status == "Payment Approved" ? 'payment_success':'payment_failed' !!}">{{ $transaction->status }}</span></td>
										 
										 
										 
									</tr> 
									
									@endforeach

								@else
									
									<tr>
										<td colspan="11" class="text-center">Set Start Date and End Date to Begin retrieve Your Transactions </td>
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
 
 