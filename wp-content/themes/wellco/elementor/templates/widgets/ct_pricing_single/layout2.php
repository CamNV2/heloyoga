<?php
$default_settings = [
    'title' => '',
    'sub_title' => '',
    'description_text' => '',
    'recommend_text' => '',
    'price' => '',
    'time' => '',
    'button_text' => '',
    'button_link' => '',
    'content_list' => '',
    'ct_animate' => '',
    'ct_animate_delay' => '',
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
?>
<div class="ct-pricing-single2 <?php echo esc_attr($ct_animate); ?>" data-wow-delay="<?php echo esc_attr($settings['ct_animate_delay']); ?>ms">
    <?php if(!empty($recommend_text)) : ?>
        <div class="pricing--recommend">
            <?php echo esc_attr($recommend_text); ?>
            <span class="pricing--dot"></span>
            <span class="pricing--dot"></span>
            <span class="pricing--dot"></span>
            <span class="pricing--dot"></span>
        </div>
    <?php endif; ?>
    <div class="pricing--meta">
    	<h5 class="pricing--title"><?php echo esc_attr($title); ?></h5>
        <div class="pricing--subtitle"><span><?php echo esc_attr($sub_title); ?></span></div>
        <div class="pricing--price"><?php echo ct_print_html($price); ?></div>
    </div>
    <?php if(!empty($time)) : ?>
        <div class="pricing--time"><?php echo esc_attr($time); ?></div>
    <?php endif; ?>
    <div class="pricing--holder">
        <div class="pricing--desc"><?php echo ct_print_html($description_text); ?></div>
        <?php if(isset($settings['content_list']) && !empty($settings['content_list']) && count($settings['content_list'])): ?>
            <ul class="pricing--feature">
                <?php
                    foreach ($settings['content_list'] as $key => $ct_list): ?>
                    <li class="<?php if($ct_list['active'] == 'yes') { echo 'active'; } ?>"><i class="flaticon-cancel"></i><?php echo ct_print_html($ct_list['content'])?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <?php if(!empty($button_text)) : ?>
            <div class="pricing--button">
                <a class="btn btn-reset" <?php ct_print_html($widget->get_render_attribute_string( 'button' )); ?>><?php echo esc_attr($button_text); ?></a>
            </div>
        <?php endif; ?>
    </div>
</div>