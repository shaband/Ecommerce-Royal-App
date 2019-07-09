
<nav class="navbar header-navbar pcoded-header">
	<div class="navbar-wrapper">
	<div class="navbar-logo">
	<a class="mobile-menu" id="mobile-collapse" href="#!">
	<i class="ti-menu"></i>
	</a>
	<a class="mobile-search morphsearch-search" href="#">
	<i class="ti-search"></i>
	</a>
	<a href="index.html">
	<img class="img-fluid" src="{{  asset('assets/backend/images/logo.png')  }}" alt="Theme-Logo" />
	</a>
	<a class="mobile-options">
	<i class="ti-more"></i>
	</a>
	</div>
	<div class="navbar-container container-fluid">
	<ul class="nav-left">
	<li>
	<div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
	</li>
	<li>
	<a class="main-search morphsearch-search" href="#">

	<i class="ti-search"></i>
	</a>
	</li>
	<li>
	<a href="#!" onclick="javascript:toggleFullScreen()">
	<i class="ti-fullscreen"></i>
	</a>
	</li>
 
	</ul>

	<!-- Ul Holder For Notifications and Profile issues  --> 
	<ul class="nav-right"> 
 	
	 	<!-- Notifications  --> 
	{{-- 	<li class="header-notification">
			<a href="#!">
				<i class="ti-bell"></i>
				<span class="badge bg-c-pink"></span>
			</a>
			<ul class="show-notification">
				<li>
				<h6>Notifications</h6>
				<label class="label label-danger">New</label>
				</li>
	 
				<li>
				<div class="media">
				<img class="d-flex align-self-center img-radius" src="{{ asset('assets/backend/images/avatar-4.jpg') }}" alt="Generic placeholder image">
				<div class="media-body">
				<h5 class="notification-user">Sara Soudein</h5>
				<p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
				<span class="notification-time">30 minutes ago</span>
				</div>
				</div>
				</li>
			</ul>
		</li> --}}
 

		<!-- Profile and Authenticated User  --> 
		<li class="user-profile header-notification">
			<a href="#!">
				@php 
					// this has a small piece of pure in footer.blade.php 
					// we are using random api to generate images  -_- 
					// we may think of implementing laravel file manager  -_- 
					$user = Auth::user()  ; 
				@endphp 
				<img src="{!! is_null($user->image) == true ?   asset("user_placeholder.png")  :  asset("uploads/profile/$user->image") !!}" class="profile-image fresco ">
								{{-- <img class="u" class="img-radius user_profile_image" alt="User-Profile-Image"> --}}
				<span>{!! Auth::user()->name !!}</span>
				<i class="ti-angle-down"></i>
			</a>
			<!-- Drop Down Auth user options  --> 
			<ul class="show-notification profile-notification">
				<li>
					<a href="{!! route('dashboard.get_settings') !!}">
						<i class="ti-settings"></i> General Settings
					</a>
				</li>
				<li>
					<a href="{!! route('backend.profile' , Auth::user()->id ) !!}">
						<i class="ti-user"></i> Profile
					</a>
				</li>
				 
				 
				<li>
					<a href="{!! route('backend.logout') !!}">
						<i class="ti-layout-sidebar-left"></i> Logout
					</a>
				</li>


				
			</ul>
		</li>

	</ul>


	<!-- Search Logic  --> 
	<div id="morphsearch" class="morphsearch">
		<form class="morphsearch-form">
			<input class="morphsearch-input" type="search" placeholder="Search..." />
			<button class="morphsearch-submit" type="submit">Search</button>
		</form>

	<!-- Search Content  --> 
	<div class="morphsearch-content">

		<!-- Different search layouts  --> 
		<div class="dummy-column">
			<h2>People</h2>
			<a class="dummy-media-object img-radius" href="#!">
				<img src="../files/assets/images/avatar-4.jpg" class="img-radius" alt="Sara Soueidan" />
				<h3>Sara Soueidan</h3>
			</a>
			<a class="dummy-media-object img-radius" href="#!">
				<img src="../files/assets/images/avatar-2.jpg" class="img-radius" alt="Shaun Dona" />
				<h3>Shaun Dona</h3>
			</a>
		</div>

		<!-- Different search layouts  --> 
		<div class="dummy-column">
			<h2>Popular</h2>
			<a class="dummy-media-object img-radius" href="#!">
				<img src="../files/assets/images/avatar-3.jpg" class="img-radius" alt="PagePreloadingEffect" />
				<h3>Page Preloading Effect</h3>
			</a>
			<a class="dummy-media-object img-radius" href="#!">
				<img src="../files/assets/images/avatar-4.jpg" class="img-radius" alt="DraggableDualViewSlideshow" />
				<h3>Draggable Dual-View Slideshow</h3>
			</a>
		</div>
		

		<!-- Different search layouts  --> 
		<div class="dummy-column">
			<h2>Recent</h2>
			<a class="dummy-media-object img-radius" href="#!">
				<img src="../files/assets/images/avatar-2.jpg" class="img-radius" alt="TooltipStylesInspiration" />
				<h3>Tooltip Styles Inspiration</h3>
			</a>
			<a class="dummy-media-object img-radius" href="#!">
				<img src="../files/assets/images/avatar-3.jpg" class="img-radius" alt="NotificationStyles" />
				<h3>Notification Styles Inspiration</h3>
			</a>
		</div>

	</div>


	<span class="morphsearch-close"><i class="icofont icofont-search-alt-1"></i></span>
	</div>




	</div>
	</div>
</nav>