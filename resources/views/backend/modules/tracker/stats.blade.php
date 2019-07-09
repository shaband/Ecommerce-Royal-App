@extends('backend.template.app')


@section('page_title' , 'Royal |-_-| Tracker')


@section('styles')


@section('breadcrumb')

	<!-- Make use of slots and components  --> 
	<!-- @author Emad Rashad  --> 
		@component('backend.components.breadcrumb')
			 
			
			@slot('main_icon')
				
				icofont-open-eye
			@endslot
			@slot('main_title')
				Online stats tracker
			@endslot

			@slot('main_short_note')
				like how many pages viewed by guests or authenticated users , real cool data that will help you in futuristic things
			@endslot



			@slot('route_name')
				Online Tracker
			@endslot


			@slot('route_path')
				{{  route('dashboard.stats')  }}
			@endslot
 
 
 

		@endcomponent
	

@endsection


@section('content')



<div class="col-sm-12">

   	<div class="card">
		<div class="card-header">
			<h5>Real Statistics</h5>
			<span>Sessions or visits are a real data collected from the front website that let you know the activites on your website , what is happening with your pages , who is viewing a particular page  etc </span>
			<div class="card-header-right">
				<i class="icofont icofont-spinner-alt-5"></i>
			</div>
		</div>
		<div class="card-block">
			<div class="dt-responsive table-responsive">
				<table id="stats_table" class="table table-striped table-bordered nowrap">
					<thead>
						<tr>
							<th>#</th>
							<th>IP Address</th>
							<th>Country</th>
							<th>User</th>
							<th>Device</th>
							<th>Os</th>
							<th>Browser</th>
							{{-- <th>BV</th> --}}
							<th>Referer</th>
							<th>Page Views</th>
							<th>Last activity</th>
						</tr>
					</thead>
					<tbody>
					  	@if(count($visits) > 0 )

					  		@foreach($visits as $visit)
								 
								<tr>
									<td>{!! $loop->iteration !!}</td>
									<td>{{  $visit->client_ip  }}</td>
									<td>
										@if(!is_null($visit->geoip_id))
											
											{!! $visit->geoIp->country_name !!}

										@else
											Unknown
										@endif
									</td>
									<td>
										@if(!is_null($visit->user_id))
											
											 <!-- we will get the user information from our model Client -->
											 @php 

											 	$client = \App\Models\Client::find($visit->user_id)->first(); 


											 @endphp 
											{!! $client->email !!}

										@else
											Guest
										@endif

									</td>
									<td>{!! $visit->device->kind !!}</td>
									<td>{!! $visit->device->platform  !!}</td>
									<td>{!! $visit->agent->browser !!}</td>
									{{-- <td>{!! $visit->agent->browser_version !!}</td> --}}
									<td>
										@if(!is_null($visit->referer_id))
											
											 
											{!! $visit->referer->domain->name !!}

										@else
											No referer
										@endif
									</td>
									<td>{!! $visit->page_views !!}</td>
									<td>{!! $visit->updated_at->diffForHumans() !!}</td>
								</tr>

					  		@endforeach
							
						@endif

						 

					</tbody>
				 
				</table>
			</div>
		</div>
	</div>


</div>



@endsection 



@section('scripts')

	<script>
		
		$(document).ready(function(){

			$('#stats_table').DataTable( {
        		
        		"pagingType": "simple" , 
        		 "aLengthMenu": [[10 , 25, 50, 75, -1], [ 10 ,  25, 50, 75, "All"]],
        		"iDisplayLength": 10

    		});
		});

	</script>

@endsection
 
 