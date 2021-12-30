
//AOS.init();
AOS.init({
 easing: 'ease-out-back',
 duration: 2000
});
jQuery(window).on('load', function() {
	jQuery('.object-wppu-preview').hide();
});


	var j = jQuery.noConflict();
		j(function() {
			j('#responsive_menu').mmenu();
			j('html').addClass('mm-right mm-front');
			j('#responsive_menu').addClass('mm-right mm-front');
		});

jQuery(document).ready(function() {
	//Product Image Zoom
	var jQueryeasyzoom = jQuery('.easyzoom').easyZoom();	
	
	//Select
	jQuery('.select2').select2();		
	
	//Date Picker
	jQuery('#datepicker').datepicker({
		inline: true,
		firstDay: 1,
		//nextText: '&rarr;',
		//prevText: '&larr;',
		showOtherMonths: true,
		//dateFormat: 'dd MM yy',
		dayNamesMin: ['S', 'M', 'T', 'W', 'T', 'F', 'S'],
		//showOn: "button",
		//buttonImage: "img/calendar-blue.png",
		//buttonImageOnly: true,
	});
	
	
	
	jQuery( ".tours-checkboxes-list-item" ).click(function() {
		jQuery( this ).toggleClass( "active" );
		var checkBoxes = $(this).find(':checkbox');
		if(checkBoxes.prop("checked")==true){
			checkBoxes.prop("checked", false); 
		}else{
			checkBoxes.prop("checked", true)
		}
	});
	
	
	
	
	//Scroll Link
	jQuery('.scroll-link').click(function() {
		var sectionTo = $(this).attr('href');
		jQuery('html, body').animate({
		  scrollTop: $(sectionTo).offset().top
		}, 1500);
	});
	
	//Book Airport Transfers Form 
	jQuery(".booking-form-airport-button").click(function(){
		jQuery("#transfers-book-instantly").addClass("hide");
		jQuery("#book-airport-transfers-form").addClass("active");
		jQuery('html, body').animate({
			scrollTop: jQuery("#book-airport-transfers-form").offset().top -220
		}, 2000);
	});
	
	// Input Select Airline Number
	jQuery(".checkbox-input").change(function() {
		if(jQuery(this).prop('checked')) {
			jQuery(this).parent().parent().addClass("active-check");
			
		}else {
			jQuery(this).parent().parent().removeClass("active-check");
		}
	});
	
	//Book Tour Form 
	jQuery(".tour-booking-button").click(function(){
		jQuery("#tour-form-button-cover").addClass("hide");
		jQuery("#tour-booking-form").addClass("active");
		jQuery('html, body').animate({
			scrollTop: jQuery("#tour-booking-form").offset().top -220
		}, 2000);
	});
	
	//Search Bar
	jQuery(".search-link").click(function(){
		jQuery(".search-divblock").addClass("active");
	});
	jQuery(".buttonsearch").click(function(){
		jQuery(".search-divblock").removeClass("active");
	});
	
	//Home Slider
	jQuery('.home-topslider').slick({
		dots: false,
		prevArrow: '<span class="slick-slide-arrow prev-arrow nav-design"><i class="fa fa-chevron-left" style=""></i></span>',
		nextArrow: '<span class="slick-slide-arrow next-arrow nav-design"><i class="fa fa-chevron-right" style=""></i></span>',
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		speed: 500,
		fade: true,
		cssEase: 'linear'
		/* responsive: [
			{
			  breakpoint: 1024,
			  settings: {
				slidesToShow: 4,
				slidesToScroll: 1
			  }
			},
			{
			  breakpoint: 959,
			  settings: {
				slidesToShow: 3,
				slidesToScroll: 1
			  }
			},
			{
			  breakpoint: 767,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			}
		  ] */
	});
	
	//Home Slider
	jQuery('.gallery-slider').slick({
		dots: false,
		prevArrow: false,
		nextArrow: false,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		responsive: [
			{
			  breakpoint: 768,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			},
			{
			  breakpoint: 767,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			}
		  ]
	});
	
	//Product Slider
	jQuery('.product-slider').slick({
		dots: false,
		prevArrow: '<span class="slick-slide-arrow prev-arrow"><i class="fa fa-chevron-left" style=""></i></span>',
		nextArrow: '<span class="slick-slide-arrow next-arrow"><i class="fa fa-chevron-right" style=""></i></span>',
		infinite: true,
		slidesToShow: 2,
		slidesToScroll: 1,
		responsive: [
			{
			  breakpoint: 768,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			},
			{
			  breakpoint: 767,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			}
		  ]
	});
	
	//Tours Images Gallery
	jQuery('.tours-images-gallery').slick({
		dots: false,
		prevArrow: '<span class="slick-slide-arrow prev-arrow"><i class="fa fa-chevron-left" style=""></i></span>',
		nextArrow: '<span class="slick-slide-arrow next-arrow"><i class="fa fa-chevron-right" style=""></i></span>',
		infinite: true,
		slidesToShow: 5,
		slidesToScroll: 1,
		responsive: [
			{
			  breakpoint: 1024,
			  settings: {
				slidesToShow: 3,
				slidesToScroll: 1
			  }
			},
			{
			  breakpoint: 768,
			  settings: {
				slidesToShow: 2,
				slidesToScroll: 1
			  }
			},
			{
			  breakpoint: 767,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			}
		  ]
	});
	
jQuery('#createaccount').change(function () {
    var check = jQuery(this).prop('checked');
    if(check === true) {
		jQuery("#createaccount-password").fadeIn("slow");
		jQuery("#createaccount-password .form-control").attr("disabled", false);
    } else {
		jQuery("#createaccount-password").fadeOut("slow");
		jQuery("#createaccount-password .form-control").attr("disabled", true);
    }
});


// Input Select Airline Number
	jQuery('.radios-pay').click(function () {
        jQuery('.radios-pay:not(:checked)').parent().parent().removeClass("active-pay");
        jQuery('.radios-pay:checked').parent().parent().addClass("active-pay");
    }); 	
});

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
//Fixed Navbar
document.addEventListener("DOMContentLoaded", function(){
  window.addEventListener('scroll', function() {
      if (window.scrollY > 400) {
        document.getElementById('navbar_top').classList.add('fixed-top');
		document.getElementById('mobile-nav-header').classList.add('fixed-top');
        // add padding top to show content behind navbar
        navbar_height = document.querySelector('.navbar-block').offsetHeight;
        mobile_navbar_height = document.querySelector('.mobile-nav-header').offsetHeight;
		if(mobile_navbar_height != 0){
			document.body.style.paddingTop = mobile_navbar_height + 'px';
			console.log(mobile_navbar_height+'1');
		}else{
			document.body.style.paddingTop = navbar_height + 'px';
			// console.log(navbar_height+'2');
		}
		
      } else {
        document.getElementById('navbar_top').classList.remove('fixed-top');
		document.getElementById('mobile-nav-header').classList.remove('fixed-top');
         // remove padding top from body
        document.body.style.paddingTop = '0';
      } 
  });
}); 