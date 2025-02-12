<?php
// Add custom field to section
if(!function_exists('wellco_custom_section_params')){
    add_filter('ct-custom-section/custom-params', 'wellco_custom_section_params'); 
    function wellco_custom_section_params(){
        return array(
            'sections' => array(
                array(
                    'name'     => 'ct_row_settings',
                    'label'    => esc_html__( 'Bravis Settings', 'wellco' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name'    => 'header_fixed_transparent',
                            'label'   => esc_html__( 'Header Fixed Transparent', 'wellco' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'options' => array(
                                'none'        => esc_html__( 'No', 'wellco' ),
                                'transparent'   => esc_html__( 'Yes', 'wellco' ),
                            ),
                            'prefix_class' => 'ct-header-fixed-',
                            'default'      => 'none',
                        ),

                        array(
                            'name'    => 'col_order',
                            'label'   => esc_html__( 'Column Order ( Screen < 1024px)', 'wellco' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'options' => array(
                                'none'        => esc_html__( 'No', 'wellco' ),
                                'order'   => esc_html__( 'Yes', 'wellco' ),
                            ),
                            'prefix_class' => 'ct-column-',
                            'default'      => 'none',
                        ),

                        array(
                            'name'    => 'row_scroll_fixed',
                            'label'   => esc_html__( 'Row Scroll - Column Fixed', 'wellco' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'options' => array(
                                'none'        => esc_html__( 'No', 'wellco' ),
                                'fixed'   => esc_html__( 'Yes', 'wellco' ),
                            ),
                            'prefix_class' => 'ct-row-scroll-',
                            'default'      => 'none',
                        ),

                    ),
                ),
            ),
        );
    }
}