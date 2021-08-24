(function ($) {
    'use strict';

    // ===== Main Menu
    function mainMenu() {
        const navbarToggler = $('.nav-toggler'),
            navMenu = $('.nav-menu'),
            mobilePanel = $('.mobile-menu-panel'),
            mobilePanelMenu = $('.mobile-menu-panel .panel-menu'),
            navClose = $('.panel-close');

        // Navbar toggler
        navbarToggler.on('click', function (e) {
            e.preventDefault();

            navbarToggler.toggleClass('panel-opened');
            mobilePanel.toggleClass('panel-opened');
        });

        // Close icon
        navClose.on('click', function (e) {
            e.preventDefault();

            mobilePanel.removeClass('panel-opened');
            navbarToggler.removeClass('panel-opened');
        });

        // Adds toggle button to li items that have children
        navMenu.find('li a').each(function () {
            if ($(this).next().length > 0) {
                $(this).append('<span class="dd-trigger"><i class="far fa-angle-down"></i></span>');
            }
        });

        mobilePanelMenu.find('li a').each(function () {
            if ($(this).next().length > 0) {
                $(this).append('<span class="dd-trigger"><i class="far fa-angle-down"></i></span>');
            }
        });

        // Expands the dropdown menu on each click
        mobilePanelMenu.find('.dd-trigger').on('click', function (e) {
            e.preventDefault();
            $(this).parent().parent('li').children('ul.submenu').stop(true, true).slideToggle(350);
            $(this).toggleClass('submenu-opened')
        });
    };

    // ===== Sticky Header
    function stickyHeader() {
        let scroll_top = $(window).scrollTop(),
            siteHeader = $('.site-header'),
            offsetTop = siteHeader.outerHeight(),
            offsetTopAnimation = offsetTop + 150;

        if (siteHeader.hasClass('sticky-header')) {
            if (scroll_top > offsetTopAnimation) {
                siteHeader.addClass('sticky-on');
            } else {
                siteHeader.removeClass('sticky-on');
            }
        }
    }

    // ===== Header Breakpoint Resize
    function headerBreakpointResize() {
        // Breakpoint Check
        const windowWidth = $(window).innerWidth(),
            navContainer = $('.navbar-wrapper'),
            breakpoint = 992;

        if (windowWidth <= breakpoint) {
            navContainer.addClass('breakpoint-on');
        } else {
            navContainer.removeClass('breakpoint-on');
        }

        // Header Height
        const siteHeader = $('.site-header');
        if (!siteHeader.hasClass('transparent-header')) {
            let newHeight = 0;
            siteHeader.removeAttr('style');
            newHeight = siteHeader.outerHeight();
            siteHeader.height(newHeight);
        }
    }

    // ===== Counter Up
    function counterUp() {
        $('.counter-box').on('inview', function (event, isInView) {
            if (isInView) {
                $(this).find('.count').each(function () {
                    var $this = $(this);
                    $({
                        Counter: 0
                    }).animate({
                        Counter: $this.text()
                    }, {
                        duration: 3000,
                        easing: 'swing',
                        step: function () {
                            $this.text(Math.ceil(this.Counter));
                        },
                    });
                });
            }
        });
    }

    // ===== Project Progress Bar
    function projectProgressBar() {
        $('.project-item').on('inview', function (event, isInView) {
            if (isInView) {
                $.each($('.stats-bar'), function () {
                    var dataCount = $(this).attr('data-value'),
                        progress = $(this).find('.bar-line');

                    // progress css
                    progress.css('width', dataCount + '%');
                });
            }
        });
    }

    // ===== Project Slider One
    function projectSliderOne() {
        $('.project-slider-one').slick({
            infinite: true,
            dots: false,
            arrows: false,
            speed: 500,
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 5000,
            responsive: [
                {
                    breakpoint: 1800,
                    settings: {
                        slidesToShow: 4,
                    }
                },
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 650,
                    settings: {
                        slidesToShow: 1,
                    }
                },
            ]
        });
    }

    // ===== Project Slider Two
    function projectSliderTwo() {
        $('.project-slider-two').slick({
            infinite: true,
            dots: false,
            arrows: true,
            prevArrow: '<button type="button" class="slick-arrow slick-prev"><i class="far fa-angle-left"></i></button>',
            nextArrow: '<button type="button" class="slick-arrow slick-next"><i class="far fa-angle-right"></i></button>',
            speed: 500,
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 5000,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        arrows: false,
                    }
                }
            ]
        });
    }

    // ===== Team Slider
    function teamSliderOne() {
        $('.team-slider').slick({
            infinite: true,
            dots: false,
            arrows: false,
            speed: 500,
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 5000,
            responsive: [
                {
                    breakpoint: 1750,
                    settings: {
                        slidesToShow: 4,
                    }
                },
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 620,
                    settings: {
                        slidesToShow: 1,
                    }
                },
            ]
        });
    }

    // ===== Active Tooltip
    function activeTooltip() {
        $('[data-tooltip="true"]').tooltip();
    }

    // ===== Image Block slider
    function imgBlockSlider() {
        $('.image-text-block-slider').slick({
            infinite: true,
            dots: false,
            arrows: true,
            prevArrow: '<button type="button" class="slick-arrow slick-prev"><i class="far fa-angle-left"></i></button>',
            nextArrow: '<button type="button" class="slick-arrow slick-next"><i class="far fa-angle-right"></i></button>',
            speed: 600,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 5000,
            responsive: [
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        arrows: false,
                    }
                }
            ]
        });
    }

    // ==== Preloader
    function preloader() {
        if ($('#preloader').length) {
            $('#preloader').fadeOut('slow');
        }
    }

    /*---------------------
    === Document Ready  ===
    ----------------------*/
    $(document).ready(function () {
        mainMenu();
        headerBreakpointResize();
        counterUp();
        projectProgressBar();
        projectSliderOne();
        projectSliderTwo();
        teamSliderOne();
        activeTooltip();
        imgBlockSlider();
    });

    /*--------------------
    === Window Resize  ===
    --------------------*/
    $(window).on('resize', function () {
        headerBreakpointResize();
    });

    /*--------------------
    === Window Scroll  ===
    ----------------------*/
    $(window).on('scroll', function () {
        stickyHeader();
    });

    /*------------------
    === Window Load  ===
    --------------------*/
    $(window).on('load', function () {
        preloader();
        new WOW().init();
    });
})(jQuery);