<?php
// Register Accordion Widget
ct_add_custom_widget(
    array(
        'name' => 'ct_accordion',
        'title' => esc_html__('Bravis Accordion', 'wellco' ),
        'icon' => 'eicon-accordion',
        'categories' => array( Bravis_Theme_Core::CT_CATEGORY_NAME ),
        'scripts' => array(
            'ct-accordion-widget-js'
        ),
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
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                                'style3' => 'Style 3',
                            ],
                            'default' => 'style1',
                        ),
                        array(
                            'name' => 'active_section',
                            'label' => esc_html__('Active section', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'separator' => 'after',
                            'default' => '1',
                        ),
                        array(
                            'name' => 'ct_accordion',
                            'label' => esc_html__('Accordion Items', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'ac_title',
                                    'label' => esc_html__('Title', 'wellco' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'ac_content',
                                    'label' => esc_html__('Content', 'wellco' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                ),
                            ),
                            'title_field' => '{{{ ac_title }}}',
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-accordion .ct-accordion-item .ct-ac-title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'wellco' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-accordion .ct-accordion-item .ct-ac-title',
                        ),
                        array(
                            'name' => 'desc_typography',
                            'label' => esc_html__('Content Typography', 'wellco' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-accordion .ct-accordion-item .ct-ac-content',
                        ),
                        array(
                            'name' => 'content_color',
                            'label' => esc_html__('Content Color', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-accordion .ct-accordion-item .ct-ac-content' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'ct_animate',
                            'label' => esc_html__('Bravis Animate', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => wellco_animate(),
                            'default' => '',
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);