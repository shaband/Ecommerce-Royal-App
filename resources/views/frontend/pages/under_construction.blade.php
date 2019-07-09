<!DOCTYPE html>

<html lang="en-us" class="no-js">

	
 
<head>
		<meta charset="utf-8">
		<title>Royal | -_- | Under Construction</title>
		<meta name="description" content="Flat able 404 Error page design">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="Codedthemes">
        <!-- Favicon -->
        <link rel="shortcut icon" href="img/favicon.ico">
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/extra/construction/css/style.css') }}" />
	</head>

	<body>

        <a id="bgndVideo" class="player" data-property="{videoURL:'http://youtu.be/RdGVz104b3E',containment:'body',autoPlay:true, mute:false, startAt:0, stopAt:0, opacity:1}"></a>

        <!-- Your logo on the top left -->
        <a href="#" class="logo-link" title="back home">

            <img src="{{  asset('assets/frontend/img/logo.png')  }}" class="logo" alt="Company's logo" />

        </a>

        <div class="content">

            <div class="content-box">

                <div class="big-content">

                    <!-- Main squares for the content logo in the background -->
                    <div class="list-square">
                        <span class="square"></span>
                        <span class="square"></span>
                        <span class="square"></span>
                    </div>

                    <!-- Main lines for the content logo in the background -->
                    <div class="list-line">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>

                    <!-- The animated searching tool -->
                    <i class="fa fa-search" aria-hidden="true"></i>

                    <!-- div clearing the float -->
                    <div class="clear"></div>

                </div>

                <!-- Your text -->
                <h1>Our website is under construction</h1>

                <p>please be patient and check back later  , or you can subscribe our newsletter</p>

            </div>

        </div>

    <footer class="light">
        <ul>
            <li><a href="#">Support</a></li>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        </ul>
    </footer>
        <script src="{{ asset('assets/extra/construction/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/extra/construction/js/bootstrap.min.js') }}"></script>

        <!-- YouTube plugin -->
        <script src="{{ asset('assets/extra/construction/js/jquery.mb.YTPlayer.js') }}"></script>

        <!-- Slideshow plugin for YouTube variant -->
        <script src="{{ asset('assets/extra/construction/js/vegas-youtube.js') }}"></script>

        <script>
        (function(){
        "use strict";

            var myPlayer = jQuery( "#bgndVideo" ).YTPlayer();

            var onMobile = false;

            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) { onMobile = true; }

            if( ( onMobile === false ) ) {

                $(".player").mb_YTPlayer();

            } else {

                $("body").vegas({
                    slides: [
                        { src: "{{  asset('assets/extra/construction/img/home-slide-1.jpg')  }}" },
                        { src: "{{  asset('assets/extra/construction/img/home-slide-2.jpg')  }}"  },
                        { src: "{{  asset('assets/extra/construction/img/home-slide-3.jpg')  }}" }
                    ],

                    // Delay beetween slides in milliseconds.
                    delay: 5000,
                    transition: 'fade'

                });
            }
        })()

        </script>

    </body>


 
</html>
