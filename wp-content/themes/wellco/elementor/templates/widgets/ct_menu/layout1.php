<?php
$default_settings = [
    'menu' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = ct_get_element_id($settings); 
$h_custom_main_menu = wellco_get_page_opt('h_custom_main_menu');
if(!empty($h_custom_main_menu)) {
    $menu = $h_custom_main_menu;
}
if(!empty($menu)) { ?>
    <div id="<?php echo esc_attr($html_id); ?>" class="ct-nav-menu ct-nav-menu1">
        <?php wp_nav_menu(array(
            'menu_class' => 'ct-main-menu children-arrow clearfix',
            'walker'     => class_exists( 'EFramework_Mega_Menu_Walker' ) ? new EFramework_Mega_Menu_Walker : '',
            'link_before'     => '<span>',
            'link_after'      => '</span>',
            'menu'        => wp_get_nav_menu_object($menu))
        ); ?>
    </div>
<?php } elseif( has_nav_menu( 'primary' ) ) { ?>
    <div id="<?php echo esc_attr($html_id); ?>" class="ct-nav-menu ct-nav-menu1">
        <?php $attr_menu = array(
            'theme_location' => 'primary',
            'menu_class' => 'ct-main-menu children-arrow clearfix',
            'link_before'     => '<span>',
            'link_after'      => '</span>',
            'walker'         => class_exists( 'EFramework_Mega_Menu_Walker' ) ? new EFramework_Mega_Menu_Walker : '',
        );
        wp_nav_menu( $attr_menu ); ?>
    </div>
<?php } ?>