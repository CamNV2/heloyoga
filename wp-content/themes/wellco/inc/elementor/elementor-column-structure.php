<?php
// Add custom field to column
if(!function_exists('wellco_custom_column_params')){
    add_filter('ct-custom-column/custom-params', 'wellco_custom_column_params');
    function wellco_custom_column_params(){
        return array(
            'sections' => array(
                array(
					'name'     => 'custom_section',
					'label'    => esc_html__( 'Bravis Settings', 'wellco' ),
					'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
					'controls' => array(
                        array(
							'name'    => 'col_sticky',
							'label'   => esc_html__( 'Column Sticky', 'wellco' ),
							'type'    => \Elementor\Controls_Manager::SELECT,
							'options' => array(
								'none'           => esc_html__( 'No', 'wellco' ),
								'sticky' => esc_html__( 'Yes', 'wellco' ),
                            ),
                            'default' => 'none',
                            'prefix_class' => 'ct-column-'
                        ),
                        array(
                            'name'    => 'col_offset',
                            'label'   => esc_html__( 'Column Offset', 'wellco' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'options' => array(
                                'none'           => esc_html__( 'No', 'wellco' ),
                                'left' => esc_html__( 'Left', 'wellco' ),
                                'right' => esc_html__( 'Right', 'wellco' ),
                            ),
                            'default' => 'none',
                            'prefix_class' => 'col-offset-'
                        )
                    )
                )
            )
        );
    }
}