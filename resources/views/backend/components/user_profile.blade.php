<!-- Auth User Part --> 

			<div class="">
				<div class="main-menu-header">
					@php 
						// this has a small piece of pure in footer.blade.php 
						// we are using random api to generate images  -_- 
						// we may think of implementing laravel file manager  -_- 
						$user= Auth::user() ; 
					@endphp 
					<img class="img-40 img-radius user_profile_image" src="{!! is_null($user->image) == true ?   asset("user_placeholder.png")  :  asset("uploads/profile/$user->image") !!}" class="profile-image fresco ">
								{{-- <img class="u" alt="User-Profile-Image"> --}}
					<div class="user-details">
						<span>{!! Auth::user()->name !!}</span>
						<span id="more-details">{!! Auth::user()->access_level !!}<i class="ti-angle-down"></i></span>
					</div>
				</div>
				<div class="main-menu-content">
					<ul>
						<li class="more-details">
							<a href="{!! route('backend.profile' , Auth::user()->id ) !!}"><i class="ti-user"></i>View Profile</a>
							<a href="{!! route('dashboard.get_settings') !!}"><i class="ti-settings"></i>Settings</a>
							<a href="{!! route("backend.logout") !!}"><i class="ti-layout-sidebar-left"></i>Logout</a>
						</li>
					</ul>
				</div>
			</div>

		<!-- End auth User Part -->
		