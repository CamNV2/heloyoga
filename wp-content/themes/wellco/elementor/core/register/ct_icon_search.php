<?php
// Register Button Widget
ct_add_custom_widget(
    array(
        'name' => 'ct_icon_search',
        'title' => esc_html__('Bravis Search', 'wellco' ),
        'icon' => 'eicon-search',
        'categories' => array( Bravis_Theme_Core::CT_CATEGORY_NAME ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source Settings', 'wellco' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'style1',
                            'options' => [
                                'style1' => esc_html__('Style 1 (Popup)', 'wellco' ),
                                'style2' => esc_html__('Style 2 (Form)', 'wellco' ),
                                'style3' => esc_html__('Style 3 (Form)', 'wellco' ),
                            ],
                        ),
                        array(
                            'name' => 'text_placeholder',
                            'label' => esc_html__('Text Placeholder', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'style' => ['style2', 'style3'],
                            ],
                        ),
                        array(
                            'name' => 'text_button',
                            'label' => esc_html__('Text Button', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'style' => 'style3',
                            ],
                        ),
                        array(
                            'name' => 'quick_search',
                            'label' => esc_html__('Quick Search', 'wellco'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'content',
                                    'label' => esc_html__('Content', 'wellco'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ content }}}',
                            'condition' => [
                                'style' => 'style3',
                            ],
                        ),
                        array(
                            'name' => 'post_type',
                            'label' => esc_html__('Search Post Type', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '',
                            'options' => [
                                '' => esc_html__('All', 'wellco' ),
                                'page' => esc_html__('Page', 'wellco' ),
                                'post' => esc_html__('Post', 'wellco' ),
                                'lp_course' => esc_html__('Course', 'wellco' ),
                                'portfolio' => esc_html__('Portfolio', 'wellco' ),
                                'product' => esc_html__('Product', 'wellco' ),
                            ],
                        ),
                        array(
                            'name' => 'input_border_radius',
                            'label' => esc_html__('Input Border Radius', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .ct-header-search-form .search-field' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'style' => 'style2',
                            ],
                        ),
                        array(
                            'name' => 'input_bg_color',
                            'label' => esc_html__('Input Box Color', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-header-search-form .search-field' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'style' => 'style2',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);