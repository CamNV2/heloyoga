;(function ($) {

    "use strict";

    $(document).ready(function () {

        if($('.img-hover-scale').length){
            $('.img-hover-scale').parents('.site-content .elementor-top-section').addClass('img-hover-scale-active');
            $('.img-hover-scale').parents('.site-content .elementor-inner-section').addClass('img-hover-scale-active');
            $('.img-hover-scale').parents('.site-footer-custom .elementor-inner-section').addClass('img-hover-scale-active');
            $('.img-hover-scale').each(function () {
                var pxl_maxtilt = $(this).data('maxtilt'),
                    pxl_speedtilt = $(this).data('speedtilt'),
                    pxl_perspectivetilt = $(this).data('perspectivetilt');
                VanillaTilt.init(this, {
                    max: pxl_maxtilt,
                    speed: pxl_speedtilt,
                    perspective: pxl_perspectivetilt
                });
            });
        }
        
    });

})(jQuery);
