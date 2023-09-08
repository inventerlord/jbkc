
// JavaScript Scroll Effect //

// jQuery(document).ready(function() {
//     jQuery('.container').addClass("hidden").viewportChecker({
//         classToAdd: 'visible animated fadeInUp',
//         offset: 100
//        });
// });

// JavaScript Counting Effect //

 //   jQuery(document).ready(function( $ ) {
//        $('.counter').counterUp({
//            delay: 10,
//            time: 1000
//        });
//    });


// JavaScript Testimonials Effect //

    $(document).ready(function() {

		var owl = $('#owl-demo');
            owl.owlCarousel({
                margin: 0,
                loop: true,
                autoplay: true,
                dots: true,
				autoplayTimeout: 2000,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                navigation: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 1
                    },
                    680: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });

    });

	 $(document).ready(function() {

		var owl = $('#owl-demo1');
            owl.owlCarousel({
                margin: 10,
				items : 4,
                loop: true,
                autoplay: false,
                dots: false,
				autoplayTimeout: 2000,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                navigation: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 1
                    },
                    680: {
                        items: 2
                    },
                    1000: {
                        items: 4
                    }
                }
            });

    });

$(document).ready(function(){
    $(".our-products").click(function(){		$('.services_box').hide();
        $(".products").toggle();
    });
});
