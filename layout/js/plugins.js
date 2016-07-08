(function($) {


    'use strict';

    
    /* ==========================================================================
                     When document is ready, do
   ========================================================================== */
    $(document).ready(function() {

        /* ==========================================================================
         Build & Animate the Pie Charts
         ========================================================================== */
        function animatePieCharts() {

            if(typeof $.fn.easyPieChart !== 'undefined' ) {


                $('.mt-chart:in-viewport').each(function () {

                    var $t = $(this),
                        n = $t.parent().width(),
                        l = "round";

                    if ($t.attr("data-lineCap") !== undefined) {
                        l = $t.attr("data-lineCap");
                    }

                    // Set dimensions for Pie Charts
                    $(this).css({
                        "width": n,
                        "height": n,
                        "line-height": n + "px",
                        "font-size": n / 3
                    });

                    // Animate
                    $t.easyPieChart({
                        animate: 1300,
                        lineCap: l,
                        lineWidth: $t.attr("data-lineWidth"),
                        size: n,
                        barColor: $t.attr("data-barColor"),
                        trackColor: $t.attr("data-trackColor"),
                        scaleColor: "transparent",
                        onStep: function (from, to, percent) {
                            $(this.el).find('.mt-pie-chart-custom-text').text(Math.round(percent) + "%" );
                        }

                    });

                });
            }
        } // function ends here

        // Owl Carousel - used to create carousels throughout the site
        // http://owlgraphic.com/owlcarousel/
        if (typeof $.fn.owlCarousel !== 'undefined') {

            $('.owlCarousel').each(function ( index ) {

                var sliderSelector      = '#owlCarousel-' + $(this).data('slider-id'); // this is the slider selector
                var sliderItems         = $(this).data('slider-items');
                var sliderSpeed         = $(this).data('slider-speed');
                var sliderAutoPlay      = $(this).data('slider-auto-play');
                var sliderNavigation    = $(this).data('slider-navigation');
                var sliderPagination    = $(this).data('slider-pagination');
                var sliderSingleItem    = $(this).data('slider-single-item');

                //conversion of 1 to true & 0 to false


                // auto play
                if(sliderAutoPlay == 0 || sliderAutoPlay == 'false') {
                    sliderAutoPlay = false;
                } else {
                    sliderAutoPlay = true;
                }

                // pager
                if(sliderPagination == 0 || sliderPagination == 'false') {
                    sliderPagination = false;
                } else {
                    sliderPagination = true;
                }

                // navigation
                if(sliderNavigation == 0 || sliderNavigation == 'false') {
                    sliderNavigation = false;
                } else {
                    sliderNavigation = true;
                }

                // Custom Navigation events outside of the owlCarousel mark-up
                $(".mt-owl-next").on('click', function(){
                    $(sliderSelector).trigger('owl.next');
                })
                $(".mt-owl-prev").on('click', function(){
                    $(sliderSelector).trigger('owl.prev');
                })



                // instantiate the slider with all the options
                $(sliderSelector).owlCarousel({

                    items: sliderItems,
                    slideSpeed: sliderSpeed,
                    navigation : sliderNavigation,
                    autoPlay: sliderAutoPlay,
                    pagination: sliderPagination,
                    navigationText: [ // custom navigation text (instead of bullets). navigationText : false to disable arrows / bullets
                        "<i class='fa fa-angle-left'></i>",
                        "<i class='fa fa-angle-right'></i>"
                    ]
                });

            });

        } // end

        // Owl Carousel - used to create carousels throughout the site
        // http://owlgraphic.com/owlcarousel/
        if(typeof $.fn.owlCarousel != 'undefined' ) {


            var owl = $("#mt-twitter-carousel");



            // Footer Twitter Widget
            if(owl.length !== 0 ) {
                owl.owlCarousel({
                    items: 1,
                    singleItem: true,
                    pagination: true,
                    mouseDrag  : false
                });
            }

                /* ==============================================================================================================
                    Since we're using different owl carousel configurations for different breakpoints,
                    we've decided against using CSS to re-style the nav icons and better leave it for Owl Carousel
                    to handle the responsiveness part
                 ============================================================================================================== */

                if(viewportSize.getWidth() > 768) {

                	$('.big-testimonial').each(function(){
                		var owl3 = $(this);

                	// testimonials box (featured testimonials)
                    owl3.owlCarousel({
                        items: 1,           // This variable allows you to set the maximum amount of items displayed at a time with the widest browser width
                        navigation:true,    // Display "next" and "prev" buttons.
                        pagination: false,  // no pagination
                        navigationText: [   // custom navigation text (instead of bullets). navigationText : false to disable arrows / bullets
                          "<i class='fa fa-angle-left'></i>",
                          "<i class='fa fa-angle-right'></i>"
                          ],
                        singleItem: true
                      });


                	});


                } else {

                	$('.big-testimonial').each(function(){
                		var owl3 = $(this);

                // testimonials box (featured testimonials)
                    owl3.owlCarousel({
                        items: 1,           // This variable allows you to set the maximum amount of items displayed at a time with the widest browser width
                        navigation: false,    // Display "next" and "prev" buttons.
                        pagination: true,  // no pagination
                        singleItem: true
                      });
                   });
                }


                /*
                *  Custom Owl Carousel Navigation Events
                *
                *   Trigger Owl Carousel specific events when clicking on next / prev buttons
                *
                *   @see  http://owlgraphic.com/owlcarousel/#customizing (Custom Events)
                */
                $(".next").on('click', function(){
                    owl.trigger('owl.next');
                })
                $(".prev").on('click', function(){
                    owl.trigger('owl.prev');
                })

        }

        if( $( '.mt-blogpost-wrapper' ).length ) {
            var slides = $( '.mt-blogpost-wrapper' ).data('slider-items');
            $( '.mt-blogpost-wrapper' ).owlCarousel({
                items: slides,
                navigation: true,
                pagination: false,
                navigationText: [
                    "<i class='fa fa-angle-left'></i>",
                    "<i class='fa fa-angle-right'></i>"
                ],
            });
        }

        // simplePlaceholder - polyfill for mimicking the HTML5 placeholder attribute using jQuery
        // https://github.com/marcgg/Simple-Placeholder/blob/master/README.md
        if(typeof $.fn.simplePlaceholder != 'undefined'){

            $('input[placeholder], textarea[placeholder]').simplePlaceholder();

        }

        // Parallax.js  -  a dirt simple parallax scrolling effect inspired by Spotify.com and implemented as a jQuery plugin.
        // https://pixelcog.github.io/parallax.js/
        if(typeof $.fn.parallax != 'undefined') {

            if( $('.parallax-bg-image').data('image-source') !== '' ) {

                $('.parallax-bg-image').each(function () {

                    var imageSource = $(this).data('image-source');

                    $(this).parallax({
                        imageSrc: imageSource,
                        iosFix: true,
                        androidFix: true
                    });
                });
            } // if check
        }

        // WOW JS - Uses animate.css and only animates element when they're in viewport
        // http://mynameismatthieu.com/WOW/docs.html
        if( pixova_lite_localization.animations_enabled == 'animations_enabled') {
            new WOW().init();
        }

        /* ==========================================================================
           When the window is scrolled, do
           ========================================================================== */

        $(window).scroll(function() {
            animatePieCharts();
        });
    });

    

})(window.jQuery);

//non jQuery plugins below
