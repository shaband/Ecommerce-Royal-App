    @include('backend.template.partials.header')

	<div id="pcoded" class="pcoded">
		<div class="pcoded-overlay-box"></div>
		<div class="pcoded-container navbar-wrapper">

			@include('backend.template.partials.navigation')


			@include('backend.template.partials.sidebar_chat')
			@include('backend.template.partials.chat_inner')

			<div class="pcoded-main-container">
				<div class="pcoded-wrapper">
					
					<!-- adding our sidebar  --> 
					@include('backend.template.partials.sidebar')

					<div class="pcoded-content">


						<div class="pcoded-inner-content">
					
							<div class="main-body">

								<div class="page-wrapper">

									
									@yield('breadcrumb')

									<div class="page-body">
										<div class="row">
										 	
										 	<!-- injecting content into dom  --> 
										   @yield('content')

										</div><!-- end row  --> 
									</div><!-- end page body --> 
								</div><!-- end page wrapper  --> 

								
									
									 

							 

								<div id="styleSelector"></div>
								<!-- style selector  --> 

							</div><!-- end main body --> 
						</div><!-- end pcoded inner content --> 

					</div><!-- end pcoded content  --> 


				</div>
			</div>


		</div>
	</div>



	@include('backend.template.partials.footer')





