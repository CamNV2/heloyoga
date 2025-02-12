<?php
$default_settings = [
    'title' => '',
    'title_tag' => 'h3',
    'style' => 'st-default',
    'sub_title' => '',
    'sub_title_style' => '',
    'text_align' => '',
    'ct_animate' => '',
    'ct_animate_delay' => '',
    'selected_icon' => '',
    'ct_icon' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings); 
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
$widget->add_render_attribute( 'selected_icon', 'class' );
$has_icon = ! empty( $selected_icon );
if ( $has_icon ) {
    $widget->add_render_attribute( 'i', 'class', $selected_icon );
    $widget->add_render_attribute( 'i', 'aria-hidden', 'true' );
}
?>
<div class="ct-heading h-align-<?php echo esc_attr($text_align); ?> item-<?php echo esc_attr($style); ?>">
    <div class="ct-heading--inner">
    	<?php if(!empty($sub_title)) : ?>
    		<div class="item--sub-title <?php echo esc_attr($sub_title_style); ?>">
                <span>
                    <?php if($is_new):
                        \Elementor\Icons_Manager::render_icon( $selected_icon, [ 'aria-hidden' => 'true' ] );
                        else: ?>
                        <i <?php ct_print_html($widget->get_render_attribute_string( 'i' )); ?>></i>
                    <?php endif; ?>
                    <?php echo esc_attr($sub_title); ?>
                </span>
            </div>
    	<?php endif; ?>
        <<?php echo esc_attr($title_tag); ?> class="item--title <?php echo esc_attr($style); ?> <?php if($ct_animate != 'case-fade-in-up') { echo esc_attr($ct_animate).' wow '; } else { echo 'case-animate-time'; } ?>" data-wow-delay="<?php echo esc_attr($ct_animate_delay); ?>ms">
            <?php if($ct_animate == 'case-fade-in-up') {
                $arr_str = explode(' ', $title);
                foreach ($arr_str as $index => $value) {
                    $arr_str[$index] = '<span class="slide-in-container"><span class="d-inline-block wow '.$ct_animate.'">' . $value . '</span></span>';
                }
                $str = implode(' ', $arr_str);
                echo ct_print_html($str);
            } else {
                echo '<span>';
                echo wp_kses_post($title);
                echo '</span>';
            } ?>
        </<?php echo esc_attr($title_tag); ?>>
    </div>
</div>

