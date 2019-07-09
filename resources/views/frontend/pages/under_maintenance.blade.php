<!DOCTYPE html>

<html lang="en-us" class="no-js">

 
<head>
		<meta charset="utf-8">
        <title>Royal | -_- | Under Maintenance</title>
        <meta name="description" content="Under maintenance - flat able">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Codedthemes">
        <!-- Favicon -->
        <link rel="shortcut icon" href="img/favicon.ico">
        <link rel="stylesheet" href="{{ asset('assets/extra/maintenance/css/style-minimal-flat.css') }}" />
		<script src="{{ asset('assets/extra/maintenance/js/modernizr.custom.js') }}"></script>
	</head>

    <body>

    	<!-- Loading overlay -->
		<div id="loading" class="dark-back">
			<div class="loading-bar"></div>
			<span class="loading-text opacity-0">So Excited ?</span>
		</div>

		<!-- Canvas for particles animation -->
		<div id="particles-js"></div>

    	<!-- Informations bar on top of the screen -->
    	<div class="info-bar bar-intro opacity-0">

    		<div class="row">

    			<div class="col-xs-12 col-sm-6 col-lg-6 info-bar-left">

    				<p>Grand Opening in <span id="countdown"></span></p>

    			</div>

    			<div class="col-xs-12 col-sm-6 col-lg-6 info-bar-right">

    				 

    				<p class="social-icon">
    					<a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
    					<a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
    					<a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
    					<a href="#" target="_blank"><i class="fa fa-dribbble"></i></a>
    					<a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
    				</p>

    			</div>
    		</div>
    	</div>
    	<!-- END - Informations bar on top of the screen -->

        <!-- Slider Wrapper -->
        <div id="slider" class="sl-slider-wrapper">

			<div class="sl-slider">
			
				<!-- SLIDE 1 / Home -->
				<div class="sl-slide bg-1" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
					
					<div class="sl-slide-inner">

						<div class="content-slide">

							<div class="container">

								<img src="img/logo.png" alt="" class="brand-logo text-intro opacity-0" />
							
								<h1 class="text-intro opacity-0">Under Maintenance</h1>
							
								<p class="text-intro opacity-0">So Excited !!!<strong> Product Launch</strong> by Smart Tatweers
                                <br> Top bar Time countdown - Chill your excitement.
								</p>

								<a data-dialog="somedialog" class="action-btn trigger text-intro opacity-0">Click Me !</a>

							</div>
						</div>
					</div>
				</div>
				<!-- END - SLIDE 1 / Home -->$

			</div>
			<!-- END - sl-slider -->

			

		</div>
		<!-- END - Slider Wrapper -->

        <!-- Newsletter Popup -->
		<div id="somedialog" class="dialog">

			<div class="dialog__overlay"></div>
					
			<!-- dialog__content -->
			<div class="dialog__content">

				<div class="header-picture"></div>
						
				<!-- dialog-inner -->
				<div class="dialog-inner">
							
					<h4>Notify Popup Highlight</h4>
							
					<p>Just write the pefect description for your launch product here.... <strong>Codedthemes Product launch in next XX weeks. Enjoy !!!</strong></p>

					<!-- Newsletter Form -->
					<div id="subscribe">

		                <form action="#" id="notifyMe" method="POST">

		                    <div class="form-group">

		                        <div class="controls">
		                            
		                        	<!-- Field  -->
		                        	<input type="text" id="mail-sub" name="email" placeholder="Click here to write your email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address'" class="form-control email srequiredField" />

		                        	<!-- Spinner top left during the submission -->
		                        	<i class="fa fa-spinner opacity-0"></i>

		                            <!-- Button -->
		                            <button class="btn btn-lg submit">Submit</button>

		                            <div class="clear"></div>

		                        </div>

		                    </div>

		                </form>

						<!-- Answer for the newsletter form is displayed in the next div, do not remove it. -->
						<div class="block-message">

							<div class="message">

								<p class="notify-valid"></p>

							</div>

						</div>
						<!-- END - Answer for the newsletter form is displayed in the next div, do not remove it. -->

        			</div>
        			<!-- END - Newsletter Form -->
				</div>
				<!-- END - dialog-inner -->

				<!-- Cross for closing the Newsletter Popup -->
				<button class="close-newsletter" data-dialog-close><i class="icon ion-android-close"></i></button>

			</div>
			<!-- END - dialog__content -->
						
		</div>


	 
		<script src="{{ asset('assets/extra/maintenance/js/jquery.min.js') }}"></script>
		<script src="{{ asset('assets/extra/maintenance/js/jquery.easings.min.js') }}"></script>
		<script src="{{ asset('assets/extra/maintenance/js/bootstrap.min.js') }}"></script>

		<!-- SlitSlider plugin -->
		<script src="{{ asset('assets/extra/maintenance/js/jquery.ba-cond.min.js') }}"></script>
		<script src="{{ asset('assets/extra/maintenance/js/jquery.slitslider.js') }}"></script>

		<!-- Newsletter plugin -->
		<script src="{{ asset('assets/extra/maintenance/js/notifyMe.js') }}"></script>

		<!-- Popup Newsletter Form -->
		<script src="{{ asset('assets/extra/maintenance/js/classie.js') }}"></script>
		<script src="{{ asset('assets/extra/maintenance/js/dialogFx.js') }}"></script>

		<!-- Particles effect plugin on the right -->
		<script src="{{ asset('assets/extra/maintenance/js/particles.js') }}"></script>

		<!-- Custom Scrollbar plugin -->
		<script src="{{ asset('assets/extra/maintenance/js/jquery.mCustomScrollbar.js') }}"></script>

		<!-- Countdown plugin -->
		<script src="{{ asset('assets/extra/maintenance/js/jquery.countdown.js') }}"></script>

		<script>
		$("#countdown")
			// Year/Month/Day Hour:Minute:Second
			.countdown("2018/10/24 15:30:30", function(event) {
				$(this).html(
					event.strftime('%D Days %Hh %Mm %Ss')
				);
		});
		</script>

		<!-- Main application scripts -->
		<script src="{{ asset('assets/extra/maintenance/js/main-flat.js') }}"></script>

	</body>
 
</html>