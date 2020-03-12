(function ($) {
    'use strict';


    //======================
    // Preloder
    //======================
    $(window).on('load', function () {
        $('#preloader').fadeOut();
    });

    //======================
    // Clients logo
    //======================
    $('.partners-logo').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        responsive: {
            0: {
                items: 2
            },
            480: {
                items: 3
            },
            992: {
                items: 4
            }
        }
    })



    //======================
    // Feedback 
    //======================
    function feedbackfunc() {
        var feedCaro = $('.test-caro');
        $(feedCaro).owlCarousel({
            loop: true,
            center: true,
            margin: 30,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                992: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
        var owl = $(feedCaro);
        owl.owlCarousel();
        $('.owl-next').on('click', function () {
            owl.trigger('next.owl.carousel');
        });
        $('.owl-prev').on('click', function () {
            owl.trigger('prev.owl.carousel', [300]);
        });
    }
    feedbackfunc();

    //======================
    // Mobile menu 
    //======================
    $('#mobile-menu-toggler').on('click', function (e) {
        e.preventDefault();
        $('.navbar-nav').slideToggle();
    })
    $('.has-menu-child').append('<i class="menu-dropdown ti-angle-down"></i>');

    if ($(window).width() <= 991) {
        $('.menu-dropdown').on('click', function () {
            $(this).prev().slideToggle();
            $(this).toggleClass('ti-angle-down ti-angle-up')
        })
    }


    //======================
    // Banner Animation
    //======================
    $(window).on('load', function () {
        animateDiv('.el1');
        animateDiv('.el2');
        animateDiv('.el3');
        animateDiv('.el4');
        animateDiv('.el5');
        animateDiv('.el6');
    });

    function makeNewPosition() {
        // Get viewport dimensions (remove the dimension of the div)
        var h = $(window).height() - 50;
        var w = $(window).width() - 50;
        var nh = Math.floor(Math.random() * h);
        var nw = Math.floor(Math.random() * w);
        return [nh, nw];
    }

    function animateDiv(myclass) {
        var newq = makeNewPosition();
        $(myclass).animate({
            top: newq[0],
            left: newq[1]
        }, 10000, function () {
            animateDiv(myclass);
        });

    };


    //======================
    // Counter 
    //======================
    $('.stat-count').onScreen({
        container: window,
        direction: 'vertical',
        doIn: function () {
            $('.stat-count').each(function () {
                var $this = $(this),
                    countTo = $this.attr('data-count');
                $({
                    countNum: $this.text()
                }).animate({
                    countNum: countTo
                }, {
                    duration: 1000,
                    easing: 'linear',
                    step: function () {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function () {
                        $this.text(this.countNum);
                        //alert('finished');
                    }
                });
            });

        },
        doOut: function () {
            // console.log('Out')
            // Do something to the matched elements as they get off scren
        }
    });


    //======================
    // About Background animation 
    //======================
    $('.about-img-group').mousemove(function (e) {
        var x = -(e.pageX + this.offsetLeft) / 20;
        var y = -(e.pageY + this.offsetTop) / 30;
        $(".about-img-bg").css('margin-left', x + 'px');
        $(".about-img-bg").css('margin-top', y + 'px');
    });


    //======================
    // Sticky Header 
    //======================
    var navHeight = window.innerHeight - 136;
    var topNavHeight = 0;
    var nav = $('.header');

    $(window).scroll(function () {
        if ($(this).scrollTop() > topNavHeight) {
            nav.addClass("sticky");
        } else {
            nav.removeClass("sticky");
        }

    });


    //======================
    // gallery 
    //======================
    $(".gallery-caro").owlCarousel({
        autoplay: true,
        loop: true,
        nav: true,
        dots: false,
        items: true
    });

})(jQuery);