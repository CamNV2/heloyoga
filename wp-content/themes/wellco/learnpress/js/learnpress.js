;(function ($) {

    "use strict";

    $(document).ready(function () {

        $('#tab-curriculum .section-header').each(function () {
            $(this).on('click', function () {
	            $(this).parent().find('.section-content').slideToggle(300);
	        });
        });

    });

})(jQuery);
