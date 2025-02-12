<?php
$widget->add_render_attribute( 'inner', [
    'class' => 'ct-carousel-inner',
] );

$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');

$arrows = $widget->get_setting('arrows');
$drap = $widget->get_setting('drap');
$dots = $widget->get_setting('dots');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay', '');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$speed = $widget->get_setting('speed', '500');
if (is_rtl()) {
    $carousel_dir = 'true';
} else {
    $carousel_dir = 'false';
}
$widget->add_render_attribute( 'carousel', [
    'class' => 'ct-slick-carousel',
    'data-arrows' => $arrows,
    'data-dots' => $dots,
    'data-pauseOnHover' => $pause_on_hover,
    'data-autoplay' => $autoplay,
    'data-autoplaySpeed' => $autoplay_speed,
    'data-infinite' => 'false',
    'data-speed' => $speed,
    'data-colxs' => 1,
    'data-colsm' => 1,
    'data-colmd' => 1,
    'data-collg' => 1,
    'data-colxl' => 1,
    'data-dir' => $carousel_dir,
    'data-slidesToScroll' => 1,
] );
?>
<?php if(isset($settings['testimonial']) && !empty($settings['testimonial']) && count($settings['testimonial'])): ?>
    <div class="ct-testimonial ct-testimonial-carousel2 ct-slick-slider" <?php if($drap) : ?>data-cursor-drap="DRAG"<?php endif; ?>>
        <div class="ct-testimonial-inner">
            <div <?php ct_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <?php foreach ($settings['testimonial'] as $value): 
                    $description = isset($value['description']) ? $value['description'] : '';
                    ?>
                        <div class="slick-slide">
                            <div class="item--inner <?php echo esc_attr($settings['ct_animate']); ?>">
                                <div class="item--description">
                                    <?php echo ct_print_html($description); ?>
                                </div>
                           </div>
                        </div>
                <?php endforeach; ?>
            </div>
            <div class="ct-slick-nav" data-dir="<?php echo esc_attr($carousel_dir); ?>" data-nav="1" data-infinite="false" data-dots="<?php echo esc_attr($dots); ?>">
                <?php foreach ($settings['testimonial'] as $value_nav): 
                    $title = isset($value_nav['title']) ? $value_nav['title'] : '';
                    $position = isset($value_nav['position']) ? $value_nav['position'] : '';
                    $image = isset($value_nav['image']) ? $value_nav['image'] : '';
                    ?>
                        <div class="slick-slide">
                            <div class="item--inner <?php echo esc_attr($settings['ct_animate']); ?>">
                                <div class="item--holder">
                                    <?php if(!empty($image['id'])) { 
                                        $img = ct_get_image_by_size( array(
                                            'attach_id'  => $image['id'],
                                            'thumb_size' => '76x76',
                                        ));
                                        $thumbnail = $img['thumbnail']; 
                                        ?>
                                        <div class="item--image">
                                            <?php echo wp_kses_post($thumbnail); ?>
                                        </div>
                                    <?php } ?>
                                    <div class="item--meta">
                                        <h3 class="item--title">    
                                            <?php echo esc_attr($title); ?>
                                        </h3>
                                        <div class="item--position"><?php echo esc_attr($position); ?></div>
                                    </div>
                                </div>
                           </div>
                        </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>