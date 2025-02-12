<?php
$default_settings = [
    'title' => '',
    'description_text' => '',
    'price' => '',
    'button_text' => '',
    'button_link' => '',
    'content_list' => '',
    'ct_animate' => '',
    'ct_animate_delay' => '',
    'item_highlight' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
if ( ! empty( $button_link['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $button_link['url'] );

    if ( $button_link['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $button_link['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}
$widget->add_render_attribute( 'selected_icon', 'class' );
$has_icon = ! empty( $settings['selected_icon'] );
if ( $has_icon ) {
    $widget->add_render_attribute( 'i', 'class', $settings['selected_icon'] );
    $widget->add_render_attribute( 'i', 'aria-hidden', 'true' );
}
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
?>
<div class="ct-pricing-single1 <?php echo esc_attr($item_highlight.' '.$ct_animate); ?>" data-wow-delay="<?php echo esc_attr($settings['ct_animate_delay']); ?>ms">
	<h5 class="pricing--title"><?php echo esc_attr($title); ?></h5>
    <div class="pricing--desc"><?php echo ct_print_html($description_text); ?></div>
    <div class="pricing--price"><?php echo esc_attr($price); ?></div>
    <?php if(isset($settings['content_list']) && !empty($settings['content_list']) && count($settings['content_list'])): ?>
        <ul class="pricing--feature single-lp-list">
            <?php
                foreach ($settings['content_list'] as $key => $ct_list): ?>
                <li class="<?php if($ct_list['active'] == 'yes') { echo 'active'; } ?>"><?php echo ct_print_html($ct_list['content'])?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <?php if(!empty($button_text)) : ?>
        <div class="pricing--button">
            <a class="btn btn-primary <?php echo esc_attr($item_highlight); ?>" <?php ct_print_html($widget->get_render_attribute_string( 'button' )); ?>><?php echo esc_attr($button_text); ?><i class="bravisicon-angle-arrow-right space-left"></i></a>
        </div>
    <?php endif; ?>
</div>