<?php
/**
 * Get List Menu.
 * @return array
 */
function wellco_get_nav_menu(){

    $menus = array(
        '' => esc_html__('Default', 'wellco')
    );

    $obj_menus = wp_get_nav_menus();

    foreach ($obj_menus as $obj_menu){
        $menus[$obj_menu->term_id] = $obj_menu->name;
    }

    return $menus;
}

function wellco_get_nav_menu_slug(){

    $menus = array(
        '' => esc_html__('Default', 'wellco')
    );

    $obj_menus = wp_get_nav_menus();

    foreach ($obj_menus as $obj_menu){
        $menus[$obj_menu->slug] = $obj_menu->name;
    }

    return $menus;
}

add_action( 'ct_post_metabox_register', 'wellco_page_options_register' );

function wellco_page_options_register( $metabox ) {

	if ( ! $metabox->isset_args( 'post' ) ) {
		$metabox->set_args( 'post', array(
			'opt_name'            => 'post_option',
			'display_name'        => esc_html__( 'Post Settings', 'wellco' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'product' ) ) {
		$metabox->set_args( 'product', array(
			'opt_name'            => 'product_option',
			'display_name'        => esc_html__( 'Product Settings', 'wellco' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'page' ) ) {
		$metabox->set_args( 'page', array(
			'opt_name'            => wellco_get_page_opt_name(),
			'display_name'        => esc_html__( 'Page Settings', 'wellco' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'ct_pf_audio' ) ) {
		$metabox->set_args( 'ct_pf_audio', array(
			'opt_name'     => 'post_format_audio',
			'display_name' => esc_html__( 'Audio', 'wellco' ),
			'class'        => 'fully-expanded',
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'ct_pf_link' ) ) {
		$metabox->set_args( 'ct_pf_link', array(
			'opt_name'     => 'post_format_link',
			'display_name' => esc_html__( 'Link', 'wellco' )
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'ct_pf_quote' ) ) {
		$metabox->set_args( 'ct_pf_quote', array(
			'opt_name'     => 'post_format_quote',
			'display_name' => esc_html__( 'Quote', 'wellco' )
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'ct_pf_video' ) ) {
		$metabox->set_args( 'ct_pf_video', array(
			'opt_name'     => 'post_format_video',
			'display_name' => esc_html__( 'Video', 'wellco' ),
			'class'        => 'fully-expanded',
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'ct_pf_gallery' ) ) {
		$metabox->set_args( 'ct_pf_gallery', array(
			'opt_name'     => 'post_format_gallery',
			'display_name' => esc_html__( 'Gallery', 'wellco' ),
			'class'        => 'fully-expanded',
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	/* Extra Post Type */

	if ( ! $metabox->isset_args( 'service' ) ) {
		$metabox->set_args( 'service', array(
			'opt_name'            => 'service_option',
			'display_name'        => esc_html__( 'Service Settings', 'wellco' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'portfolio' ) ) {
		$metabox->set_args( 'portfolio', array(
			'opt_name'            => 'portfolio_option',
			'display_name'        => esc_html__( 'Portfolio Settings', 'wellco' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	/**
	 * Config post meta options
	 *
	 */
	$metabox->add_section( 'post', array(
		'title'  => esc_html__( 'Post Settings', 'wellco' ),
		'icon'   => 'el el-refresh',
		'fields' => array(
			array(
				'id'             => 'post_content_padding',
				'type'           => 'spacing',
				'output'         => array( '.single-post #content' ),
				'right'          => false,
				'left'           => false,
				'mode'           => 'padding',
				'units'          => array( 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Content Padding', 'wellco' ),
				'subtitle'     => esc_html__( 'Content site paddings.', 'wellco' ),
				'desc'           => esc_html__( 'Default: Theme Option.', 'wellco' ),
				'default'        => array(
					'padding-top'    => '',
					'padding-bottom' => '',
					'units'          => 'px',
				)
			),
			array(
				'id'      => 'show_sidebar_post',
				'type'    => 'switch',
				'title'   => esc_html__( 'Custom Sidebar', 'wellco' ),
				'default' => false,
				'indent'  => true
			),
			array(
				'id'           => 'sidebar_post_pos',
				'type'         => 'button_set',
				'title'        => esc_html__( 'Sidebar Position', 'wellco' ),
				'options'      => array(
					'left'  => esc_html__('Left', 'wellco'),
	                'right' => esc_html__('Right', 'wellco'),
	                'none'  => esc_html__('Disabled', 'wellco')
				),
				'default'      => 'right',
				'required'     => array( 0 => 'show_sidebar_post', 1 => '=', 2 => '1' ),
				'force_output' => true
			),
		)
	) );

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Header', 'wellco' ),
		'desc'   => esc_html__( 'Header settings for the page.', 'wellco' ),
		'icon'   => 'el-icon-website',
		'fields' => array(
			array(
				'id'      => 'custom_header',
				'type'    => 'switch',
				'title'   => esc_html__( 'Custom Layout', 'wellco' ),
				'default' => false,
				'indent'  => true
			),
			array(
	            'id'          => 'header_layout',
	            'type'        => 'select',
	            'title'       => esc_html__('Main Header Layout', 'wellco'),
	            'desc'        => sprintf(esc_html__('To use this Option please %sClick Here%s to add your header layout first.','wellco'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=header' ) ) . '">','</a>'),
	            'options'     => wellco_list_post('header'),
	            'default'     => '',
	            'required'     => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
				'force_output' => true
	        ),
	        array(
	            'id'          => 'header_layout_sticky',
	            'type'        => 'select',
	            'title'       => esc_html__('Sticky Header Layout', 'wellco'),
	            'desc'        => sprintf(esc_html__('To use this Option please %sClick Here%s to add your header layout first.','wellco'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=header' ) ) . '">','</a>'),
	            'options'     => wellco_list_post('header'),
	            'default'     => '',
	            'required'     => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
				'force_output' => true
	        ),
	        array(
                'id'       => 'h_custom_main_menu',
                'type'     => 'select',
                'title'    => esc_html__( 'Custom Main Menu', 'wellco' ),
                'options'  => wellco_get_nav_menu_slug(),
                'default' => '',
                'required'     => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
				'force_output' => true
            ),
            array(
	            'id'       => 'p_logo_m',
	            'type'     => 'media',
	            'title'    => esc_html__('Logo Mobile', 'wellco'),
	            'subtitle' => esc_html__('Screenshot < 1200px', 'wellco'),
	            'default' => '',
	            'required'     => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
				'force_output' => true
	        ),
		)
	) );

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Page Title', 'wellco' ),
		'icon'   => 'el el-indent-left',
		'fields' => array(
			array(
				'id'           => 'custom_pagetitle',
				'type'         => 'button_set',
				'title'        => esc_html__( 'Page Title', 'wellco' ),
				'options'      => array(
					'themeoption'  => esc_html__( 'Theme Option', 'wellco' ),
					'show'  => esc_html__( 'Custom', 'wellco' ),
					'hide'  => esc_html__( 'Hide', 'wellco' ),
				),
				'default'      => 'themeoption',
			),
			array(
				'id'           => 'custom_title',
				'type'         => 'textarea',
				'title'        => esc_html__( 'Title', 'wellco' ),
				'subtitle'     => esc_html__( 'Use custom title for this page. The default title will be used on document title.', 'wellco' ),
				'required'     => array( 0 => 'custom_pagetitle', 1 => '=', 2 => 'show' ),
				'force_output' => true
			),
			array(
	            'id'       => 'ptitle_bg',
	            'type'     => 'background',
	            'background-color'     => true,
	            'background-repeat'     => false,
	            'background-size'     => false,
	            'background-attachment'     => false,
	            'background-position'     => false,
	            'transparent'     => false,
	            'title'    => esc_html__('Background', 'wellco'),
	            'subtitle' => esc_html__('Page title background image.', 'wellco'),
	            'required'     => array( 0 => 'custom_pagetitle', 1 => '=', 2 => 'show' ),
				'force_output' => true
	        ),
	        array(
				'id'       => 'ptitle_bg_overlay',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Background Color Overlay', 'wellco' ),
				'subtitle' => esc_html__( 'Page title background color overlay.', 'wellco' ),
				'output'   => array( 'background-color' => 'body #pagetitle:before' ),
				'required'     => array( 0 => 'custom_pagetitle', 1 => '=', 2 => 'show' ),
				'force_output' => true
			),
	        array(
	            'id'             => 'ptitle_padding',
	            'type'           => 'spacing',
	            'output'         => array('.site #pagetitle.page-title'),
	            'right'   => false,
	            'left'    => false,
	            'mode'           => 'padding',
	            'units'          => array('px'),
	            'units_extended' => 'false',
	            'title'          => esc_html__('Page Title Padding', 'wellco'),
	            'default'            => array(
	                'padding-top'   => '',
	                'padding-bottom'   => '',
	                'units'          => 'px',
	            ),
	            'required'     => array( 0 => 'custom_pagetitle', 1 => '=', 2 => 'show' ),
				'force_output' => true
	        ),
		)
	) );

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Content', 'wellco' ),
		'desc'   => esc_html__( 'Settings for content area.', 'wellco' ),
		'icon'   => 'el-icon-pencil',
		'fields' => array(
	        array(
				'id'           => 'loading_page',
				'type'         => 'button_set',
				'title'        => esc_html__( 'Loading', 'wellco' ),
				'options'      => array(
					'themeoption'  => esc_html__( 'Theme Option', 'wellco' ),
					'custom' => esc_html__( 'Cuttom', 'wellco' ),
				),
				'default'      => 'themeoption',
			),
			array(
	            'id'       => 'loading_type',
	            'type'     => 'select',
	            'title'    => esc_html__('Loading Type', 'wellco'),
	            'options'  => array(
	                'style1'  => esc_html__('Style 1', 'wellco'),
	                'style2'  => esc_html__('Style 2', 'wellco'),
	                'style3'  => esc_html__('Style 3', 'wellco'),
	                'style4'  => esc_html__('Style 4', 'wellco'),
	                'style5'  => esc_html__('Style 5', 'wellco'),
	                'style6'  => esc_html__('Style 6', 'wellco'),
	                'style7'  => esc_html__('Style 7', 'wellco'),
	                'style8'  => esc_html__('Style 8', 'wellco'),
	                'style9'  => esc_html__('Style 9', 'wellco'),
	                'style10'  => esc_html__('Style 10', 'wellco'),
	                'style11'  => esc_html__('Style 11', 'wellco'),
	                'style12'  => esc_html__('Style 12', 'wellco'),
	            ),
	            'default'  => 'style1',
	            'required'     => array( 0 => 'loading_page', 1 => '=', 2 => 'custom' ),
				'force_output' => true
	        ),
			array(
				'id'       => 'content_bg_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Background Color', 'wellco' ),
				'subtitle' => esc_html__( 'Content background color.', 'wellco' ),
				'output'   => array( 'background-color' => 'body .site-content' )
			),
			array(
				'id'             => 'content_padding',
				'type'           => 'spacing',
				'output'         => array( '#content' ),
				'right'          => false,
				'left'           => false,
				'mode'           => 'padding',
				'units'          => array( 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Content Padding', 'wellco' ),
				'desc'           => esc_html__( 'Default: Theme Option.', 'wellco' ),
				'default'        => array(
					'padding-top'    => '',
					'padding-bottom' => '',
					'units'          => 'px',
				)
			),
			array(
				'id'      => 'show_sidebar_page',
				'type'    => 'switch',
				'title'   => esc_html__( 'Show Sidebar', 'wellco' ),
				'default' => false,
				'indent'  => true
			),
			array(
				'id'           => 'sidebar_page_pos',
				'type'         => 'button_set',
				'title'        => esc_html__( 'Sidebar Position', 'wellco' ),
				'options'      => array(
					'left'  => esc_html__( 'Left', 'wellco' ),
					'right' => esc_html__( 'Right', 'wellco' ),
				),
				'default'      => 'right',
				'required'     => array( 0 => 'show_sidebar_page', 1 => '=', 2 => '1' ),
				'force_output' => true
			),
		)
	) );

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Footer', 'wellco' ),
		'desc'   => esc_html__( 'Settings for footer area.', 'wellco' ),
		'icon'   => 'el el-website',
		'fields' => array(
			array(
				'id'      => 'custom_footer',
				'type'    => 'switch',
				'title'   => esc_html__( 'Custom Layout', 'wellco' ),
				'default' => false,
				'indent'  => true
			),
	        array(
	            'id'          => 'footer_layout_custom',
	            'type'        => 'select',
	            'title'       => esc_html__('Layout', 'wellco'),
	            'desc'        => sprintf(esc_html__('To use this Option please %sClick Here%s to add your custom footer layout first.','wellco'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=footer' ) ) . '">','</a>'),
	            'options'     =>wellco_list_post('footer'),
	            'default'     => '',
	            'required' => array( 0 => 'custom_footer', 1 => 'equals', 2 => '1' ),
	            'force_output' => true
	        ),
	        array(
	            'id'       => 'footer_bg_color',
	            'type'     => 'color_rgba',
	            'title'    => esc_html__( 'Background Color', 'wellco' ),
	            'subtitle' => esc_html__( 'Page title background color overlay.', 'wellco' ),
	            'output'   => array( 'background-color' => '.site-footer-custom' ),
	            'force_output' => true,
	        ),
	        array(
				'id'           => 'p_fixed_footer',
				'type'         => 'button_set',
				'title'        => esc_html__( 'Fixed Footer', 'wellco' ),
				'options'      => array(
					'inherit'  => esc_html__('Inherit', 'wellco'),
	                'on' => esc_html__('On', 'wellco'),
	                'off'  => esc_html__('Off', 'wellco')
				),
				'default'      => 'inherit',
			),
	    )
	) );

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Colors', 'wellco' ),
		'icon'   => 'el-icon-file-edit',
		'fields' => array(
			array(
	            'id'          => 'p_primary_color',
	            'type'        => 'color',
	            'title'       => esc_html__('Primary Color', 'wellco'),
	            'transparent' => false,
	            'default'     => ''
	        ),
	        array(
	            'id'          => 'p_secondary_color',
	            'type'        => 'color',
	            'title'       => esc_html__('Secondary Color', 'wellco'),
	            'transparent' => false,
	            'default'     => ''
	        ),
		)
	) );

	/**
	 * Config post format meta options
	 *
	 */

	$metabox->add_section( 'ct_pf_video', array(
		'title'  => esc_html__( 'Video', 'wellco' ),
		'fields' => array(
			array(
				'id'    => 'post-video-url',
				'type'  => 'text',
				'title' => esc_html__( 'Video URL', 'wellco' ),
				'desc'  => esc_html__( 'YouTube or Vimeo video URL', 'wellco' )
			),

			array(
				'id'    => 'post-video-file',
				'type'  => 'editor',
				'title' => esc_html__( 'Video Upload', 'wellco' ),
				'desc'  => esc_html__( 'Upload video file', 'wellco' )
			),

			array(
				'id'    => 'post-video-html',
				'type'  => 'textarea',
				'title' => esc_html__( 'Embadded video', 'wellco' ),
				'desc'  => esc_html__( 'Use this option when the video does not come from YouTube or Vimeo', 'wellco' )
			)
		)
	) );

	$metabox->add_section( 'ct_pf_gallery', array(
		'title'  => esc_html__( 'Gallery', 'wellco' ),
		'fields' => array(
			array(
				'id'       => 'post-gallery-lightbox',
				'type'     => 'switch',
				'title'    => esc_html__( 'Lightbox?', 'wellco' ),
				'subtitle' => esc_html__( 'Enable lightbox for gallery images.', 'wellco' ),
				'default'  => true
			),
			array(
				'id'       => 'post-gallery-images',
				'type'     => 'gallery',
				'title'    => esc_html__( 'Gallery Images ', 'wellco' ),
				'subtitle' => esc_html__( 'Upload images or add from media library.', 'wellco' )
			)
		)
	) );

	$metabox->add_section( 'ct_pf_audio', array(
		'title'  => esc_html__( 'Audio', 'wellco' ),
		'fields' => array(
			array(
				'id'          => 'post-audio-url',
				'type'        => 'text',
				'title'       => esc_html__( 'Audio URL', 'wellco' ),
				'description' => esc_html__( 'Audio file URL in format: mp3, ogg, wav.', 'wellco' ),
				'validate'    => 'url',
				'msg'         => 'Url error!'
			)
		)
	) );

	$metabox->add_section( 'ct_pf_link', array(
		'title'  => esc_html__( 'Link', 'wellco' ),
		'fields' => array(
			array(
				'id'       => 'post-link-url',
				'type'     => 'text',
				'title'    => esc_html__( 'URL', 'wellco' ),
				'validate' => 'url',
				'msg'      => 'Url error!'
			)
		)
	) );

	$metabox->add_section( 'ct_pf_quote', array(
		'title'  => esc_html__( 'Quote', 'wellco' ),
		'fields' => array(
			array(
				'id'    => 'post-quote-cite',
				'type'  => 'text',
				'title' => esc_html__( 'Cite', 'wellco' )
			)
		)
	) );

	/**
	 * Config service meta options
	 *
	 */
	$metabox->add_section( 'service', array(
		'title'  => esc_html__( 'General', 'wellco' ),
		'icon'   => 'el-icon-website',
		'fields' => array(
			array(
	            'id'       => 'icon_type',
	            'type'     => 'button_set',
	            'title'    => esc_html__('Icon Type', 'wellco'),
	            'options'  => array(
	                'icon'  => esc_html__('Icon', 'wellco'),
	                'image'  => esc_html__('Image', 'wellco'),
	            ),
	            'default'  => 'icon'
	        ),
			array(
	            'id'       => 'service_icon',
	            'type'     => 'ct_iconpicker',
	            'title'    => esc_html__('Icon', 'wellco'),
	            'required' => array( 0 => 'icon_type', 1 => 'equals', 2 => 'icon' ),
            	'force_output' => true
	        ),
	        array(
	            'id'       => 'service_icon_img',
	            'type'     => 'media',
	            'title'    => esc_html__('Icon Image', 'wellco'),
	            'default' => '',
	            'required' => array( 0 => 'icon_type', 1 => 'equals', 2 => 'image' ),
            	'force_output' => true
	        ),
			array(
				'id'       => 'service_except',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Excerpt', 'wellco' ),
				'validate' => 'no_html'
			),
			array(
				'id'             => 'service_content_padding',
				'type'           => 'spacing',
				'output'         => array( '.single-service #content' ),
				'right'          => false,
				'left'           => false,
				'mode'           => 'padding',
				'units'          => array( 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Content Padding', 'wellco' ),
				'subtitle'     => esc_html__( 'Content site paddings.', 'wellco' ),
				'desc'           => esc_html__( 'Default: Theme Option.', 'wellco' ),
				'default'        => array(
					'padding-top'    => '',
					'padding-bottom' => '',
					'units'          => 'px',
				)
			),
		)
	) );

	/**
	 * Config portfolio meta options
	 *
	 */
	$metabox->add_section( 'portfolio', array(
		'title'  => esc_html__( 'General', 'wellco' ),
		'icon'   => 'el-icon-website',
		'fields' => array(
			array(
	            'id'       => 'ptitle_bg',
	            'type'     => 'background',
	            'background-color'     => true,
	            'background-repeat'     => false,
	            'background-size'     => false,
	            'background-attachment'     => false,
	            'background-position'     => false,
	            'transparent'     => false,
	            'title'    => esc_html__('Page Title Background', 'wellco'),
	            'subtitle' => esc_html__('Page title background image.', 'wellco'),
	        ),
			array(
				'id'             => 'portfolio_content_padding',
				'type'           => 'spacing',
				'output'         => array( '.single-portfolio #content' ),
				'right'          => false,
				'left'           => false,
				'mode'           => 'padding',
				'units'          => array( 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Content Padding', 'wellco' ),
				'subtitle'     => esc_html__( 'Content site paddings.', 'wellco' ),
				'desc'           => esc_html__( 'Default: Theme Option.', 'wellco' ),
				'default'        => array(
					'padding-top'    => '',
					'padding-bottom' => '',
					'units'          => 'px',
				)
			),
		)
	) );

}

function wellco_get_option_of_theme_options( $key, $default = '' ) {
	if ( empty( $key ) ) {
		return '';
	}
	$options = get_option( wellco_get_opt_name(), array() );
	$value   = isset( $options[ $key ] ) ? $options[ $key ] : $default;

	return $value;
}