<?php

// Register Contact Form 7 Widget
if(class_exists('WPCF7')) {
    $cf7 = get_posts('post_type="wpcf7_contact_form"&numberposts=-1');

    $contact_forms = array();
    if ($cf7) {
        foreach ($cf7 as $cform) {
            $contact_forms[$cform->ID] = $cform->post_title;
        }
    } else {
        $contact_forms[esc_html__('No contact forms found', 'wellco')] = 0;
    }


    ct_add_custom_widget(
        array(
            'name' => 'ct_contact_form',
            'title' => esc_html__('Bravis Contact Form', 'wellco'),
            'icon' => 'eicon-form-horizontal',
            'categories' => array(Bravis_Theme_Core::CT_CATEGORY_NAME),
            'scripts' => array(
                'jquery-ui-slider',
                'ct-elementor-js',
            ),
            'params' => array(
                'sections' => array(
                    array(
                        'name' => 'source_section',
                        'label' => esc_html__('Source Settings', 'wellco'),
                        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                        'controls' => array(
                            array(
                                'name' => 'form_id',
                                'label' => esc_html__('Select Form', 'wellco'),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => $contact_forms,
                            ),
                            array(
                                'name' => 'sub_title',
                                'label' => esc_html__('Sub Title', 'wellco' ),
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'condition' => [
                                    'style' => ['n'],
                                ],
                            ),
                            array(
                                'name' => 'title',
                                'label' => esc_html__('Title', 'wellco' ),
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'label_block' => true,
                                'condition' => [
                                    'style' => ['n'],
                                ],
                            ),
                            array(
                                'name' => 'description',
                                'label' => esc_html__('Description', 'wellco' ),
                                'type' => \Elementor\Controls_Manager::TEXTAREA,
                                'rows' => 10,
                                'show_label' => false,
                                'condition' => [
                                    'style' => ['n'],
                                ],
                            ),
                            array(
                                'name' => 'style',
                                'label' => esc_html__('Style', 'wellco' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'style1' => 'Style 1',
                                    'style2' => 'Style 2',
                                    'style3' => 'Style 3',
                                    'style4' => 'Style 4',
                                    'style5' => 'Style 5',
                                    'style6' => 'Style 6',
                                    'style7' => 'Style 7',
                                    'style8' => 'Style 8 (Outline White)',
                                    'style9' => 'Style 9',
                                    'style10' => 'Style 10 (Light)',
                                ],
                                'default' => 'style1',
                            ),
                            array(
                                'name' => 'title_color',
                                'label' => esc_html__('Title Color', 'wellco' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .ct-contact-form .ct-contact-meta h3' => 'color: {{VALUE}};',
                                ],
                                'condition' => [
                                    'style' => ['n'],
                                ],
                            ),
                            array(
                                'name' => 'title_typography',
                                'label' => esc_html__('Title Typography', 'wellco' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .ct-contact-form .ct-contact-meta h3',
                                'condition' => [
                                    'style' => ['n'],
                                ],
                            ),
                            array(
                                'name' => 'desc_color',
                                'label' => esc_html__('Description Color', 'wellco' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .ct-contact-form .ct-contact-meta p' => 'color: {{VALUE}};',
                                ],
                                'condition' => [
                                    'style' => ['n'],
                                ],
                            ),
                            array(
                                'name' => 'desc_typography',
                                'label' => esc_html__('Description Typography', 'wellco' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .ct-contact-form .ct-contact-meta p',
                                'condition' => [
                                    'style' => ['n'],
                                ],
                            ),
                            array(
                                'name' => 'btn_submit_radius',
                                'label' => esc_html__('Button Submit Radius', 'wellco' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .ct-contact-form form .wpcf7-submit' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'btn_submit_typography',
                                'label' => esc_html__('Button Submit Typography', 'wellco' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .ct-contact-form form .wpcf7-submit',
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
}