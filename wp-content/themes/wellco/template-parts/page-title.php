<?php
$titles = wellco_get_page_titles();

$pagetitle = wellco_get_opt( 'pagetitle', 'show' );
$ptitle_bg_overlay = wellco_get_opt( 'ptitle_bg_overlay');
$custom_pagetitle = wellco_get_page_opt( 'custom_pagetitle', 'themeoption');
if($custom_pagetitle != 'themeoption' && $custom_pagetitle != '') {
    $pagetitle = $custom_pagetitle;
}
$sub_title = wellco_get_page_opt( 'sub_title' );
$sub_title_position = wellco_get_page_opt( 'sub_title_position', 'bottom-title' );
ob_start();
if ( $titles['title'] )
{
    printf( '<h1 class="page-title">%s</h1>', wp_kses_post($titles['title']) );
}
$titles_html = ob_get_clean();
$ptitle_breadcrumb_on = wellco_get_opt( 'ptitle_breadcrumb_on', 'show' );
if(is_404()) {
    return true;
}
if($pagetitle == 'show') : ?>
    <div id="pagetitle" class="page-title bg-image <?php if(!empty($ptitle_bg_overlay['color'])) { echo 'hide-overlay'; } ?>">
        <div class="container">
            <div class="page-title-inner">
                <div class="page-title-holder">
                    <?php if(!empty($sub_title)) : ?>
                        <h6 class="page-sub-title"><?php echo esc_attr($sub_title); ?></h6>
                    <?php endif; ?>
                    <?php printf( '%s', wp_kses_post($titles_html)); ?>
                </div>

                <?php if($ptitle_breadcrumb_on == 'show') : ?>
                    <?php wellco_breadcrumb(); ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="page-title-icons">
            <div class="ptitle-particle ptitle-particle1"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/ptitle-shape1.png'); ?>" alt="ptitle-particle1" /></div>
            <div class="ptitle-particle ptitle-particle2"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/ptitle-shape2.png'); ?>" alt="ptitle-particle2" /></div>
            <div class="ptitle-particle ptitle-particle3"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/ptitle-shape3.png'); ?>" alt="ptitle-particle3" /></div>
            <div class="ptitle-particle ptitle-particle4"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/ptitle-shape4.png'); ?>" alt="ptitle-particle4" /></div>
        </div>
    </div>
<?php endif; ?>