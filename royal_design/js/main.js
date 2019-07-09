
$(document).ready(function(){
	// Shopping Card
	(function(){
		 
		  $("#cart").on("click", function() {
		    $(".shopping-cart").fadeToggle( "fast");
		  });
		  
		})();

	// menu toggle in resposive 
	
		(function(){
		 
		  $("#navbar-menu").on("click", function() {
		    $(".menu-header").toggleClass( "active");
		  });		  
		})();

		// subscrip slider
	$('.first-slider').slick({
		infinite: true,
		autoplay: true,
  		autoplaySpeed: 5000,
		slidesToShow: 5,
		slidesToScroll: 1,
		responsive: [
		    {
		      breakpoint: 1200,
		      settings: {
		        slidesToShow: 4,
		        slidesToScroll: 1,
		        infinite: true,
		         
		      }
		    },
		    {
		      breakpoint: 992,
		      settings: {
		        slidesToShow: 3,
		        slidesToScroll: 1,
		        infinite: true,
		      }
		    },
		    {
		      breakpoint: 768,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1,
		        infinite: true,
		      }
		    }
		     
		  ]
	});

	$('.scound-slider').slick({
		infinite: true,
		autoplay: true,
  		autoplaySpeed: 4000,
		slidesToShow: 5,
		slidesToScroll: 1,
		responsive: [
		    {
		      breakpoint: 1200,
		      settings: {
		        slidesToShow: 4,
		        slidesToScroll: 1,
		        infinite: true,
		         
		      }
		    },
		    {
		      breakpoint: 992,
		      settings: {
		        slidesToShow: 3,
		        slidesToScroll: 1,
		        infinite: true,
		      }
		    },
		    {
		      breakpoint: 768,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1,
		        infinite: true,
		      }
		    }
		     
		  ]
	});
});