( function( $ ) {
    /**
     * @param $scope The Widget wrapper element as a jQuery element
     * @param $ The jQuery alias
     */
    var WidgetCTElemenetorMoveHandler = function( $scope, $ ) {
    	
        setTimeout(function(){
            $('.elementor > .elementor-element').each(function () {
                var _el_particle = $(this).find(".elementor-container .el-move-parents:not(.pxl-inner-section)"),
                    _el_particle_remove = $(this).find(".elementor-widget-wrap .el-move-parents:not(.pxl-inner-section)"),
                    _row_particle = $(this).find("> .elementor-container");
                _row_particle.before(_el_particle.clone());
                _el_particle_remove.remove();
            });

            $('.elementor-inner-section').each(function () {
                var _el_particle = $(this).find(".elementor-container .el-move-parents.pxl-inner-section"),
                    _el_particle_remove = $(this).find(".elementor-widget-wrap .el-move-parents.pxl-inner-section"),
                    _row_particle = $(this).find("> .elementor-container");
                _row_particle.before(_el_particle.clone());
                _el_particle_remove.remove();
            });


            $('.input-filled').each(function () {
                var icon_input = $(this).find(".input-icon"),
                    control_wrap = $(this).find('.wpcf7-form-control');
                control_wrap.before(icon_input.clone());
                icon_input.remove();
            });
        }, 200);

    };

    // Make sure you run this code under Elementor.
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_contact_form.default', WidgetCTElemenetorMoveHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_particle_animate.default', WidgetCTElemenetorMoveHandler );
    } );
} )( jQuery );