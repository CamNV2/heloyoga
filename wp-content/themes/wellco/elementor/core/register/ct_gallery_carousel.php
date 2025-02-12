<?php
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );

// Register Gallery List Widget
ct_add_custom_widget(
    array(
        'name' => 'ct_gallery_carousel',
        'title' => esc_html__('Bravis Gallery Carousel', 'wellco'),
        'icon' => 'eicon-image-before-after',
        'categories' => array(Bravis_Theme_Core::CT_CATEGORY_NAME),
        'scripts' => array(
            'jquery-slick',
            'ct-post-carousel-widget-js',
        ),
        'params' => array(
            'sections' => array(        
                array(
                    'name' => 'section_gallery',
                    'label' => esc_html__('Gallery', 'wellco'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'image',
                            'label' => esc_html__('Image', 'wellco'),
                            'type' => \Elementor\Controls_Manager::GALLERY,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_carousel_settings',
                    'label' => esc_html__('Carousel Settings', 'wellco'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns XS Devices', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => esc_html__('1', 'wellco' ),
                                '2' => esc_html__('2', 'wellco' ),
                                '3' => esc_html__('3', 'wellco' ),
                                '4' => esc_html__('4', 'wellco' ),
                                '6' => esc_html__('6', 'wellco' ),
                            ],
                        ),
                        array(
                            'name' => 'col_sm',
                            'label' => esc_html__('Columns SM Devices', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => esc_html__('1', 'wellco' ),
                                '2' => esc_html__('2', 'wellco' ),
                                '3' => esc_html__('3', 'wellco' ),
                                '4' => esc_html__('4', 'wellco' ),
                                '6' => esc_html__('6', 'wellco' ),
                            ],
                        ),
                        array(
                            'name' => 'col_md',
                            'label' => esc_html__('Columns MD Devices', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => esc_html__('1', 'wellco' ),
                                '2' => esc_html__('2', 'wellco' ),
                                '3' => esc_html__('3', 'wellco' ),
                                '4' => esc_html__('4', 'wellco' ),
                                '6' => esc_html__('6', 'wellco' ),
                            ],
                        ),
                        array(
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns LG Devices', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => esc_html__('1', 'wellco' ),
                                '2' => esc_html__('2', 'wellco' ),
                                '3' => esc_html__('3', 'wellco' ),
                                '4' => esc_html__('4', 'wellco' ),
                                '6' => esc_html__('6', 'wellco' ),
                            ],
                        ),
                        array(
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns XL Devices', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => esc_html__('1', 'wellco' ),
                                '2' => esc_html__('2', 'wellco' ),
                                '3' => esc_html__('3', 'wellco' ),
                                '4' => esc_html__('4', 'wellco' ),
                                '6' => esc_html__('6', 'wellco' ),
                            ],
                        ),

                        array(
                            'name' => 'slides_to_scroll',
                            'label' => esc_html__('Slides to scroll', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => esc_html__('1', 'wellco' ),
                                '2' => esc_html__('2', 'wellco' ),
                                '3' => esc_html__('3', 'wellco' ),
                                '4' => esc_html__('4', 'wellco' ),
                                '6' => esc_html__('6', 'wellco' ),
                            ],
                        ),
                        array(
                            'name' => 'arrows',
                            'label' => esc_html__('Show Arrows', 'wellco'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'dots',
                            'label' => esc_html__('Show Dots', 'wellco'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause on Hover', 'wellco'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'autoplay',
                            'label' => esc_html__('Autoplay', 'wellco'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'autoplay_speed',
                            'label' => esc_html__('Autoplay Speed', 'wellco'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 5000,
                            'condition' => [
                                'autoplay' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'infinite',
                            'label' => esc_html__('Infinite Loop', 'wellco'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'speed',
                            'label' => esc_html__('Animation Speed', 'wellco'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 500,
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);