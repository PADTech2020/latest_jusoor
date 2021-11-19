jQuery(document).ready(function($) {
    "use strict";
    $(".partners-slider").owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        animateOut: 'slideOutDown',
        animateIn: 'flipInX',
        items:4,
        stagePadding:30,
        smartSpeed:450,
        autoPlay:true
    });
    // setTimeout(function () {

        if ($(window).width() < 1200) {

            $("#hero-slider").owlCarousel({
                // loop:true,
                // margin:10,
                // nav:true,
                singleItem: true,
                // animateOut: 'slideOutDown',
                // animateIn: 'flipInX',
                items:1,
                // autoPlay:true,

            });
        }else{
            $("#hero-slider").owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                animateOut: 'slideOutDown',
                animateIn: 'flipInX',
                items:1,
                stagePadding:30,
                smartSpeed:450,
                autoPlay:true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    768: {
                        items: 1,
                        nav: true
                    },
                    1000: {
                        items: 1,
                        nav: true
                    },
                    1200: {
                        items: 1,
                        nav: true
                    },

                }
            });
        }

    // },1000);
    // $("#hero-slider").owlCarousel({
    //     loop:true,
    //     margin:10,
    //     nav:true,
    //     animateOut: 'slideOutDown',
    //     animateIn: 'flipInX',
    //     items:1,
    //     stagePadding:30,
    //     smartSpeed:450,
    //     autoPlay:true,
    //     responsive: {
    //         0: {
    //             items: 1
    //         },
    //         768: {
    //             items: 1
    //         },
    //         1000: {
    //             items: 1
    //         },
    //
    //     }
    // });
    $('.might-like-carousel').owlCarousel({
        loop: true,
        items: 3,
        margin: 0,
        autoplay: true,
        dots:true,
        nav:true,
        autoplayTimeout: 8500,
        smartSpeed: 450,
        navText: ['<i class="fa fa-angle-left fa-5x"></i>','<i class="fa fa-angle-right fa-5x"></i>'],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1170: {
                items: 3
            }
        }
    });
});