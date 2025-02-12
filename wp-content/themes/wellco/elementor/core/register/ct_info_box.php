<?php
ct_add_custom_widget(
    array(
        'name' => 'ct_info_box',
        'title' => esc_html__('Bravis Info Box', 'wellco'),
        'icon' => 'eicon-info-circle-o',
        'categories' => array(Bravis_Theme_Core::CT_CATEGORY_NAME),
        'scripts' => array(
            'ct-inline-css-js',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_contact_info',
                    'label' => esc_html__('Content', 'wellco'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'ct_icon',
                            'label' => esc_html__('Icon', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'wellco'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-info-box .ct-info-holder .ct-info-title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'desc',
                            'label' => esc_html__('Description', 'wellco'),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                        ),
                        array(
                            'name' => 'desc_color',
                            'label' => esc_html__('Description Color', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-info-box .ct-info-desc' => 'color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'section_animate',
                    'label' => esc_html__('Animate', 'wellco'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'ct_animate',
                            'label' => esc_html__('Bravis Animate', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => wellco_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'ct_animate_delay',
                            'label' => esc_html__('Animate Delay', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                            'description' => 'Enter number. Default 0ms',
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);