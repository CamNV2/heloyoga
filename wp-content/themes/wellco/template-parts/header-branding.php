<?php
/**
 * Template part for displaying site branding
 */
$custom_header = wellco_get_page_opt('custom_header', 'false');
$logo_m = wellco_get_opt( 'logo_m', array( 'url' => get_template_directory_uri().'/assets/images/logo-mobile.png', 'id' => '' ) );
$p_logo_m = wellco_get_page_opt( 'p_logo_m' );
if(!empty($p_logo_m['url']) ) {
	$logo_m = $p_logo_m;
}
if ($logo_m['url']) {
    printf(
        '<a class="logo-mobile" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="%2$s"/></a>',
        esc_url( home_url( '/' ) ),
        esc_attr( get_bloginfo( 'name' ) ),
        esc_url( $logo_m['url'] )
    );
}