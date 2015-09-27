$(document).ready(function () {
    // cache the window object
    $window = $(window);

    $('section[data-type="background"]').each(function () {
        // declare the variable to affect the defined data-type
        var $scroll = $(this);

        $(window).scroll(function () {
            // HTML5 proves useful for helping with creating JS functions!
            // also, negative value because we're scrolling upwards
            var yPos = -($window.scrollTop() / $scroll.data('speed'));

            // background position
            var coords = '50% ' + yPos + 'px';

            // move the background
            $scroll.css({
                backgroundPosition: coords
            });
        }); // end window scroll
    });  // end section function

    //owlCarousel home
    $("#owl-demo").owlCarousel({
        autoPlay: 3000,
        items: 4,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [979, 3]
    });//owlCarousel home end

    //profileImageSlider
    $("#profileImage-slider").owlCarousel({
        //autoPlay: 3000, //Set AutoPlay to 3 seconds 
        items: 4,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [979, 3]

    });//profileImageSlider end
    //otherPeople-slider
    $("#otherPeople-slider").owlCarousel({
        //autoPlay: 3000, //Set AutoPlay to 3 seconds 
        items: 4,
        navigation: true,
        pagination: false,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [979, 3]

    });//otherPeople-slider end

    //testimonial-slider
    var testimonial = $('#testimonial-slider');
    $("#testimonial-slider").owlCarousel({
        //autoPlay: 3000,
        navigation: false, // Show next and prev buttons
        pagination: true,
        paginationNumbers: true,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true
    });
    var lastItem = $('.item').length;
    $('.goToPrev').click(function () {
        testimonial.trigger('owl.goTo', 0);
    });
    $('.goToNext').click(function () {
        testimonial.trigger('owl.goTo', lastItem);
    });//testimonial-slider gotonext and gotoprevious btn end
    
    $('.prev').click(function () {
        testimonial.trigger('owl.prev');
    });
    $('.next').click(function () {
        testimonial.trigger('owl.next');
    });
    //testimonial-slider next and previous btn end
    //testimonial-slider end

    //owlprofileCarousel  
    $("#owl-promo").owlCarousel({
        //autoPlay: 3000,
        navigation: false, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        center:true,
        singleItem: true

                // "singleItem:true" is a shortcut for:
                // items : 1, 
                // itemsDesktop : false,
                // itemsDesktopSmall : false,
                // itemsTablet: false,
                // itemsMobile : false

    });//owlprofileCarousel end
    
    //owlprofileCarousel  
    $("#owl-video").owlCarousel({
        //autoPlay: 3000,
        navigation: false, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true
        // "singleItem:true" is a shortcut for:
        // items : 1, 
        // itemsDesktop : false,
        // itemsDesktopSmall : false,
        // itemsTablet: false,
        // itemsMobile : false

    });
	//awardCarousel
	$("#award-slider").owlCarousel({
        //autoPlay: 3000,
        navigation: false, // Show next and prev buttons
        pagination: true,
        //paginationNumbers: true,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true
    });

	//owlprofileCarousel end

    //popover on contact us
    //$(function () {
       // $('[data-toggle="popover"]').popover();
    //});
    
}); // close out script

/* Create HTML5 element for IE */
document.createElement("section");

