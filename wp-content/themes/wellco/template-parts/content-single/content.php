<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Wellco
 */
$post_tags_on = wellco_get_opt( 'post_tags_on', true );
$post_navigation_on = wellco_get_opt( 'post_navigation_on', false );
$post_social_share_on = wellco_get_opt( 'post_social_share_on', false );
$post_author_box_info = wellco_get_opt( 'post_author_box_info', false );
$post_title_pos = wellco_get_opt( 'post_title_pos', 'ptitle' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('single-hentry'); ?>>
    <div class="entry-blog">
        <?php if (has_post_thumbnail()) {
            echo '<div class="entry-featured">'; ?>
                <?php the_post_thumbnail('full'); ?>
            <?php echo '</div>';
        } ?>
        <div class="entry-body">

            <?php wellco_post_meta(); ?>

            <?php if($post_title_pos == 'pcontent') : ?>
                <h2 class="entry-title">
                    <?php the_title(); ?>
                </h2>
            <?php endif; ?>

            <div class="entry-content clearfix">
                <?php
                    the_content();
                    wp_link_pages( array(
                        'before'      => '<div class="page-links">',
                        'after'       => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                    ) );
                ?>
            </div>

        </div>
    </div>
    <?php if($post_tags_on || $post_social_share_on ) :  ?>
        <div class="entry-footer">
            <?php if($post_tags_on) { wellco_entry_tagged_in(); } ?>
            <?php if($post_social_share_on) { wellco_socials_share_default(); } ?>
        </div>
    <?php endif; ?>

    <?php if($post_author_box_info) : ?>
        <div class="entry-author-info">
            <div class="entry-author-avatar">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 160 ); ?>
            </div>
            <div class="entry-author-meta">
                <h3 class="author-name">
                    <?php the_author_posts_link(); ?>
                </h3>
                <div class="author-description">
                    <?php the_author_meta( 'description' ); ?>
                </div>
                <?php wellco_get_user_social(); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if($post_navigation_on) { wellco_post_nav_default(); } ?>
</article><!-- #post -->