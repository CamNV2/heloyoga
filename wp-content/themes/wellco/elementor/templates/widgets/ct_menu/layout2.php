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
    <div id="<?php echo esc_attr($html_id); ?>" class="ct-nav-menu ct-nav-menu2">
        <?php wp_nav_menu(array(
            'menu_class' => 'ct-nav-inner  clearfix',
            'walker'     => class_exists( 'EFramework_Mega_Menu_Walker' ) ? new EFramework_Mega_Menu_Walker : '',
            'link_before'     => '<span>',
            'link_after'      => '</span>',
            'depth'       => '1',
            'menu'        => wp_get_nav_menu_object($menu))
        ); ?>
    </div>
<?php } ?>