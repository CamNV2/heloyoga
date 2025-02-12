<?php 
$default_settings = [
    'image' => '',
    'image_small' => '',
    'img_size' => '',
    'video_link' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);

if(empty($img_size)) {
    $img_size = 'full';
}

if ( ! empty( $button_link['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $button_link['url'] );

    if ( $button_link['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $button_link['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}
?>
<div class="ct-banner1" data-wow-delay="<?php echo esc_attr($settings['ct_animate_delay']); ?>ms">
    <div class="ct-banner-inner">
        <?php if( ! empty( $image['url'] ) ) : 
            $img  = ct_get_image_by_size( array(
                'attach_id'  => $image['id'],
                'thumb_size' => $img_size,
            ) );
            $thumbnail    = $img['thumbnail'];
            ?>
            <div class="ct-banner-image">
                <?php echo wp_kses_post($thumbnail); ?>
                <?php if( ! empty( $image_small['url'] ) ) : 
                    $img_small  = ct_get_image_by_size( array(
                        'attach_id'  => $image_small['id'],
                        'thumb_size' => '150x150',
                    ) );
                    $thumbnail_small    = $img_small['thumbnail'];
                    ?>
                    <div class="ct-banner-image-small">
                        <?php echo wp_kses_post($thumbnail_small); ?>
                        <?php if(!empty($video_link)) : ?>
                            <a class="ct-banner-video" href="<?php echo esc_url($video_link); ?>">
                                <i class="fa fa-play"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>