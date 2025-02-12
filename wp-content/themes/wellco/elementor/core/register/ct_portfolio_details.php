<?php
ct_add_custom_widget(
    array(
        'name' => 'ct_portfolio_details',
        'title' => esc_html__('Bravis Portdolio Details', 'wellco'),
        'icon' => 'eicon-library-upload',
        'categories' => array(Bravis_Theme_Core::CT_CATEGORY_NAME),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'wellco'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'wg_title',
                            'label' => esc_html__('Widget Title', 'wellco' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'portfolio_content',
                            'label' => esc_html__('Content', 'wellco'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'label',
                                    'label' => esc_html__('Label', 'wellco' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'content_type',
                                    'label' => esc_html__('Content Type', 'wellco' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'text' => 'Text',
                                        'date' => 'Date',
                                        'category' => 'Category',
                                        'social' => 'Social Share',
                                    ],
                                    'default' => 'text',
                                ),
                                array(
                                    'name' => 'content',
                                    'label' => esc_html__('Content', 'wellco' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'condition' => [
                                        'content_type' => ['text'],
                                    ],
                                ),
                            ),
                            'title_field' => '{{{ label }}}',
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);