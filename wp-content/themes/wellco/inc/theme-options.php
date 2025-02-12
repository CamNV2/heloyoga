<?php
if (!class_exists('ReduxFramework')) {
    return;
}
if (class_exists('ReduxFrameworkPlugin')) {
    remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
}

$opt_name = wellco_get_opt_name();
$theme = wp_get_theme();

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type'            => class_exists('Bravis_Theme_Core') ? 'submenu' : '',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__('Theme Options', 'wellco'),
    'page_title'           => esc_html__('Theme Options', 'wellco'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-admin-generic',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => true,
    // Show the time the page took to load, etc
    'update_notice'        => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
    'show_options_object' => false,
    // OPTIONAL -> Give you extra features
    'page_priority'        => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => class_exists('Bravis_Theme_Core') ? $theme->get('TextDomain') : '',
    // For a full list of options, visit: //codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'theme-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    ),
    'templates_path'       => get_template_directory() . '/inc/templates/redux/'
);

Redux::SetArgs($opt_name, $args);

/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('General', 'wellco'),
    'icon'   => 'el-icon-home',
    'fields' => array(
        array(
            'id'       => 'favicon',
            'type'     => 'media',
            'title'    => esc_html__('Favicon', 'wellco'),
            'default' => '',
            'url' => false
        ),
        array(
            'id'       => 'dev_mode',
            'type'     => 'switch',
            'title'    => esc_html__('Dev Mode (not recommended)', 'wellco'),
            'description' => 'Scss generate css',
            'default'  => false
        ),
        array(
            'id'       => 'mouse_move_animation',
            'type'     => 'switch',
            'title'    => esc_html__('Mouse Move Animation', 'wellco'),
            'default'  => false
        ),
        array(
            'title' => esc_html__('Page Loading', 'wellco'),
            'type'  => 'section',
            'id' => 'page_lading',
            'indent' => true
        ),
        array(
            'id'       => 'show_page_loading',
            'type'     => 'switch',
            'title'    => esc_html__('Enable Page Loading', 'wellco'),
            'subtitle' => esc_html__('Enable page loading effect when you load site.', 'wellco'),
            'default'  => false
        ),
        array(
            'id'       => 'loading_type',
            'type'     => 'select',
            'title'    => esc_html__('Loading Style', 'wellco'),
            'options'  => array(
                'style-image'  => esc_html__('Image', 'wellco'),
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
                'style13'  => esc_html__('Style 13', 'wellco'),
            ),
            'default'  => 'style1',
            'required' => array( 0 => 'show_page_loading', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'       => 'logo_loader',
            'type'     => 'media',
            'title'    => esc_html__('Logo Loader', 'wellco'),
            'default' => '',
            'required' => array( 0 => 'loading_type', 1 => 'equals', 2 => 'style-image' ),
            'force_output' => true,
            'url' => false
        ),
    )
));

/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Header', 'wellco'),
    'icon'   => 'el el-indent-left',
    'fields' => array(
        array(
            'id'          => 'header_layout',
            'type'        => 'select',
            'title'       => esc_html__('Main Header Layout', 'wellco'),
            'desc'        => sprintf(esc_html__('To use this Option please %sClick Here%s to add your header layout first.','wellco'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=header' ) ) . '">','</a>'),
            'options'     =>wellco_list_post('header'),
            'default'     => '',
        ),
        array(
            'id'          => 'header_layout_sticky',
            'type'        => 'select',
            'title'       => esc_html__('Sticky Header Layout', 'wellco'),
            'desc'        => sprintf(esc_html__('To use this Option please %sClick Here%s to add your header layout first.','wellco'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=header' ) ) . '">','</a>'),
            'options'     =>wellco_list_post('header'),
            'default'     => '',
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Mobile', 'wellco'),
    'icon'       => 'el el-picture',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'logo_m',
            'type'     => 'media',
            'title'    => esc_html__('Logo Dark', 'wellco'),
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo-mobile.png'
            ),
            'url' => false
        ),
        array(
            'id'       => 'logo_maxh_sm',
            'type'     => 'dimensions',
            'title'    => esc_html__('Logo Max Height', 'wellco'),
            'subtitle' => esc_html__('Enter number.', 'wellco'),
            'width'    => false,
            'unit'     => 'px'
        ),
        array(
            'id'       => 'm_sticky',
            'type'     => 'button_set',
            'title'    => esc_html__('Sticky', 'wellco'),
            'options'  => array(
                'yes'  => esc_html__('Yes', 'wellco'),
                '' => esc_html__('No', 'wellco'),
            ),
            'default'  => ''
        ),
    )
));

/*--------------------------------------------------------------
# Page Title area
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Page Title', 'wellco'),
    'icon'   => 'el-icon-map-marker',
    'fields' => array(

        array(
            'id'           => 'pagetitle',
            'type'         => 'button_set',
            'title'        => esc_html__( 'Page Title', 'wellco' ),
            'options'      => array(
                'show'  => esc_html__( 'Show', 'wellco' ),
                'hide'  => esc_html__( 'Hide', 'wellco' ),
            ),
            'default'      => 'show',
        ),

        array(
            'id'          => 'pagetitle_color',
            'type'        => 'color',
            'title'       => esc_html__('Page Title Color', 'wellco'),
            'transparent' => false,
            'default'     => '',
            'output'         => array('#pagetitle .page-title'),
            'required' => array( 0 => 'pagetitle', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),

        array(
            'id'       => 'ptitle_bg',
            'type'     => 'background',
            'title'    => esc_html__('Background', 'wellco'),
            'subtitle' => esc_html__('Page title background.', 'wellco'),
            'output'   => array('body #pagetitle'),
            'required' => array( 0 => 'pagetitle', 1 => 'equals', 2 => 'show' ),
            'force_output' => true,
            'background-image' => true,
            'background-color' => false,
            'background-position' => false,
            'background-repeat' => false,
            'background-size' => false,
            'background-attachment' => false,
            'transparent' => false,
        ),
        array(
            'id'       => 'ptitle_bg_overlay',
            'type'     => 'color_rgba',
            'title'    => esc_html__( 'Background Color Overlay', 'wellco' ),
            'subtitle' => esc_html__( 'Page title background color overlay.', 'wellco' ),
            'output'   => array( 'background-color' => '#pagetitle:before' ),
            'required' => array( 0 => 'pagetitle', 1 => 'equals', 2 => 'show' ),
            'force_output' => true,
        ),
        array(
            'id'             => 'page_title_padding',
            'type'           => 'spacing',
            'output'         => array('body #pagetitle'),
            'right'   => false,
            'left'    => false,
            'mode'           => 'padding',
            'units'          => array('px'),
            'units_extended' => 'false',
            'title'          => esc_html__('Page Title Space Top/Bottom', 'wellco'),
            'default'            => array(
                'padding-top'   => '',
                'padding-bottom'   => '',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'pagetitle', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'id'       => 'ptitle_breadcrumb_on',
            'type'     => 'button_set',
            'title'    => esc_html__('Breadcrumb', 'wellco'),
            'options'  => array(
                'show'  => esc_html__('Show', 'wellco'),
                'hidden'  => esc_html__('Hidden', 'wellco'),
            ),
            'default'  => 'show',
            'required' => array( 0 => 'pagetitle', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'id'          => 'breadcrumb_color',
            'type'        => 'color',
            'title'       => esc_html__('Breadcrumb Color', 'wellco'),
            'transparent' => false,
            'default'     => '',
            'output'         => array('.ct-breadcrumb, .ct-breadcrumb li a:after'),
            'required' => array( 0 => 'pagetitle', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
    )
));

/*--------------------------------------------------------------
# WordPress default content
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title' => esc_html__('Content', 'wellco'),
    'icon'  => 'el-icon-pencil',
    'fields'     => array(
        array(
            'id'       => 'content_bg',
            'type'     => 'background',
            'title'    => esc_html__('Background', 'wellco'),
            'subtitle' => esc_html__('Content background.', 'wellco'),
            'output'   => array( 'background-color' => '.site-content' ),
            'force_output' => true,
            'background-image' => true,
            'background-color' => true,
            'background-position' => true,
            'background-repeat' => true,
            'background-size' => true,
            'background-attachment' => true,
            'transparent' => false,
            'default'  => ''
        ),
        array(
            'id'             => 'content_padding',
            'type'           => 'spacing',
            'output'         => array('#content'),
            'right'   => false,
            'left'    => false,
            'mode'           => 'padding',
            'units'          => array('px'),
            'units_extended' => 'false',
            'title'          => esc_html__('Content Padding', 'wellco'),
            'desc'           => esc_html__('Default: Top-95px, Bottom-70px', 'wellco'),
            'default'            => array(
                'padding-top'   => '',
                'padding-bottom'   => '',
                'units'          => 'px',
            )
        ),
        array(
            'id'      => 'search_field_placeholder',
            'type'    => 'text',
            'title'   => esc_html__('Search Form - Text Placeholder', 'wellco'),
            'default' => '',
            'desc'           => esc_html__('Default: Search', 'wellco'),
        ),
    )
));


Redux::setSection($opt_name, array(
    'title'      => esc_html__('Blog Default', 'wellco'),
    'icon'       => 'el-icon-list',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'archive_sidebar_pos',
            'type'     => 'button_set',
            'title'    => esc_html__('Sidebar Position', 'wellco'),
            'subtitle' => esc_html__('Select a sidebar position for blog home, archive, search...', 'wellco'),
            'options'  => array(
                'left'  => esc_html__('Left', 'wellco'),
                'right' => esc_html__('Right', 'wellco'),
                'none'  => esc_html__('Disabled', 'wellco')
            ),
            'default'  => 'right'
        ),
        array(
            'id'       => 'archive_date_on',
            'title'    => esc_html__('Date', 'wellco'),
            'subtitle' => esc_html__('Show date posted on each post.', 'wellco'),
            'type'     => 'switch',
            'default'  => true,
        ),
        array(
            'id'       => 'archive_categories_on',
            'title'    => esc_html__('Categories', 'wellco'),
            'subtitle' => esc_html__('Show category names on each post.', 'wellco'),
            'type'     => 'switch',
            'default'  => true,
        ),
        array(
            'id'       => 'archive_author_on',
            'title'    => esc_html__('Author', 'wellco'),
            'subtitle' => esc_html__('Show author names on each post.', 'wellco'),
            'type'     => 'switch',
            'default'  => true,
        ),
        array(
            'id'      => 'archive_readmore_text',
            'type'    => 'text',
            'title'   => esc_html__('Read More Text', 'wellco'),
            'default' => '',
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Single Post', 'wellco'),
    'icon'       => 'el-icon-file-edit',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'post_title_pos',
            'type'     => 'button_set',
            'title'    => esc_html__('Post Title Position', 'wellco'),
            'options'  => array(
                'ptitle'  => esc_html__('In - Page Title', 'wellco'),
                'pcontent' => esc_html__('In - Content', 'wellco'),
            ),
            'default'  => 'ptitle'
        ),
        array(
            'id'       => 'post_sidebar_pos',
            'type'     => 'button_set',
            'title'    => esc_html__('Sidebar Position', 'wellco'),
            'subtitle' => esc_html__('Select a sidebar position', 'wellco'),
            'options'  => array(
                'left'  => esc_html__('Left', 'wellco'),
                'right' => esc_html__('Right', 'wellco'),
                'none'  => esc_html__('Disabled', 'wellco')
            ),
            'default'  => 'right'
        ),
        array(
            'id'       => 'post_date_on',
            'title'    => esc_html__('Date', 'wellco'),
            'subtitle' => esc_html__('Show date on single post.', 'wellco'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_author_on',
            'title'    => esc_html__('Author', 'wellco'),
            'subtitle' => esc_html__('Show author name on single post.', 'wellco'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_categories_on',
            'title'    => esc_html__('Categories', 'wellco'),
            'subtitle' => esc_html__('Show category names on single post.', 'wellco'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_tags_on',
            'title'    => esc_html__('Tags', 'wellco'),
            'subtitle' => esc_html__('Show tag names on single post.', 'wellco'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_navigation_on',
            'title'    => esc_html__('Navigation', 'wellco'),
            'subtitle' => esc_html__('Show navigation on single post.', 'wellco'),
            'type'     => 'switch',
            'default'  => false,
        ),
        array(
            'id'       => 'post_social_share_on',
            'title'    => esc_html__('Social Share', 'wellco'),
            'subtitle' => esc_html__('Show social share on single post.', 'wellco'),
            'type'     => 'switch',
            'default'  => false,
        ),
        array(
            'id'       => 'post_author_box_info',
            'title'    => esc_html__('Author Box Info', 'wellco'),
            'subtitle' => esc_html__('Show author box info on single post.', 'wellco'),
            'type'     => 'switch',
            'default'  => false
        ),
    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('LearnPress', 'wellco'),
    'icon'  => 'el el-book',
    'fields'     => array(
        array(
            'title' => esc_html__('Single Course', 'wellco'),
            'type'  => 'section',
            'id' => 'single_course',
            'indent' => true
        ),
        array(
            'id'       => 'sg_course_cta',
            'type'     => 'switch',
            'title'    => esc_html__('Call To Action', 'wellco'),
            'default'  => false
        ),
        array(
            'id'      => 'sg_course_cta_text',
            'type'    => 'text',
            'title'   => esc_html__('Call To Action - Text', 'wellco'),
            'default' => '',
            'required' => array( 0 => 'sg_course_cta', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'       => 'sg_course_related',
            'type'     => 'switch',
            'title'    => esc_html__('Related Course', 'wellco'),
            'default'  => false
        ),
        array(
            'id'      => 'sg_course_related_subtitle',
            'type'    => 'text',
            'title'   => esc_html__('Related Course - Sub Title', 'wellco'),
            'default' => '',
            'required' => array( 0 => 'sg_course_related', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'      => 'sg_course_related_title',
            'type'    => 'text',
            'title'   => esc_html__('Related Course - Main Title', 'wellco'),
            'default' => '',
            'required' => array( 0 => 'sg_course_related', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
    )
));

/*--------------------------------------------------------------
# Shop
--------------------------------------------------------------*/
if(class_exists('Woocommerce')) {
    Redux::setSection($opt_name, array(
        'title'  => esc_html__('Shop', 'wellco'),
        'icon'   => 'el el-shopping-cart',
        'fields' => array(
            array(
                'title' => esc_html__('Products', 'wellco'),
                'type'  => 'section',
                'id' => 'shop_products',
                'indent' => true,
            ),
            array(
                'id'       => 'sidebar_shop',
                'type'     => 'button_set',
                'title'    => esc_html__('Sidebar Position', 'wellco'),
                'subtitle' => esc_html__('Select a sidebar position for archive shop.', 'wellco'),
                'options'  => array(
                    'left'  => esc_html__('Left', 'wellco'),
                    'right' => esc_html__('Right', 'wellco'),
                    'none'  => esc_html__('Disabled', 'wellco')
                ),
                'default'  => 'right'
            ),
            array(
                'title' => esc_html__('Products displayed per page', 'wellco'),
                'id' => 'product_per_page',
                'type' => 'slider',
                'subtitle' => esc_html__('Number product to show', 'wellco'),
                'default' => 12,
                'min'  => 4,
                'step' => 1,
                'max' => 50,
                'display_value' => 'text'
            ),

            array(
                'title' => esc_html__('Single Product', 'wellco'),
                'type'  => 'section',
                'id' => 'shop_single',
                'indent' => true,
            ),
            array(
                'id'       => 'product_title',
                'type'     => 'switch',
                'title'    => esc_html__('Product Title', 'wellco'),
                'default'  => false
            ),
            array(
                'id'       => 'product_social_share',
                'type'     => 'switch',
                'title'    => esc_html__('Social Share', 'wellco'),
                'default'  => false
            ),
        )
    ));
}

/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Footer', 'wellco'),
    'icon'   => 'el el-website',
    'fields' => array(
        array(
            'id'          => 'footer_layout_custom',
            'type'        => 'select',
            'title'       => esc_html__('Layout', 'wellco'),
            'desc'        => sprintf(esc_html__('To use this Option please %sClick Here%s to add your custom footer layout first.','wellco'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=footer' ) ) . '">','</a>'),
            'options'     =>wellco_list_post('footer'),
            'default'     => '',
        ),
        array(
            'id'       => 'back_totop_on',
            'type'     => 'switch',
            'title'    => esc_html__('Back to Top Button', 'wellco'),
            'subtitle' => esc_html__('Show back to top button when scrolled down.', 'wellco'),
            'default'  => false,
        ),
        array(
                'id'           => 'fixed_footer',
                'type'         => 'button_set',
                'title'        => esc_html__( 'Fixed Footer', 'wellco' ),
                'options'      => array(
                    'on'  => esc_html__('On', 'wellco'),
                    'off' => esc_html__('Off', 'wellco'),
                ),
                'default'      => 'off',
            ),
    )
));

/* 404 Page /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('404 Page', 'wellco'),
    'icon'   => 'el-cog-alt el',
    'fields' => array(
        array(
            'id'       => 'page_404',
            'type'     => 'button_set',
            'title'    => esc_html__('Select 404 Page', 'wellco'),
            'options'  => array(
                'default'  => esc_html__('Default', 'wellco'),
                'custom'  => esc_html__('Custom', 'wellco'),
            ),
            'default'  => 'default'
        ),
        array(
            'id'          => 'page_custom_404',
            'type'        => 'select',
            'title'       => esc_html__('Page', 'wellco'),
            'options'     => wellco_list_post('page'),
            'default'     => '',
            'required' => array( 0 => 'page_404', 1 => 'equals', 2 => 'custom' ),
            'force_output' => true
        ),
    ),
));

/*--------------------------------------------------------------
# Colors
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Colors', 'wellco'),
    'icon'   => 'el-icon-file-edit',
    'fields' => array(
        array(
            'id'          => 'primary_color',
            'type'        => 'color',
            'title'       => esc_html__('Primary Color', 'wellco'),
            'transparent' => false,
            'default'     => '#4b83fc'
        ),
        array(
            'id'          => 'secondary_color',
            'type'        => 'color',
            'title'       => esc_html__('Secondary Color', 'wellco'),
            'transparent' => false,
            'default'     => '#66cea9'
        ),
        array(
            'id'          => 'third_color',
            'type'        => 'color',
            'title'       => esc_html__('Third Color', 'wellco'),
            'transparent' => false,
            'default'     => '#ffbd40'
        ),
        array(
            'id'      => 'link_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Link Colors', 'wellco'),
            'default' => array(
                'regular' => '#4b83fc',
                'hover'   => '#66cea9',
                'active'  => '#66cea9'
            ),
            'output'  => array('a')
        ),
    )
));

/*--------------------------------------------------------------
# Typography
--------------------------------------------------------------*/
$custom_font_selectors_1 = Redux::get_option($opt_name, 'custom_font_selectors_1');
$custom_font_selectors_1 = !empty($custom_font_selectors_1) ? explode(',', $custom_font_selectors_1) : array();
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Typography', 'wellco'),
    'icon'   => 'el-icon-text-width',
    'fields' => array(
        array(
            'id'       => 'body_default_font',
            'type'     => 'select',
            'title'    => esc_html__('Body Default Font', 'wellco'),
            'options'  => array(
                'Nunito-Sans'  => esc_html__('Default', 'wellco'),
                'Google-Font'  => esc_html__('Google Font', 'wellco'),
            ),
            'default'  => 'Nunito-Sans',
        ),
        array(
            'id'          => 'font_main',
            'type'        => 'typography',
            'title'       => esc_html__('Body Google Font', 'wellco'),
            'subtitle'    => esc_html__('This will be the default font of your website.', 'wellco'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'line-height'  => true,
            'font-size'  => true,
            'text-align'  => false,
            'output'      => array('body'),
            'units'       => 'px',
            'required' => array( 0 => 'body_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'       => 'heading_default_font',
            'type'     => 'select',
            'title'    => esc_html__('Heading Default Font', 'wellco'),
            'options'  => array(
                'Raleway'  => esc_html__('Default', 'wellco'),
                'Google-Font'  => esc_html__('Google Font', 'wellco'),
            ),
            'default'  => 'Raleway',
        ),
        array(
            'id'          => 'font_h1',
            'type'        => 'typography',
            'title'       => esc_html__('H1', 'wellco'),
            'subtitle'    => esc_html__('This will be the default font for all H1 tags of your website.', 'wellco'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h1', '.h1', '.text-heading'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h2',
            'type'        => 'typography',
            'title'       => esc_html__('H2', 'wellco'),
            'subtitle'    => esc_html__('This will be the default font for all H2 tags of your website.', 'wellco'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h2', '.h2'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h3',
            'type'        => 'typography',
            'title'       => esc_html__('H3', 'wellco'),
            'subtitle'    => esc_html__('This will be the default font for all H3 tags of your website.', 'wellco'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h3', '.h3'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h4',
            'type'        => 'typography',
            'title'       => esc_html__('H4', 'wellco'),
            'subtitle'    => esc_html__('This will be the default font for all H4 tags of your website.', 'wellco'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h4', '.h4'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h5',
            'type'        => 'typography',
            'title'       => esc_html__('H5', 'wellco'),
            'subtitle'    => esc_html__('This will be the default font for all H5 tags of your website.', 'wellco'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h5', '.h5'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h6',
            'type'        => 'typography',
            'title'       => esc_html__('H6', 'wellco'),
            'subtitle'    => esc_html__('This will be the default font for all H6 tags of your website.', 'wellco'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h6', '.h6'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Fonts Selectors', 'wellco'),
    'icon'       => 'el el-fontsize',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'          => 'custom_font_1',
            'type'        => 'typography',
            'title'       => esc_html__('Custom Font', 'wellco'),
            'subtitle'    => esc_html__('This will be the font that applies to the class selector.', 'wellco'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => $custom_font_selectors_1,
            'units'       => 'px',

        ),
        array(
            'id'       => 'custom_font_selectors_1',
            'type'     => 'textarea',
            'title'    => esc_html__('CSS Selectors', 'wellco'),
            'subtitle' => esc_html__('Add class selectors to apply above font.', 'wellco'),
            'validate' => 'no_html'
        )
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Extra Post Type', 'wellco'),
    'icon'       => 'el el-briefcase',
    'fields'     => array(
        array(
            'title' => esc_html__('Portfolio', 'wellco'),
            'type'  => 'section',
            'id' => 'post_portfolio',
            'indent' => true,
        ),
        array(
            'id'      => 'portfolio_slug',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Slug', 'wellco'),
            'default' => '',
            'desc'     => 'Default: portfolio',
        ),
        array(
            'id'      => 'portfolio_name',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Name', 'wellco'),
            'default' => '',
            'desc'     => 'Default: Portfolio',
        ),
        array(
            'id'      => 'portfolio_category_slug',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Category Slug', 'wellco'),
            'default' => '',
            'desc'     => 'Default: portfolio-category',
        ),
        array(
            'id'      => 'portfolio_category_name',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Category Name', 'wellco'),
            'default' => '',
            'desc'     => 'Default: Portfolio Categories',
        ),
        array(
            'id'    => 'archive_portfolio_link',
            'type'  => 'select',
            'title' => esc_html__( 'Custom Archive Page Link', 'wellco' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
        ),
    )
));

/* Custom Code /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Custom Code', 'wellco'),
    'icon'   => 'el-icon-edit',
    'fields' => array(

        array(
            'id'       => 'site_header_code',
            'type'     => 'textarea',
            'theme'    => 'chrome',
            'title'    => esc_html__('Header Custom Codes', 'wellco'),
            'subtitle' => esc_html__('It will insert the code to wp_head hook.', 'wellco'),
        ),
        array(
            'id'       => 'site_footer_code',
            'type'     => 'textarea',
            'theme'    => 'chrome',
            'title'    => esc_html__('Footer Custom Codes', 'wellco'),
            'subtitle' => esc_html__('It will insert the code to wp_footer hook.', 'wellco'),
        ),

    ),
));

/* Custom CSS /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Custom CSS', 'wellco'),
    'icon'   => 'el-icon-adjust-alt',
    'fields' => array(

        array(
            'id'   => 'customcss',
            'type' => 'info',
            'desc' => esc_html__('Custom CSS', 'wellco')
        ),

        array(
            'id'       => 'site_css',
            'type'     => 'ace_editor',
            'title'    => esc_html__('CSS Code', 'wellco'),
            'subtitle' => esc_html__('Advanced CSS Options. You can paste your custom CSS Code here.', 'wellco'),
            'mode'     => 'css',
            'validate' => 'css',
            'theme'    => 'chrome',
            'default'  => ""
        ),

    ),
));