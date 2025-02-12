<?php
ct_add_custom_widget(
    array(
        'name' => 'ct_countdown',
        'title' => esc_html__('Bravis Countdown', 'wellco' ),
        'icon' => 'eicon-countdown',
        'categories' => array( Bravis_Theme_Core::CT_CATEGORY_NAME ),
        'scripts' => array(
            'ct-countdown',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'countdown_section',
                    'label' => esc_html__('Content', 'wellco' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'date',
                            'label' => esc_html__('Date', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'description' => esc_html__('Set date count down (Date format: yy/mm/dd)', 'wellco'),
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                            ],
                            'default' => 'style1',
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);