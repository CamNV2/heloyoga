<?php
$default_settings = [
    'title' => '',
    'image' => '',
    'ct_animate' => '',
    'ct_animate_delay' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings); 
$html_id = ct_get_element_id($settings);
if ( ! empty( $settings['item_link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['item_link']['url'] );

    if ( $settings['item_link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['item_link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}
if(!empty($title)) : ?>
    <div id="<?php echo esc_attr($html_id); ?>" class="ct-text-image1 <?php echo esc_attr($ct_animate); ?>" data-wow-delay="<?php echo esc_attr($ct_animate_delay); ?>ms">
        <?php if(!empty($image['url'])) : ?>
            <div class="item--image bg-image" style="background-image: url(<?php echo esc_url($image['url']); ?>);"></div>
        <?php endif; ?>
        <div class="item--meta">
            <div class="item--icon">
                <i class="bravisicon-tick"></i>
            </div>
            <?php echo esc_attr($title); ?>
        </div>
        <?php if ( ! empty( $settings['item_link']['url'] ) ) { ?><a class="item--link" <?php ct_print_html($widget->get_render_attribute_string( 'button' )); ?>></a><?php } ?>
    </div>
<?php endif; ?>
