<!-- Simple Slot For Breadcrumbs using components  --> 


<div class="page-header card">
	<div class="row align-items-end">


		<div class="col-lg-8">
				<div class="page-header-title">
					<i class="icofont {{  $main_icon  }} bg-c-blue"></i>
					<div class="d-inline">
						<h4>{{  $main_title  }}</h4>
						<span>{{  $main_short_note }}</span>
					</div>
				</div>
		</div>



		<div class="col-lg-4">
			<div class="page-header-breadcrumb">
				<ul class="breadcrumb-title">
					<li class="breadcrumb-item">
						<a href="{{  route('dashboard.home')  }}">
							<i class="icofont icofont-home"></i>
						</a>
					</li>

					@if(\Route::current()->getName() != 'dashboard.home')

					 <li class="breadcrumb-item">
						<a href="{{ $route_path }}">{{ $route_name }}</a>
					</li>

					@endif
					  
				</ul>
			</div>
		</div>
		
		 

	</div>
</div>