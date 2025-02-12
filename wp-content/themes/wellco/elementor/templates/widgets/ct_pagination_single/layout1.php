<?php
$default_settings = [
    'archive_link' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);

if ( ! empty( $archive_link ) ) {
    $widget->add_render_attribute( 'pagination', 'href', $archive_link );

    if ( $settings['archive_link']['is_external'] ) {
        $widget->add_render_attribute( 'pagination', 'target', '_blank' );
    }

    if ( $settings['archive_link']['nofollow'] ) {
        $widget->add_render_attribute( 'pagination', 'rel', 'nofollow' );
    }
}

global $post;
$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
$next     = get_adjacent_post( false, '', false );
if ( ! $next && ! $previous ) {
    return;
}
$next_post = get_next_post();
$previous_post = get_previous_post();

if( !empty($next_post) || !empty($previous_post) ) { ?>
    <div class="ct-pagination-single">
        
        <div class="ct-pagination-item ct-pagination-prev">
            <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { 
                $prev_img_id = get_post_thumbnail_id($previous_post->ID);
                $prev_img_url = wp_get_attachment_image_src($prev_img_id, 'thumbnail');
                ?>
                <div class="ct-pagination-item-inner">
                    <?php if(!empty($prev_img_id)) : ?>
                        <div class="item--image image-effect-white">
                            <a href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>">
                                <img src="<?php echo wp_kses_post($prev_img_url[0]); ?>" />
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="item--meta">
                        <label><?php echo esc_html__('Previous', 'wellco'); ?></label>
                        <a href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><?php echo get_the_title( $previous_post->ID ); ?></a>
                    </div>
                </div>
            <?php } ?>
        </div>
        
        <?php if ( ! empty( $archive_link ) ) { ?>
            <div class="ct-pagination-archive">
                <a <?php ct_print_html($widget->get_render_attribute_string( 'pagination' )); ?>>
                    <i></i>
                    <i></i>
                    <i></i>
                    <i></i>
                    <i></i>
                    <i></i>
                    <i></i>
                    <i></i>
                    <i></i>
                </a>
            </div>
        <?php } ?>
        <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') { 
            $next_img_id = get_post_thumbnail_id($next_post->ID);
            $next_img_url = wp_get_attachment_image_src($next_img_id, 'thumbnail');
            ?>
            <div class="ct-pagination-item ct-pagination-next">
                <div class="ct-pagination-item-inner">
                    <div class="item--meta">
                        <label><?php echo esc_html__('Next', 'wellco'); ?></label>
                        <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo get_the_title( $next_post->ID ); ?></a>
                    </div>
                    <?php if(!empty($next_img_id)) : ?>
                        <div class="item--image image-effect-white">
                            <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">
                                <img src="<?php echo wp_kses_post($next_img_url[0]); ?>" />
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } ?>