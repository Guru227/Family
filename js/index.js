//index.js


$(document).ready(function() {

	//displays 'back to top' div when not at the top-most position
	$(window).scroll(function() {
	    if ($(this).scrollTop()) {
	        $('#toTop').fadeIn();
	    } else {
	        $('#toTop').fadeOut();
	    }
	});

	//on clicking back to top, animates moving back to top
	$("#toTop").click(function () {
	   //1s animation time
	   //html for FFX but not Chrome
	   //body for Chrome but not FFX
	   //This for both
	   $("html, body").animate({scrollTop: 0}, 1000);
	});

	//setting event-listener for about-us href
	//setting even-handler to scroll down smoothly
	$('[href="#about-us"]').click(function (){
		$('html, body').animate({scrollTop:$('#about-us').position().top}, 1000);
	});

	//setting event-listener for testimonials href
	//setting even-handler to scroll down smoothly
	$('[href="#testimonial-heading"]').click(function (){
		$('html, body').animate({scrollTop:$('#testimonial-heading').position().top}, 1000);
	});


});