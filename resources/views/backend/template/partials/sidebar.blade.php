<nav class="pcoded-navbar">
		<div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
		<div class="pcoded-inner-navbar main-menu">
		
			<!-- User Dropdown profile options --> 
			@component('backend.components.user_profile') @endcomponent
			 
			 


			<!-- Dashboard Part --> 
			<div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Main</div>
			<ul class="pcoded-item pcoded-left-item">

				<!-- Dashboard --> 
				<li class="pcoded-hasmenu {!! Route::current()->getName() == 'dashboard.home' ? 'active pcoded-trigger ':'' !!}">
					<a href="javascript:void(0)">
						<span class="pcoded-micon"><i class="ti-dashboard" style="color:#ffb64d;"></i><b>D</b></span>
						<span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
						<span class="pcoded-mcaret"></span>
					</a>
					<ul class="pcoded-submenu">
						<li class=" {!! Route::current()->getName() == 'dashboard.home' ? 'active':'' !!}">
							<a href="{{  route('dashboard.home') }}">
								<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
								<span class="pcoded-mtext" data-i18n="nav.dash.default">Home</span>
								<span class="pcoded-mcaret"></span>
							</a>
						</li>
						  
						 
					</ul>
				</li>
			</ul>



			<!-- Tracker Part -_-   --> 
			<div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Tracker</div>
		     <ul class="pcoded-item pcoded-left-item">

				 
				<li class="pcoded-hasmenu {!! Route::current()->getName() == 'dashboard.stats' ? 'active pcoded-trigger ':'' !!}">
					<a href="javascript:void(0)">
						<span class="pcoded-micon"><i class="ti-stats-up"  style="color:#93be52;"></i><b>W</b></span>
						<span class="pcoded-mtext" data-i18n="nav.dash.main">Tracker Module</span>
						<span class="pcoded-mcaret"></span>
					</a>
					<ul class="pcoded-submenu">
						<li class=" {!! Route::current()->getName() == 'dashboard.stats' ? 'active':'' !!}">
							<a href="{{  route('dashboard.stats') }}">
								<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
								<span class="pcoded-mtext" data-i18n="nav.dash.default">Statistics</span>
								<span class="pcoded-mcaret"></span>
							</a>
						</li>
						  
						 
					</ul>
				</li>
			</ul>



			<!-- Slider Part -_-   --> 
			<div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Slider</div>
		     <ul class="pcoded-item pcoded-left-item">

				 
				<li class="pcoded-hasmenu {!! Route::current()->getName() == 'slider.index' ? 'active pcoded-trigger ':'' !!}  {!! Route::current()->getName() == 'slider.create' ? 'active pcoded-trigger ':'' !!} ">
					<a href="javascript:void(0)">
						<span class="pcoded-micon"><i class="ti-layers-alt" style="color:#ab7967;"></i><b>W</b></span>
						<span class="pcoded-mtext" data-i18n="nav.dash.main">Slider Module</span>
						<span class="pcoded-mcaret"></span>
					</a>
					<ul class="pcoded-submenu">
						<li class="{!! Route::current()->getName() == 'slider.index' ? 'active':'' !!}">
							<a href="{{  route('slider.index') }}">
								<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
								<span class="pcoded-mtext" data-i18n="nav.dash.default">List All Slides</span>
								<span class="pcoded-mcaret"></span>
							</a>
						</li>

						<li class="{!! Route::current()->getName() == 'slider.create' ? 'active':'' !!}">
							<a href="{{  route('slider.create') }}">
								<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
								<span class="pcoded-mtext" data-i18n="nav.dash.default">Add new slide</span>
								<span class="pcoded-mcaret"></span>
							</a>
						</li>
						  
						 
					</ul>
				</li>
			</ul>




			<!-- E-commerce  Part -_-   --> 
			<div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">E-commerce </div>
		     <ul class="pcoded-item pcoded-left-item">

				 
				<li class="pcoded-hasmenu 
					{!! Route::current()->getName() == 'dashboard.products' ? 'active pcoded-trigger ':'' !!}
					{!! Route::current()->getName() == 'dashboard.create_product' ? 'active pcoded-trigger':'' !!}
					{!! Route::current()->getName() == 'dashboard.edit_product' ? 'active pcoded-trigger':'' !!}
					{!! Route::current()->getName() == 'dashboard.categories' ? 'active pcoded-trigger':'' !!}
					{!! Route::current()->getName() == 'dashboard.edit_category' ? 'active pcoded-trigger':'' !!}
					{!! Route::current()->getName() == 'packages.index' ? 'active pcoded-trigger':'' !!}
					{!! Route::current()->getName() == 'packages.create' ? 'active pcoded-trigger':'' !!}
					{!! Route::current()->getName() == 'packages.edit' ? 'active pcoded-trigger':'' !!}
					{!! Route::current()->getName() == 'dashboard.category_products' ? 'active pcoded-trigger':'' !!}
					{!! Route::current()->getName() == 'packages.products' ? 'active pcoded-trigger':'' !!}
					{!! Route::current()->getName() == 'backend.orders' ? 'active pcoded-trigger':'' !!}
					{!! Route::current()->getName() == 'backend.transactions' ? 'active pcoded-trigger':'' !!}
					{!! Route::current()->getName() == 'backend.transactions_filter' ? 'active pcoded-trigger':'' !!}
					{!! Route::current()->getName() == 'backend.payment_configuration' ? 'active pcoded-trigger':'' !!}
		
					">
					<a href="javascript:void(0)">
						<span class="pcoded-micon"><i class="ti-rocket" style="color:red;"></i><b>W</b></span>
						<span class="pcoded-mtext" data-i18n="nav.dash.main">E-commerce Module</span>
						<span class="pcoded-mcaret"></span>
					</a>
					<ul class="pcoded-submenu">

						<li class="{!! Route::current()->getName() == 'backend.orders' ? 'active ':'' !!}">
							<a href="{!! route('backend.orders') !!}">
								<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
								<span class="pcoded-mtext" data-i18n="nav.dash.default">Orders</span>
								<span class="pcoded-mcaret"></span>
							</a>
						</li>

						<li class="{!! Route::current()->getName() == 'backend.transactions' ? 'active ':'' !!} {!! Route::current()->getName() == 'backend.transactions_filter' ? 'active ':'' !!}">
							<a href="{!! route('backend.transactions') !!}">
								<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
								<span class="pcoded-mtext" data-i18n="nav.dash.default">Transactions</span>
								<span class="pcoded-mcaret"></span>
							</a>
						</li>

						<li class="{!! Route::current()->getName() == 'backend.payment_configuration' ? 'active ':'' !!}">
							<a href="{!! route("backend.payment_configuration") !!}">
								<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
								<span class="pcoded-mtext" data-i18n="nav.dash.default">Payment Gateways</span>
								<span class="pcoded-mcaret"></span>
							</a>
						</li>

						 

						<li class="pcoded-hasmenu 
							
							{!! Route::current()->getName() == 'dashboard.products' ? 'active pcoded-trigger':'' !!}
							{!! Route::current()->getName() == 'dashboard.create_product' ? 'active':'' !!}
							{!! Route::current()->getName() == 'dashboard.edit_product' ? 'active':'' !!}


						">
							<a href="javascript:void(0)">
								<span class="pcoded-micon"><i class="ti-direction-alt"></i></span>
								<span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.main">Products</span>
								<span class="pcoded-mcaret"></span>
							</a>
							<ul class="pcoded-submenu">
								 
							@if(count($categories_shared) > 0)

								@foreach($categories_shared as $category)

									<li class="">
										<a href="{{ route('dashboard.category_products' , $category->id) }}">
											<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
											<span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">{{ ucfirst($category->title) }}</span>
											<span class="pcoded-mcaret"></span>
										</a>
									</li>

								@endforeach
							@endif




								<li class="{!! Route::current()->getName() == 'dashboard.products' ? 'active':'' !!}">
									<a href="{{ route('dashboard.products') }}">
										<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
										<span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Show all </span>
										<span class="pcoded-mcaret"></span>
									</a>
								</li>
							</ul>
						</li>



						<li class="pcoded-hasmenu 
							{!! Route::current()->getName() == 'dashboard.categories' ? 'active pcoded-trigger':'' !!} 
							{!! Route::current()->getName() == 'dashboard.edit_category' ? 'active ':'' !!} 
							{!! Route::current()->getName() == 'dashboard.category_products' ? 'active ':'' !!}


						">
							<a href="javascript:void(0)">
								<span class="pcoded-micon"><i class="ti-direction-alt"></i></span>
								<span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.main">Categories</span>
								<span class="pcoded-mcaret"></span>
							</a>
							<ul class="pcoded-submenu">
								<li class="{!! Route::current()->getName() == 'dashboard.categories' ? 'active ':'' !!}">
									<a href="{{ route('dashboard.categories') }}">
										<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
										<span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Show all</span>
										<span class="pcoded-mcaret"></span>
									</a>
								</li>
								 
							</ul>
						</li>


						<li class="pcoded-hasmenu 
							{!! Route::current()->getName() == 'packages.index' ? 'active pcoded-trigger':'' !!} 
							{!! Route::current()->getName() == 'packages.create' ? 'active pcoded-trigger':'' !!} 
							{!! Route::current()->getName() == 'packages.edit' ? 'active pcoded-trigger':'' !!} 
							{!! Route::current()->getName() == 'packages.products' ? 'active ':'' !!}


						">
							<a href="javascript:void(0)">
								<span class="pcoded-micon"><i class="ti-direction-alt"></i></span>
								<span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.main">Packages</span>
								<span class="pcoded-mcaret"></span>
							</a>
							<ul class="pcoded-submenu">
								<li class="{!! Route::current()->getName() == 'packages.index' ? 'active ':'' !!}">
									<a href="{{ route('packages.index') }}">
										<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
										<span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Show all</span>
										<span class="pcoded-mcaret"></span>
									</a>
								</li>


								<li class="{!! Route::current()->getName() == 'packages.create' ? 'active ':'' !!}">
									<a href="{{ route('packages.create') }}">
										<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
										<span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Add New</span>
										<span class="pcoded-mcaret"></span>
									</a>
								</li>
								 
							</ul>
						</li>
						  
						 
					</ul>
				</li>
			</ul>




			<!-- Clients Part -_-   --> 
			<div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Clients</div>
		     <ul class="pcoded-item pcoded-left-item">

				 
				<li class="pcoded-hasmenu {!! Route::current()->getName() == 'clients.index' ? 'active pcoded-trigger ':'' !!}">
					<a href="javascript:void(0)">
						<span class="pcoded-micon"><i class="ti-user" style="color: #39adb5;"></i><b>W</b></span>
						<span class="pcoded-mtext" data-i18n="nav.dash.main">Clients Module</span>
						<span class="pcoded-mcaret"></span>
					</a>
					<ul class="pcoded-submenu">
						


						<li class="{!! Route::current()->getName() == 'clients.index' ? 'active ':'' !!}">
							<a href="{{ route('clients.index') }}">
								<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
								<span class="pcoded-mtext" data-i18n="nav.dash.default">List All Clients</span>
								<span class="pcoded-mcaret"></span>
							</a>
						</li>

						{{-- <li class="">
							<a href="#">
								<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
								<span class="pcoded-mtext" data-i18n="nav.dash.default">Reports</span>
								<span class="pcoded-mcaret"></span>
							</a>
						</li> --}}
						  
						 
					</ul>
				</li>
			</ul>







			<!-- Informational Part -_-   --> 
			<div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Informational</div>
		     <ul class="pcoded-item pcoded-left-item">

				 
				<li class="pcoded-hasmenu {!! Route::current()->getName() == '' ? 'active pcoded-trigger ':'' !!}">
					<a href="javascript:void(0)">
						<span class="pcoded-micon"><i class="ti-receipt" style="color:#7c4dff"></i><b>W</b></span>
						<span class="pcoded-mtext" data-i18n="nav.dash.main">Informational Module</span>
						<span class="pcoded-mcaret"></span>
					</a>
					<ul class="pcoded-submenu">
						<li class="">
							<a href="#">
								<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
								<span class="pcoded-mtext" data-i18n="nav.dash.default">Terms and conitions</span>
								<span class="pcoded-mcaret"></span>
							</a>
						</li>
						<li class="">
							<a href="#">
								<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
								<span class="pcoded-mtext" data-i18n="nav.dash.default">About Us</span>
								<span class="pcoded-mcaret"></span>
							</a>
						</li>

						<li class="">
							<a href="#">
								<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
								<span class="pcoded-mtext" data-i18n="nav.dash.default">Contact us</span>
								<span class="pcoded-mcaret"></span>
							</a>
						</li>

						<li class="">
							<a href="#">
								<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
								<span class="pcoded-mtext" data-i18n="nav.dash.default">Return policy</span>
								<span class="pcoded-mcaret"></span>
							</a>
						</li>
						  
						 
					</ul>
				</li>
			</ul>



			<!--Social media  Part -_-   --> 
			  <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Social</div>
			    <ul class="pcoded-item pcoded-left-item">

					 
					<li class="pcoded-hasmenu {!! Route::current()->getName() == 'social-media.index' ? 'active pcoded-trigger':'' !!} {!! Route::current()->getName() == 'social-media.edit' ? 'active pcoded-trigger':'' !!}">
						<a href="javascript:void(0)">
							<span class="pcoded-micon"><i class="ti-dribbble" style="color:#fc6180;"></i><b>W</b></span>
							<span class="pcoded-mtext" data-i18n="nav.dash.main">Social Media Module</span>
							<span class="pcoded-mcaret"></span>
						</a>
						<ul class="pcoded-submenu">
							<li class="{!! Route::current()->getName() == 'social-media.index' ? 'active ':'' !!}">
								<a href="{{ route("social-media.index") }}">
									<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
									<span class="pcoded-mtext" data-i18n="nav.dash.default">List all social</span>
									<span class="pcoded-mcaret"></span>
								</a>
							</li>
							<li class="{!! Route::current()->getName() == 'social-media.create' ? 'active ':'' !!}">
								<a href="{{ route("social-media.create") }}">
									<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
									<span class="pcoded-mtext" data-i18n="nav.dash.default">Add new social</span>
									<span class="pcoded-mcaret"></span>
								</a>
							</li>
	 
							 
						</ul>
					</li>
				</ul>
 


			<!--General settings   Part -_-   --> 
			<div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">General</div>
			    <ul class="pcoded-item pcoded-left-item">

					 
					<li class="pcoded-hasmenu {!! Route::current()->getName() == 'dashboard.get_settings' ? 'active pcoded-trigger ':'' !!}">
						<a href="javascript:void(0)">
							<span class="pcoded-micon"><i class="icofont icofont-ui-settings" style="color:#fa5180;"></i><b>W</b></span>
							<span class="pcoded-mtext" data-i18n="nav.dash.main">Settings Module</span>
							<span class="pcoded-mcaret"></span>
						</a>
						<ul class="pcoded-submenu">
							<li class="
								{!! Route::current()->getName() == 'dashboard.get_settings' ? 'active ':'' !!}
							">
								<a href="{{  route('dashboard.get_settings') }}">
									<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
									<span class="pcoded-mtext" data-i18n="nav.dash.default">View - Update settings</span>
									<span class="pcoded-mcaret"></span>
								</a>
							</li>
							 
	 
							 
						</ul>
					</li>
				</ul>



				
				<div class="pcoded-navigatio-lavel" data-i18n="nav.category.support">Support</div>
				<ul class="pcoded-item pcoded-left-item">
					<li class="">
						<a href="http://tatweers.com/" target="_blank">
							<span class="pcoded-micon"><i class="icofont icofont-code"></i><b>D</b></span>
							<span class="pcoded-mtext" data-i18n="nav.documentation.main">Visit Our Dev Site</span>
							<span class="pcoded-mcaret"></span>
						</a>
					</li>
					<li class="">
						<a href="#" target="_blank">
							<span class="pcoded-micon"><i class="ti-layout-list-post"></i><b>SI</b></span>
							<span class="pcoded-mtext" data-i18n="nav.submit-issue.main">Submit Issue</span>
							<span class="pcoded-mcaret"></span>
						</a>
					</li>
				</ul>




	 
			</div><!-- this is the end wrapper for the sidebar --> 
 
</nav>