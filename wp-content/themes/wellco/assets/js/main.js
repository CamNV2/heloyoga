;(function ($) {

    "use strict";

    /* ===================
     Page reload
     ===================== */
    var scroll_top;
    var window_height;
    var window_width;
    var scroll_status = '';
    var lastScrollTop = 0;
    $(window).on('load', function () {
        $(".ct-loader").fadeOut("slow");
        window_width = $(window).width();
        wellco_col_offset();
        wellco_header_sticky();
        wellco_scroll_to_top();
        wellco_quantity_icon();
        wellco_footer_fixed();
        wellco_mouse_move();
        setTimeout(function(){
            $('body:not(.elementor-editor-active) .ct-slick-slider').css('min-height', 'auto');
            $('body:not(.elementor-editor-active) .ct-slick-slider').css('overflow', 'visible');
            $('body:not(.elementor-editor-active) .ct-slick-slider').css('opacity', '1');
        }, 100);
    });
    $(window).on('resize', function () {
        window_width = $(window).width();
        wellco_col_offset();
        wellco_footer_fixed();
    });

    $(window).on('scroll', function () {
        scroll_top = $(window).scrollTop();
        window_height = $(window).height();
        window_width = $(window).width();
        if (scroll_top < lastScrollTop) {
            scroll_status = 'up';
        } else {
            scroll_status = 'down';
        }
        lastScrollTop = scroll_top;
        wellco_header_sticky();
        wellco_scroll_to_top();
    });

    $(document).on('click', '.ct-search-popup', function () {
        $('.ct-modal-search').addClass('open').removeClass('remove');
        $('body').addClass('ov-hidden');
        setTimeout(function(){
            $('.ct-modal-search .search-field').focus();
        },1000);
    });

    $(document).ready(function () {

        /* =================
         Menu Dropdown
         =================== */
        var $menu = $('.ct-main-navigation');
        $menu.find('.ct-main-menu li').each(function () {
            var $submenu = $(this).find('> ul.sub-menu');
            if ($submenu.length == 1) {
                $(this).hover(function () {
                    if ($submenu.offset().left + $submenu.width() > $(window).width()) {
                        $submenu.addClass('back');
                    } else if ($submenu.offset().left < 0) {
                        $submenu.addClass('back');
                    }
                }, function () {
                    $submenu.removeClass('back');
                });
            }
        });

        /* =================
         Menu Mobile
         =================== */
        $('.ct-main-navigation li.menu-item-has-children').append('<span class="ct-menu-toggle bravisicon-angle-arrow-down"></span>');
        $('.ct-menu-toggle').on('click', function () {
            $(this).toggleClass('toggle-open');
            $(this).parent().find('> .sub-menu').toggleClass('submenu-open');
            $(this).parent().find('> .sub-menu').slideToggle();
        });

        $(".ct-main-menu li a.is-one-page").on('click', function () {
           $(this).parents('.ct-header-navigation').removeClass('navigation-open');
           $(this).parents('.ct-header-main').find('.btn-nav-mobile').removeClass('opened');
        });
        
        $("#ct-menu-mobile .open-menu").on('click', function () {
            $(this).toggleClass('opened');
            $('.ct-header-navigation').toggleClass('navigation-open');
            $('.ct-menu-overlay').toggleClass('active');
        });

        $(".ct-menu-close").on('click', function () {
            $(this).parents('.ct-header-navigation').removeClass('navigation-open');
            $('.ct-menu-overlay').removeClass('active');
            $('#ct-menu-mobile .open-menu').removeClass('opened');
            $('body').removeClass('ovhidden');
        });

        $(".ct-menu-overlay").on('click', function () {
            $(this).parents('#ct-header').find('.ct-header-navigation').removeClass('navigation-open');
            $(this).removeClass('active');
            $('#ct-menu-mobile .open-menu').removeClass('opened');
            $('body').removeClass('ovhidden');
        });

        if (window_width < 1199) {
            $('.ct-main-menu li.menu-item-has-children > a').on("click", function (e) {
                e.preventDefault();
                $(this).parent().find('> .sub-menu, > .children').toggleClass('submenu-open');
                $(this).parent().find('> .sub-menu, > .children').slideToggle();
                $(this).parent().find('> .ct-menu-toggle').toggleClass('toggle-open');
            });
        }

        /* Main Header */
        $('.ct-header-fixed-transparent').parents('.ct-header-elementor-main').addClass('ct-header-fixed-transparent-wrap');

        /* ===================
         Search Toggle
         ===================== */
        $('.h-btn-form').click(function (e) {
            e.preventDefault();
            $('.ct-modal-contact-form').removeClass('remove').toggleClass('open');
        });

        setTimeout(function(){
            $('.ct-close, .ct-close .ct-icon-close').click(function (e) {
                e.preventDefault();
                $(this).parents('.ct-widget-cart-wrap').removeClass('open');
                $(this).parents('.ct-modal').addClass('remove').removeClass('open');
                $(this).parents('#page').find('.site-overlay').removeClass('open');
                $(this).parents('body').removeClass('ov-hidden');
            });
        }, 300);

        $('.ct-hidden-sidebar-overlay, .ct-widget-cart-overlay').click(function (e) {
            e.preventDefault();
            $(this).parent().toggleClass('open');
            $(this).parents('body').removeClass('ov-hidden');
        });

        /* Video 16:9 */
        $('.entry-video iframe').each(function () {
            var v_width = $(this).width();

            v_width = v_width / (16 / 9);
            $(this).attr('height', v_width + 35);
        });

        /* Video Light Box */
        $('.ct-video-button, .btn-video, .ct-banner-video, .slider-video').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });

        $('.images-light-box').each(function () {
            $(this).magnificPopup({
                delegate: 'a.light-box',
                type: 'image',
                gallery: {
                    enabled: true
                },
                mainClass: 'mfp-fade',
            });
        });
        
        /* ====================
         Scroll To Top
         ====================== */
        $('.scroll-top').click(function () {
            $('html, body').animate({scrollTop: 0}, 800);
            return false;
        });

        /* =================
        Add Class
        =================== */
        $('.wpcf7-select').parent().addClass('wpcf7-menu');
        

        /* =================
         The clicked item should be in center in owl carousel
         =================== */
        var $owl_item = $('.owl-active-click');
        $owl_item.children().each(function (index) {
            $(this).attr('data-position', index);
        });
        $(document).on('click', '.owl-active-click .owl-item > div', function () {
            $owl_item.trigger('to.owl.carousel', $(this).data('position'));
        });

        /* Select */
        $('form:not(.wpforms-form):not(.woocommerce-checkout) select').each(function () {
            $(this).niceSelect();
        });

        /* Search */
        $('.ct-modal-close').on('click', function () {
            $(this).parent().removeClass('open').addClass('remove');
            $(this).parents('body').removeClass('ov-hidden');
        });
        $(document).on('click', function (e) {
            if (e.target.className == 'ct-modal ct-modal-search open')
                $('.ct-modal-search').removeClass('open').addClass('remove');
            if (e.target.className == 'ct-hidden-sidebar open')
                $('.ct-hidden-sidebar').removeClass('open');
        });

        /* Hidden Sidebar */
        $(".h-btn-sidebar").on('click', function (e) {
            e.preventDefault();
            $('.ct-hidden-sidebar-wrap').toggleClass('open');
            $(this).parents('body').addClass('ov-hidden');
        });

        $(".ct-hidden-close").on('click', function (e) {
            e.preventDefault();
            $(this).parents('.ct-hidden-sidebar-wrap').removeClass('open');
            $(this).parents('body').removeClass('ov-hidden');
        });

        /* Cart Sidebar */
        $(".h-btn-cart, .btn-nav-cart").on('click', function (e) {
            e.preventDefault();
            $('.ct-widget-cart-wrap').toggleClass('open');
            $('.ct-header-navigation').removeClass('navigation-open');
            $('#ct-menu-mobile .open-menu').removeClass('opened');
            $('.ct-menu-overlay').removeClass('active');
            $(this).parents('body').addClass('ov-hidden');
        });

        /* Year Copyright */
        var _year_footer = $(".ct-footer-year"),
            _year_clone = _year_footer.parents(".site").find('.ct-year');
        _year_clone.after(_year_footer.clone());
        _year_footer.remove();
        _year_clone.remove();

        /* Comment Reply */
        $('.comment-reply a').append( '<i class="bravisicon-angle-arrow-right"></i>' );

        $('.ct-grid .filter-item').append( '<i></i>' );

        /* Nav Slider */
        setTimeout(function () {
            $('.revslider-initialised').each(function () {
                $(this).find('.ct-slider-nav .slider-nav-right').on('click', function () {
                    $(this).parents('.revslider-initialised').find('.tp-rightarrow').trigger('click');
                });
                $(this).find('.ct-slider-nav .slider-nav-left').on('click', function () {
                    $(this).parents('.revslider-initialised').find('.tp-leftarrow').trigger('click');
                });
            });
            $('.ct-slider-nav').parents('.revslider-initialised').find('.tparrows').addClass('arrow-hidden');
        }, 300);

        /* Same Height */
        $('.same-height').matchHeight();
        $('.ct-counter-layout3 .ct-counter-inner').matchHeight();
        $('.ct-client-grid1 .grid-item').matchHeight();

        /* Demo Bar */
        $(".choose-demo").on('click', function () {
            $(this).parents('.ct-demo-bar').toggleClass('active');
        });

        /* Animate Time */
        $('.animate-time').each(function () {
            var eltime = 100;
            var elt_inner = $(this).children().length;
            var _elt = elt_inner - 1;
            $(this).find('> .grid-item > .wow').each(function (index, obj) {
                $(this).css('animation-delay', eltime + 'ms');
                if (_elt === index) {
                    eltime = 100;
                    _elt = _elt + elt_inner;
                } else {
                    eltime = eltime + 80;
                }
            });
        });

        $('.case-animate-time').each(function () {
            var eltime = 0;
            var elt_inner = $(this).children().length;
            var _elt = elt_inner - 1;
            $(this).find('> .slide-in-container > .wow').each(function (index, obj) {
                $(this).css('transition-delay', eltime + 'ms');
                if (_elt === index) {
                    eltime = 0;
                    _elt = _elt + elt_inner;
                } else {
                    eltime = eltime + 80;
                }
            });
        });

        /* Showcase */
        $('.ct-showcase-link').each(function () {
            $(this).hover(function () {
                $(this).parents('.ct-showcase-image').find('.ct-showcase-link').removeClass('active');
                $(this).addClass('active');
            });
        });

        /* Page Title Scroll Opacity */
        var fadeStart=140,fadeUntil=440,fading = $('.page-title-inner');
        $(window).bind('scroll', function(){
            var offset = $(document).scrollTop()
                ,opacity=0
            ;
            if( offset<=fadeStart ){
                opacity=1;
            }else if( offset<=fadeUntil ){
                opacity=1-offset/fadeUntil;
            }
            fading.css('opacity',opacity);
        });

        /* Mega Menu */
        $('.mega-2-columns').parents('.sub-menu').addClass('ct-mega-2-columns');
        $('.mega-2-columns').parents('li.megamenu').addClass('ct-megamenu-columns');
        $('li.megamenu').parents('.elementor-container').addClass('el-mega-menu');

        /* LearnPress */
        $('#frontend-editor').parents('.site-content').addClass('learnpress-edit');

    });

    function wellco_header_sticky() {
        var offsetTop = $('#ct-header-elementor').outerHeight();
        var offsetTopAnimation = offsetTop + 200;
        if($('#ct-header-elementor').hasClass('is-sticky')) {
            if (scroll_top > offsetTop) {
                $('.ct-header-elementor-sticky').addClass('h-fixed');
                $('.ct-header-mobile .ct-header-main').addClass('h-fixed');
            } else {
                $('.ct-header-elementor-sticky').removeClass('h-fixed');   
                $('.ct-header-mobile .ct-header-main').removeClass('h-fixed');
            }
        }
        $('.ct-header-elementor-sticky').parents('body').addClass('header-sticky');
    }

    /* ====================
     Mouse Move
     ====================== */
    function wellco_mouse_move() {
        if ($('#ct-mouse-move').hasClass('ct-mouse-move')) {
            var follower, init, mouseX, mouseY, positionElement, timer;

            follower = document.getElementById('ct-mouse-move');

            mouseX = (event) => {
                return event.clientX;
            };

            mouseY = (event) => {
                return event.clientY;
            };

            positionElement = (event) => {
                var mouse;
                mouse = {
                    x: mouseX(event),
                    y: mouseY(event)
                };

                follower.style.top = mouse.y + 'px';
                return follower.style.left = mouse.x + 'px';
            };

            timer = false;

            window.onmousemove = init = (event) => {
                var _event;
                _event = event;
                    return timer = setTimeout(() => {
                    return positionElement(_event);
                }, 0);
            };
        }
    }

    /* =================
     Column Offset
     =================== */
    function wellco_col_offset() {
        var w_vc_row_lg = ($('#content').width() - 1140) / 2;
        if (window_width > 1200) {
            $('body:not(.rtl) .col-offset-left.elementor-column > .elementor-widget-wrap').css('padding-left', w_vc_row_lg + 'px');
            $('body:not(.rtl) .col-offset-right.elementor-column > .elementor-widget-wrap').css('padding-right', w_vc_row_lg + 'px');

            $('.rtl .col-offset-left.elementor-column > .elementor-widget-wrap').css('padding-right', w_vc_row_lg + 'px');
            $('.rtl .col-offset-right.elementor-column > .elementor-widget-wrap').css('padding-left', w_vc_row_lg + 'px');
        }
    }

    /* =================
     Footer Fixed
     =================== */
    function wellco_footer_fixed() {
        setTimeout(function(){
            var h_footer = $('.fixed-footer .site-footer-custom').outerHeight() - 1;
            $('.fixed-footer .site-content').css('margin-bottom', h_footer + 'px');
        }, 300);
    }

    /* ====================
     Scroll To Top
     ====================== */
    function wellco_scroll_to_top() {
        if (scroll_top < window_height) {
            $('.scroll-top').addClass('off').removeClass('on');
        }
        if (scroll_top > window_height) {
            $('.scroll-top').addClass('on').removeClass('off');
        }
    }

    /* ====================
     WooComerce Quantity
     ====================== */
    function wellco_quantity_icon() {
        $('#content .quantity').append('<span class="quantity-icon"><i class="quantity-down">-</i><i class="quantity-up">+</i></span>');
        $('.quantity-up').on('click', function () {
            $(this).parents('.quantity').find('input[type="number"]').get(0).stepUp();
            $(this).parents('.woocommerce-cart-form').find('.actions .button').removeAttr('disabled');
        });
        $('.quantity-down').on('click', function () {
            $(this).parents('.quantity').find('input[type="number"]').get(0).stepDown();
            $(this).parents('.woocommerce-cart-form').find('.actions .button').removeAttr('disabled');
        });
        $('.woocommerce-cart-form .actions .button').removeAttr('disabled');
    }

    $( document ).ajaxComplete(function() {
       wellco_quantity_icon();
    });

})(jQuery);
