<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Wellco
 */
$archive_categories_on = wellco_get_opt( 'archive_categories_on', false );
$archive_readmore_text = wellco_get_opt( 'archive_readmore_text' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('single-hentry archive'); ?>>
    
    <?php if (has_post_thumbnail()) {
        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
        echo '<div class="entry-featured image-effect-white">'; ?>
            <a href="<?php echo esc_url( get_permalink()); ?>"><?php the_post_thumbnail('full'); ?></a>
        <?php echo '</div>';
    } ?>
    <div class="entry-body">
        <?php wellco_archive_meta(); ?>
        <h2 class="entry-title">
            <a href="<?php echo esc_url( get_permalink()); ?>" title="<?php the_title_attribute(); ?>">
                <?php if(is_sticky()) { ?>
                    <i class="bravisicon-tick"></i>
                <?php } ?>
                <?php the_title(); ?>
            </a>
        </h2>
        <div class="entry-excerpt">
            <?php
                wellco_entry_excerpt();
                wp_link_pages( array(
                    'before'      => '<div class="page-links">',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                ) );
            ?>
        </div>
        <div class="entry-holder">
            <div class="entry-readmore">
                <a class="btn btn-gray" href="<?php echo esc_url( get_permalink()); ?>">
                    <span><?php if(!empty($archive_readmore_text)) { echo esc_attr($archive_readmore_text); } else { echo esc_html__('Read more', 'wellco'); } ?></span>
                    <i class="bravisicon-angle-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</article><!-- #post -->