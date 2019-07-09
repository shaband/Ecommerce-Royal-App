@extends('backend.template.app')


@section('page_title' , 'Royal |-_-| Dashboard')


@section('styles')


@section('breadcrumb')

	<!-- Make use of slots and components  --> 
	<!-- @author Emad Rashad  --> 
		@component('backend.components.breadcrumb')
			 
			
			@slot('main_icon')
				
				icofont-brain-alt
			@endslot
			@slot('main_title')
				Your Dashboard
			@endslot

			@slot('main_short_note')
				we are displaying some real cool statistics
			@endslot


			@slot('route_name')
				Dashboard
			@endslot


			@slot('route_path')
				{{  route('dashboard.home')  }}
			@endslot
 

		@endcomponent
	

@endsection


@section('content')


		
		
		<!-- three top cards  --> 
 
  	{{-- 	<div class="col-md-6 col-xl-4">
			<div class="card amount-card o-hidden">
				<div class="card-block">
					<h2 class="f-w-400">$23,567</h2>
					<p class="text-muted f-w-600 f-16"><span class="text-c-blue">Amount</span> processed</p>
				</div>
				<canvas id="amount-processed" height="100"></canvas>
			</div>
		</div>
		
		<div class="col-md-6 col-xl-4">
			<div class="card amount-card o-hidden">
				<div class="card-block">
					<h2 class="f-w-400">$14,552</h2>
					<p class="text-muted f-w-600 f-16"><span class="text-c-pink">Amount</span> spent</p>
				</div>
				<canvas id="amount-spent" height="100"></canvas>
			</div>
		</div>
		<div class="col-md-12 col-xl-4">
			<div class="card amount-card o-hidden">
				<div class="card-block">
					<h2 class="f-w-400">$31,156</h2>
					<p class="text-muted f-w-600 f-16"><span class="text-c-yellow">Profit</span>
				processed</p>
				</div>
			<canvas id="profit-processed" height="100"></canvas>
			</div>
		</div> --}}

		<!-- end of three top cards  --> 

 

 


{{-- <div class="col-md-6 col-xl-12">
	<div class="card review-resourse">
	<div class="card-header">
	<div class="card-header-left">
	<h5>Traffic resources</h5>
	</div>
	<div class="card-header-right">
	<ul class="list-unstyled card-option">
	<li><i class="icofont icofont-simple-left "></i></li>
	<li><i class="icofont icofont-maximize full-card"></i></li>
	<li><i class="icofont icofont-minus minimize-card"></i></li>
	<li><i class="icofont icofont-refresh reload-card"></i></li>
	<li><i class="icofont icofont-error close-card"></i></li>
	</ul>
	</div>
	</div>
	<div class="card-block p-t-10 p-b-10">
	<div class="table-responsive">
	<table class="table table-hover">
	<tbody>
	<tr>
	<td>
	<h6>Unique visitors</h6></td>
	<td>
	<span class="f-18 text-muted">4,562</span>
	</td>
	<td class="text-right">
	<span class="visitor1">0,5,0,5,7,6,5.5,10,8</span>
	</td>
	</tr>
	<tr>
	<td>
	<h6>Pageviews</h6></td>
	<td>
	<span class="f-18 text-muted">679</span>
	</td>
	<td class="text-right">
	<span class="visitor2">0,5,0,5,7,6,5.5,10,8</span>
	</td>
	</tr>
	<tr>
	<td>
	<h6>Page/visit</h6></td>
	<td>
	<span class="f-18 text-muted">2,516</span>
	</td>
	<td class="text-right">
	<span class="visitor3">0,5,0,5,7,6,5.5,10,8</span>
	</td>
	</tr>
	<tr>
	<td>
	<h6>Bounce rate</h6></td>
	<td>
	<span class="f-18 text-muted">67%</span>
	</td>
	<td class="text-right">
	<span class="visitor4">0,5,0,5,7,6,5.5,10,8</span>
	</td>
	</tr>
	<tr>
	<td>
	<h6>Visit</h6></td>
	<td>
	<span class="f-18 text-muted">845</span>
	</td>
	<td class="text-right">
	<span class="visitor5">0,5,0,5,7,6,5.5,10,8</span>
	</td>
	</tr>
	</tbody>
	</table>
	</div>
	</div>
	</div>
</div> --}}

<!-- Next information cards  --> 
		<div class="col-md-12 col-xl-6">
			<div class="row">

				<div class="col-sm-12">
					<div class="card feed-card">
						<div class="card-block p-t-0 p-b-0">
							<div class="row">
								<div class="col-4 bg-c-blue border-feed">
								<i class="icofont icofont-users-alt-4 f-40"></i>
								</div>
								<div class="col-8">
									<div class="p-t-30 p-b-30">
										<h2 class="f-w-400 m-b-10">2,672</h2>
										<p class="text-muted m-0">Last week <span class="text-c-blue f-w-600">user's</span></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card feed-card">
						<div class="card-block p-t-0 p-b-0">
							<div class="row">
								<div class="col-4 bg-c-green border-feed">
								<i class="icofont icofont-wallet f-40"></i>
								</div>
								<div class="col-8">
									<div class="p-t-30 p-b-30">
										<h2 class="f-w-400 m-b-10">$6,391</h2>
										<p class="text-muted m-0">Total <span class="text-c-green f-w-600">earning</span></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>




			</div>
		</div>


		<div class="col-md-12 col-xl-6">
			<div class="row">

				<div class="col-sm-12">
					<div class="card feed-card">
						<div class="card-block p-t-0 p-b-0">
							<div class="row">
								<div class="col-4 bg-c-yellow border-feed">
								<i class="icofont icofont-users-alt-3 f-40"></i>
								</div>
								<div class="col-8">
									<div class="p-t-30 p-b-30">
										<h2 class="f-w-400 m-b-10">9,276</h2>
										<p class="text-muted m-0">Today <span class="text-c-yellow f-w-600">New Visitors</span></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card feed-card">
						<div class="card-block p-t-0 p-b-0">
							<div class="row">
								<div class="col-4 bg-c-pink border-feed">
								<i class="icofont icofont-chart-flow-alt-1 f-40"></i>
								</div>
								<div class="col-8">
									<div class="p-t-30 p-b-30">
										<h2 class="f-w-400 m-b-10">3,619</h2>
										<p class="text-muted m-0">New <span class="text-c-pink f-w-600">Order Recieved</span></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				

			</div>
		</div>



@endsection 
 
 