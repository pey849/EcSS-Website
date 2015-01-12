

		$(document).ready(function() {
		     $(window).scroll(function() {
			 $('#object3').each(function(){
			 var imagePos = $(this).offset().top;
     
			 var topOfWindow = $(window).scrollTop();
			     if (imagePos < topOfWindow+400) {
				 $(this).addClass("fadeIn");
			     }
			 });
		     });
		 });
     
	     

		$(document).ready(function() {
		     $(window).scroll(function() {
			 $('#object4').each(function(){
			 var imagePos = $(this).offset().top;
     
			 var topOfWindow = $(window).scrollTop();
			     if (imagePos < topOfWindow+400) {
				 $(this).addClass("fadeIn");
			     }
			 });
		     });
		 });
     
	     