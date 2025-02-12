<?php 
$default_settings = [
    'title' => '',
    'image' => '',
    'img_size' => '',
    'btn_text1' => '',
    'btn_text2' => '',
    'btn_link1' => '',
    'btn_link2' => '',
    'ct_animate' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$size = 'full';
if(!empty($img_size)) {
    $size = $img_size;
} else {
    $size = 'full';
}
$img  = ct_get_image_by_size( array(
    'attach_id'  => $image['id'],
    'thumb_size' => $size,
) );
$thumbnail    = $img['thumbnail'];
if ( ! empty( $btn_link1['url'] ) ) {
    $widget->add_render_attribute( 'btn_link1', 'href', $btn_link1['url'] );

    if ( $btn_link1['is_external'] ) {
        $widget->add_render_attribute( 'btn_link1', 'target', '_blank' );
    }

    if ( $btn_link1['nofollow'] ) {
        $widget->add_render_attribute( 'btn_link1', 'rel', 'nofollow' );
    }
}

if ( ! empty( $btn_link2['url'] ) ) {
    $widget->add_render_attribute( 'btn_link2', 'href', $btn_link2['url'] );

    if ( $btn_link2['is_external'] ) {
        $widget->add_render_attribute( 'btn_link2', 'target', '_blank' );
    }

    if ( $btn_link2['nofollow'] ) {
        $widget->add_render_attribute( 'btn_link2', 'rel', 'nofollow' );
    }
}

?>
<div class="ct-showcase <?php echo esc_attr($ct_animate); ?>">
    <div class="item--image">
        <?php if ( ! empty( $image['url'] ) ) { echo wp_kses_post($thumbnail); } ?>
        <div class="item--buttons">
            <?php if ( ! empty( $btn_link1['url'] ) ) { ?><a class="btn btn-primary" <?php ct_print_html($widget->get_render_attribute_string( 'btn_link1' )); ?>><?php echo esc_attr($btn_text1); ?></a><?php } ?>
            <?php if ( ! empty( $btn_link2['url'] ) ) { ?><a class="btn btn-secondary" <?php ct_print_html($widget->get_render_attribute_string( 'btn_link2' )); ?>><?php echo esc_attr($btn_text2); ?></a><?php } ?>
        </div>
    </div>
    <span class="item--title"><?php echo esc_attr($title); ?></span>
</div>