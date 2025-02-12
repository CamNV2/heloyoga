<?php
// Register Video Player Widget
ct_add_custom_widget(
    array(
        'name' => 'ct_particle_animate',
        'title' => esc_html__('Bravis Particle Animate', 'wellco' ),
        'icon' => 'eicon-barcode',
        'categories' => array( Bravis_Theme_Core::CT_CATEGORY_NAME ),
        'scripts' => array(
            'ct-elementor-js',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'content_section',
                    'label' => esc_html__('Source Settings', 'wellco'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'content_list',
                            'label' => esc_html__('Images', 'wellco'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'controls' => array(
                                array(
                                    'name' => 'particle',
                                    'label' => esc_html__( 'Particle', 'wellco' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'particle_animate',
                                    'label' => esc_html__('Animate', 'wellco' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'animate-none' => 'None',
                                        'shape-parallax' => 'Parallax',
                                        'shape-animate1' => 'Animate 1',
                                        'shape-animate2' => 'Animate 2',
                                        'shape-animate3' => 'Animate 3',
                                        'shape-animate4' => 'Animate 4',
                                        'shape-animate5' => 'Animate 5',
                                    ],
                                    'default' => 'animate-none',
                                ),
                                array(
                                    'name' => 'type_position',
                                    'label' => esc_html__('Position', 'wellco' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'top-left' => 'Top Left',
                                        'bottom-left' => 'Bottom Left',
                                        'top-right' => 'Top Right',
                                        'bottom-right' => 'Bottom Right',
                                    ],
                                    'default' => 'top-left',
                                ),
                                array(
                                    'name' => 'top_positioon',
                                    'label' => esc_html__('Top Position', 'wellco' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px', '%' ],
                                    'default' => [
                                        'size' => 0,
                                        'unit' => '%',
                                    ],
                                    'range' => [
                                        '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                        ],
                                    ],
                                    'condition' => [
                                        'type_position' => ['top-left', 'top-right'],
                                    ],
                                ),
                                array(
                                    'name' => 'left_positioon',
                                    'label' => esc_html__('Left Position', 'wellco' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px', '%' ],
                                    'default' => [
                                        'size' => 0,
                                        'unit' => '%',
                                    ],
                                    'range' => [
                                        '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                        ],
                                    ],
                                    'condition' => [
                                        'type_position' => ['top-left','bottom-left'],
                                    ],
                                ),
                                array(
                                    'name' => 'bottom_positioon',
                                    'label' => esc_html__('Bottom Position', 'wellco' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px', '%' ],
                                    'default' => [
                                        'size' => 0,
                                        'unit' => '%',
                                    ],
                                    'range' => [
                                        '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                        ],
                                    ],
                                    'condition' => [
                                        'type_position' => ['bottom-left','bottom-right'],
                                    ],
                                ),
                                array(
                                    'name' => 'right_positioon',
                                    'label' => esc_html__('Right Position', 'wellco' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px', '%' ],
                                    'default' => [
                                        'size' => 0,
                                        'unit' => '%',
                                    ],
                                    'range' => [
                                        '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                        ],
                                    ],
                                    'condition' => [
                                        'type_position' => ['top-right', 'bottom-right'],
                                    ],
                                ),
                                array(
                                    'name' => 'img_max_height',
                                    'label' => esc_html__('Image Max Height', 'wellco' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px' ],
                                    'default' => [
                                        'unit' => 'px',
                                    ],
                                    'range' => [
                                        '%' => [
                                            'min' => 0,
                                            'max' => 1000,
                                        ],
                                    ],
                                ),
                            ),
                        ),
                        array(
                            'name' => 'particle_inner_section',
                            'label' => esc_html__('Stretch Section', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'pxl-wrap-section' => 'Wrap',
                                'pxl-inner-section' => 'Inner',
                            ],
                            'default' => 'pxl-wrap-section',
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);