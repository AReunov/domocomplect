!(function($) {
    "use strict";

    var page = 2;
    var loading = false;
    var scrollHandling = {
        allow: true,
        reallow: function() {
            scrollHandling.allow = true;
        },
        delay: 400 //(milliseconds) adjust to the highest acceptable value
    };


    $(window).scroll(function() {
        var button = $('.load-more');

        if ($(this).scrollTop() > 100) {
            $('.header').addClass('header-fixed');
        } else {
            $('.header').removeClass('header-fixed');
        }

        if( ! loading && scrollHandling.allow && button.length > 0) {

            scrollHandling.allow = false;
            setTimeout(scrollHandling.reallow, scrollHandling.delay);
            var offset = $(button).offset().top - $(window).scrollTop();
            if( 2000 > offset ) {
                loading = true;
                var data = {
                    action: 'klever_ajax_load_more',
                    page: page,
                    query: app_vars.query,
                };
                $.post(app_vars.ajax_url, data, function(res) {
                    if( res.success) {
                        $('.content_body.nav-autoload .posts')
                            .append( res.data )
                            // .append( button );
                        page = page + 1;
                        loading = false;
                    } else {
                        // console.log(res);
                    }
                }).fail(function(xhr, textStatus, e) {
                    // console.log(xhr.responseText);
                });

            }
        }
    });
    $(document).on('click', '.toggle-menu-mobile, .mobile-nav-overly', function(e) {
        $('body').toggleClass('mobile-nav-active');
        $('.toggle-menu-mobile i').toggleClass('icofont-navigation-menu icofont-close');
        $('.mobile-nav-overly').toggle();
    });

    $(document).ready(function(){
        $('.home-slider').slick({
            arrows: true,
            dots: false,
            adaptiveHeight: true

        });
        $(".table-scroll table").clone(true).appendTo('.table-scroll').addClass('table-clone');

        $('.projects_slider').slick({
            arrows: false,
            dots: true
        });

        $(".wpcf7-tel").mask("+38 (999) 999-99-99");

        // autoload
        $('.content_body.nav-autoload').append( '<span class="load-more"></span>' );
    });

    jQuery(window).load(function ($) {
        jQuery('#container-thumbs').masonry({
            percentPosition: true,
            itemSelector: '.item'
        }).imagesLoaded(function(){
            jQuery('#container-thumbs').masonry('reloadItems');
        });
    });


})(jQuery);
