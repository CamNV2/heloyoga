<?php
ct_add_custom_widget(
    array(
        'name' => 'ct_pagination_single',
        'title' => esc_html__('Bravis Pagination Single', 'wellco'),
        'icon' => 'eicon-apps',
        'categories' => array(Bravis_Theme_Core::CT_CATEGORY_NAME),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'wellco'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'archive_link',
                            'label' => esc_html__('Archive Link', 'wellco'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'label_block' => true,
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);