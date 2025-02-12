<?php
// Register Icon Box Widget
ct_add_custom_widget(
    array(
        'name' => 'ct_user',
        'title' => esc_html__('Bravis User', 'wellco' ),
        'icon' => 'eicon-user-circle-o',
        'categories' => array( Bravis_Theme_Core::CT_CATEGORY_NAME ),
        'scripts' => array(),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'wellco' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'user_type',
                            'label' => esc_html__('User Type', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'sign-in' => 'Sign In',
                                'sign-up' => 'Sign Up',
                            ],
                            'default' => 'sign-in',
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'btn_label',
                            'label' => esc_html__('Button Label', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'btn_text',
                            'label' => esc_html__('Button Text', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'btn_link',
                            'label' => esc_html__('Button Link', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                        array(
                            'name' => 'footer_text',
                            'label' => esc_html__('Footer Text', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'footer_link',
                            'label' => esc_html__('Footer Link', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                        array(
                            'name' => 'footer_link_color',
                            'label' => esc_html__('Footer Link Color', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-user .ct-user-footer a' => 'color: {{VALUE}};',
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