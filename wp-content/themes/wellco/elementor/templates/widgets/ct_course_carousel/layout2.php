<?php

$html_id = ct_get_element_id($settings);
$source = $widget->get_setting('source', '');
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$post_ids = $widget->get_setting('post_ids', '');
extract(ct_get_posts_of_grid('lp_course', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
]));

$widget->add_render_attribute( 'inner', [
    'class' => 'ct-carousel-inner',
] );

$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');


$drap = $widget->get_setting('drap');
$arrows = $widget->get_setting('arrows');
$dots = $widget->get_setting('dots');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite');
$speed = $widget->get_setting('speed', '500');

$show_price = $widget->get_setting('show_price');
$show_category = $widget->get_setting('show_category');
$show_button = $widget->get_setting('show_button');
$img_size = $widget->get_setting('img_size');

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
    'data-infinite' => $infinite,
    'data-speed' => $speed,
    'data-dir' => $carousel_dir,
    'data-colxs' => $col_xs,
    'data-colsm' => $col_sm,
    'data-colmd' => $col_md,
    'data-collg' => $col_lg,
    'data-colxl' => $col_xl,
    'data-slidesToScroll' => $slides_to_scroll,
] );

$title_tag = $widget->get_setting('title_tag', 'h3');

$image_size = '600x520';
if(!empty($img_size)) {
   $image_size = $img_size;
}

?>
<?php if (is_array($posts)): ?>

<div id="<?php echo esc_attr($html_id) ?>" class="ct-course ct-course-carousel2 ct-slick-slider" <?php if($drap) : ?>data-cursor-drap="DRAG"<?php endif; ?>>
    <div <?php ct_print_html($widget->get_render_attribute_string( 'inner' )); ?>>
        <div <?php ct_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>

        <?php
            foreach ($posts as $post):
            $img_id       = get_post_thumbnail_id( $post->ID );
            $author = get_user_by('id', $post->post_author); 
            if ( class_exists( 'LearnPress' ) ) : 
                $course = learn_press_get_course( $post->ID ); ?>
                <div class="carousel-item slick-slide">
                    <div class="grid-item-inner <?php echo esc_attr($settings['ct_animate']); ?>">
                        <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                            $img          = ct_get_image_by_size( array(
                                'attach_id'  => $img_id,
                                'thumb_size' => $image_size,
                            ) );
                            $thumbnail    = $img['thumbnail'];
                            ?>
                            <div class="item--featured">
                                <?php if($show_price == 'true'): ?>
                                    <div class="item--price">
                                        <?php echo ''.$course->get_price_html(); ?>
                                    </div>
                                <?php endif; ?>
                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo ct_print_html($thumbnail); ?></a>
                            </div>
                        <?php endif; ?>
                        <div class="item--holder">
                            <?php if($show_category == 'true'): ?>
                                <div class="item--category">
                                    <?php the_terms( $post->ID, 'course_category', '', ' ' ); ?>
                                </div>
                            <?php endif; ?>
                            <h3 class="item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h3>
                            <?php if($show_button == 'true') : ?>
                                <a class="item--readmore btn-text-effect1" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                    <span><?php echo esc_html__('Read More', 'wellco'); ?></span>
                                    <i class="bravisicon-angle-arrow-right"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>