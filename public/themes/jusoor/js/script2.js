$(document).ready(function (e) {
    "use strict";

    var ua = navigator.userAgent.toLowerCase();
    if (ua.indexOf('safari') != -1) {
        if (ua.indexOf('chrome') > -1) {
            // Chrome
        } else {
            $('body .single-post-box p').css('text-align', 'right');
            $('body .single-post-box p span').css('text-align', 'justify');
        }
    }
    $('.single-post-box p:last-of-type').css('text-align', 'right');
    $('.single-post-box p span').css('font-family', 'droid arabic naskh');
    e(".short_link").click(function () {
        var o = e(".text_short_link");
        o[0].select(), o[0].setSelectionRange(0, 99999), document.execCommand("copy")
    }), e(document).on("click", '[data-toggle="lightbox"]', function (o) {
        o.preventDefault(), e(this).ekkoLightbox()
    });
    var o = 0;
    e("#short_link_ico").click(function () {
        0 == o ? (e(".short_link").css("display", "block"), o = 1) : (o = 0, e(".short_link").css("display", "none"))
    }), e("#short_link_ico2").click(function () {
        0 == o ? (e(".short_link").css("display", "block"), o = 1) : (o = 0, e(".short_link").css("display", "none"))
    });
    var t = e("#sy-slider-new").owlCarousel({});
    //     rtl: !0,
    //     loop: !0,
    //     // singleItem: !0,
    //     navigation: !0,
    //     slideSpeed: 300,
    //     paginationSpeed: 400,
    //     autoPlay: !0,
    //     responsive:{
    //         0:{
    //             items:1
    //         },
    //         600:{
    //             items:2
    //         },
    //         1000:{
    //             items:3
    //         }
    //     }
   var i = e("#top-slider").owlCarousel({
    //     rtl: !0,
    //     loop: !0,
    //     singleItem: !0,
    //     navigation: !0,
    //     slideSpeed: 300,
    //     paginationSpeed: 400,
    //     autoPlay: !0
    });
    window.setInterval(function () {
        t.trigger("prev.owl.carousel", [300]), i.trigger("prev.owl.carousel", [300]);
        var e = t.filter(".active").next(), o = t.filter(".active").next();
        e.length || (e = t.first()), o.length || (o = i.first()), e.trigger("click"), o.trigger("click")
    }, 1e3), e("#subscribe-form").submit(function (o) {
        o.preventDefault(), e.ajax({
            url: "https://nedaa-post.com/contact/subscribe",
            type: "post",
            data: {email: e("#mce-email").val(), _token: e("#csrf").val()}
        }).done(function (o, t, i) {
            e("#pop-up-text").text(o.message), e(".custom-model-main").addClass("model-open"), setTimeout(function () {
                e(".custom-model-main").removeClass("model-open")
            }, 4e3), console.log("Hooray, it worked!")
        }).fail(function (e, o, t) {
            console.error("The following error occurred: " + o, t)
        })
    }), e(".close-btn, .bg-overlay").click(function () {
        e(".custom-model-main").removeClass("model-open")
    });
    var a = e(window), n = e(".iso-call"), s = e(".filter");
    try {
        n.imagesLoaded(function () {
            a.trigger("resize"), n.isotope({
                filter: "*",
                layoutMode: "masonry",
                itemSelector: ".iso-call > div",
                masonry: {columnWidth: ".default-size"},
                animationOptions: {duration: 750, easing: "linear"}
            })
        })
    } catch (e) {
    }
    a.on("resize", function () {
        var e = s.find("a.active").attr("data-filter");
        try {
            n.isotope({filter: e, animationOptions: {duration: 750, easing: "linear", queue: !1}})
        } catch (e) {
        }
        return !1
    }), s.find("a").on("click", function () {
        var o = e(this).attr("data-filter");
        try {
            n.isotope({filter: o, animationOptions: {duration: 750, easing: "linear", queue: !1}})
        } catch (e) {
        }
        return !1
    });
    var l = e(".filter li a");
    l.on("click", function () {
        var o = e(this);
        o.hasClass("active") || (l.removeClass("active"), o.addClass("active"))
    }), e("#container").addClass("active"), e(".iso-call").css("opacity", 0), e(".iso-call").imagesLoaded(function () {
        e(".iso-call").css("opacity", 1)
    }), e("a.toogle-box").on("click", function (o) {
        o.preventDefault(), e(this).hasClass("active") ? (e(this).removeClass("active"), e("div.versions-box-choose").removeClass("closed")) : (e(this).addClass("active"), e("div.versions-box-choose").addClass("closed"))
    });
    try {
        e("#js-news").ticker({
            speed: .2,
            controls: !0,
            titleText: "",
            displayType: "reveal",
            direction: "ltr",
            pauseOnItems: 2e3,
            fadeInSpeed: 600,
            fadeOutSpeed: 300
        })
    } catch (e) {
    }
    try {
        e("#js-news-trends").ticker({
            speed: .2,
            controls: !0,
            titleText: "",
            displayType: "reveal",
            direction: "ltr",
            pauseOnItems: 2e3,
            fadeInSpeed: 600,
            fadeOutSpeed: 300
        })
    } catch (e) {
    }
    try {
        // var r = e(".owl-wrapper");
        // r.length > 0 && jQuery().owlCarousel && r.each(function () {
        //     var o, t, i = e(this).find(".owl-carousel"), a = e(this).find(".owl-carousel").attr("data-num");
        //     1 == a ? (o = 1, t = 1) : 2 == a ? (o = 2, t = a - 1) : (o = a - 1, t = a - 2), i.owlCarousel({
        //         rtl: !0,
        //         loop: !0,
        //         autoPlay: 1e4,
        //         navigation: !0,
        //         items: a,
        //         itemsDesktop: [1199, o],
        //         itemsDesktopSmall: [979, t]
        //     })
        // })
    } catch (e) {
    }
    // e(window).load(function () {
    //     e(".hero-slider").owlCarousel({
    //         animateOut: "slideOutDown",
    //         animateIn: "flipInX",
    //         items: 1,
    //         margin: 30,
    //         stagePadding: 30,
    //         smartSpeed: 450,
    //         autoplay:true
    //     })
    // });
    try {
        e(".main-slider").bxSlider({mode: "fade", auto: !0}), e(".bxslider").bxSlider({
            mode: "fade",
            auto: !0
        }), e(".big-bxslider").bxSlider({
            mode: "horizontal",
            auto: !0
        }), e(".slider-call").bxSlider({pagerCustom: "#bx-pager"}), e(".slider-call2").bxSlider({pagerCustom: "#bx-pager2"})
    } catch (e) {
    }
    try {
        e(".zoom").magnificPopup({type: "image", gallery: {enabled: !0}})
    } catch (e) {
    }
    try {
        e(".video-link").magnificPopup({type: "iframe"})
    } catch (e) {
    }
    try {
        e(".log-in-popup").magnificPopup({closeBtnInside: !0})
    } catch (e) {
    }
    try {
        e("#clock").countdown("2016/04/29", function (o) {
            var t = e(this);
            switch (o.type) {
                case"seconds":
                case"minutes":
                case"hours":
                case"days":
                case"daysLeft":
                    t.find("span#" + o.type).html(o.value);
                    break;
                case"finished":
                    t.hide()
            }
        })
    } catch (e) {
    }
    try {
        e(".review-box").appear(function () {
            e(".meter > p").each(function () {
                e(this).data("origWidth", e(this).width()).width(0).animate({width: e(this).data("origWidth")}, 1200)
            })
        })
    } catch (e) {
    }
    e(".register-line a").on("click", function (o) {
        o.preventDefault(), e("form.login-form").slideUp(400), e("form.register-form").slideDown(400)
    }), e("a.lost-password").on("click", function (o) {
        o.preventDefault(), e("form.login-form").slideUp(400), e("form.lost-password-form").slideDown(400)
    }), e(".login-line a").on("click", function () {
        console.log("clicked"), e("form.lost-password-form").slideUp(400), e("form.register-form").slideUp(400), e("form.login-form").slideDown(400)
    });
    var c = "-38.3945495", d = "144.9187974";
    try {
        e("#map").gmap3({
            action: "addMarker",
            marker: {options: {icon: new google.maps.MarkerImage("images/marker.png")}},
            latLng: [c, d],
            map: {center: [c, d], zoom: 10}
        }, {action: "setOptions", args: [{scrollwheel: !1}]})
    } catch (e) {
    }
    !function () {
        var o = document.documentElement, t = !1, i = 300;

        function a() {
            (window.pageYOffset || o.scrollTop) >= i ? e("header").addClass("active") : e("header").removeClass("active"), t = !1
        }

        document.querySelector("header"), window.addEventListener("scroll", function () {
            t || (t = !0, setTimeout(a, 100))
        }, !1)
    }()
});

