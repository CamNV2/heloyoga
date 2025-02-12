<?php
$primary_color = wellco_get_opt( 'primary_color' );
$default_settings = [
    'title' => '',
    'description' => '',
    'percentage_value' => '',
    'bar_color' => '',
    'track_color' => '',
    'chart_size' => '',
    'chart_border_width' => '',
    'image' => '',
    'ct_animate' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
if(!empty($image['id'])) : 
    $img  = ct_get_image_by_size( array(
        'attach_id'  => $image['id'],
        'thumb_size' => 'full',
    ) );
    $thumbnail    = $img['thumbnail'];
?>
<div class="ct-piechart-box">
    <div class="ct-piechart-image">
        <?php echo ct_print_html($thumbnail); ?>
    </div>
    <?php endif; ?>

    <div class="ct-piechart ct-piechart-layout1 <?php echo esc_attr($ct_animate); ?>" data-wow-delay="<?php echo esc_attr($settings['ct_animate_delay']); ?>ms">
        <div class="item--value percentage" style="min-height: <?php echo esc_attr($chart_size['size']); ?>px;" data-size="<?php echo esc_attr($chart_size['size']); ?>" data-bar-color="<?php if(!empty($bar_color)) { echo esc_attr($bar_color); } else { echo esc_attr($primary_color); } ?>" data-track-color="<?php if(!empty($track_color)) { echo esc_attr($track_color); } else { echo '#edf2ff'; } ?>" data-line-width="<?php echo esc_attr($chart_border_width['size']); ?>" data-percent="-<?php echo esc_attr($percentage_value); ?>">
            <span><?php echo esc_attr($percentage_value); ?><i>%</i></span>
        </div>
        <div class="item--title"><?php echo ct_print_html($title); ?></div>
    </div>
<?php if(!empty($image['id'])) : ?></div><?php endif; ?>