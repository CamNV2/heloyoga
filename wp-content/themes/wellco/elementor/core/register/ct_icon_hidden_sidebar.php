<?php
// Register Button Widget
ct_add_custom_widget(
    array(
        'name' => 'ct_icon_hidden_sidebar',
        'title' => esc_html__('Bravis Icon Hidden Sidebar', 'wellco' ),
        'icon' => 'eicon-menu-bar',
        'categories' => array( Bravis_Theme_Core::CT_CATEGORY_NAME ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source Settings', 'wellco' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'wg_align',
                            'label' => esc_html__('Alignment', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'flex-start' => [
                                    'title' => esc_html__('Left', 'wellco' ),
                                    'icon' => 'fa fa-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'wellco' ),
                                    'icon' => 'fa fa-align-center',
                                ],
                                'flex-end' => [
                                    'title' => esc_html__('Right', 'wellco' ),
                                    'icon' => 'fa fa-align-right',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .ct-icon-hidden-sidebar' => 'justify-content: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'style1',
                            'options' => [
                                'style1' => esc_html__('Style 1', 'wellco' ),
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-icon-hidden-sidebar .item--inner span, {{WRAPPER}} .ct-icon-hidden-sidebar .item--inner::before, {{WRAPPER}} .ct-icon-hidden-sidebar .item--inner::after' => 'background-color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);