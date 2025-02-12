<?php
$default_settings = [
    'ct_icon' => '',
    'title' => '',
    'desc' => '',
    'ct_animate' => '',
    'ct_animate_delay' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);

if ( ! empty( $link['url'] ) ) {
    $widget->add_render_attribute( 'link', 'href', $link['url'] );

    if ( $link['is_external'] ) {
        $widget->add_render_attribute( 'link', 'target', '_blank' );
    }

    if ( $link['nofollow'] ) {
        $widget->add_render_attribute( 'link', 'rel', 'nofollow' );
    }
}

$is_new = \Elementor\Icons_Manager::is_migration_allowed();

?>
<div class="ct-info-box ct-info-box1 <?php echo esc_attr($ct_animate); ?>" data-wow-delay="<?php echo esc_attr($ct_animate_delay); ?>ms">
	<?php if(!empty($ct_icon)): ?>
		<div class="ct-info-icon">
	        <?php
	        if($is_new):
	            \Elementor\Icons_Manager::render_icon( $ct_icon, [ 'aria-hidden' => 'true' ] );
	        ?>
	        <?php
	        else:
	            $widget->add_render_attribute( 'i', 'class', $ct_icon );
	            $widget->add_render_attribute( 'i', 'aria-hidden', 'true' );
	        ?>
	            <i <?php ct_print_html($widget->get_render_attribute_string( 'i' )); ?>></i>
	        <?php endif; ?>
        </div>
    <?php endif; ?>
	<div class="ct-info-holder">
		<h4 class="ct-info-title"><?php echo esc_attr($title); ?></h4>
		<div class="ct-info-desc"><?php echo esc_attr($desc); ?></div>
	</div>
</div>