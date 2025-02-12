<?php
if ( ! class_exists( 'LearnPress' ) ) return;

/**
 *
 * @package Bravis-Themes
 * @subpackage Wellco
 * @since 1.0.0
 */

/**
 * Remove  LearnPress template hooks
 */
function wellco_remove_learnpress_hooks() {
	remove_action( 'learn-press/before-main-content', LP()->template( 'general' )->func( 'breadcrumb' ) );
	remove_action( 'learn-press/course-summary-sidebar', LP()->template( 'course' )->func( 'course_sidebar_preview' ), 10 );
	remove_action( 'learn-press/course-summary-sidebar', LP()->template( 'course' )->func( 'course_featured_review' ), 20 );
	LP()->template( 'course' )->remove_callback( 'learn-press/course-content-summary', 'single-course/meta-primary', 10 );
	LP()->template( 'course' )->remove_callback( 'learn-press/course-content-summary', 'single-course/meta-secondary', 10 );
	LP()->template( 'course' )->remove_callback( 'learn-press/course-content-summary', 'single-course/title', 10 );
}
add_action( 'init', 'wellco_remove_learnpress_hooks' );

/**
 * Get Course Category
*/
function wellco_get_the_category( $post_id = false ) {
    $categories = get_the_terms( $post_id, 'course_category' );
    if ( ! $categories || is_wp_error( $categories ) ) {
        $categories = array();
    }
 
    $categories = array_values( $categories );
 
    foreach ( array_keys( $categories ) as $key ) {
        _make_cat_compat( $categories[ $key ] );
    }
 
    /**
     * Filters the array of categories to return for a post.
     *
     * @since 3.1.0
     * @since 4.4.0 Added `$post_id` parameter.
     *
     * @param WP_Term[] $categories An array of categories to return for the post.
     * @param int|false $post_id    ID of the post.
     */
    return apply_filters( 'get_the_categories', $categories, $post_id );
}

/**
 * Single Header
 */

add_action( 'learn-press/course-content-summary', 'wellco_single_course_header', 50 );
function wellco_single_course_header() { 
	$course = LP_Global::course();
	?>
	<div class="sg-course-header">
		<h3 class="br-item--title">
			<?php echo the_title(); ?>
		</h3>
		<div class="br-item--meta">
			<div class="br-item--author">
				<?php echo ''.$course->get_instructor()->get_profile_picture(); ?>
				<span><?php echo ''.$course->get_instructor_html(); ?></span>
			</div>
			<div class="br-item--category">
				<i class="bravisicon-tags-alt"></i>
				<?php
					if ( ! get_the_terms( get_the_ID(), 'course_category' ) ) {
						esc_html_e( 'Uncategorized', 'wellco' );
					} else {
						echo get_the_term_list( get_the_ID(), 'course_category', '', '<span>,</span>' );
					}
				?>
			</div>
		</div>
		<?php if (has_post_thumbnail()) {
            echo '<div class="br-item--featured">'; ?>
                <?php the_post_thumbnail('wellco-single-course'); ?>
            <?php echo '</div>';
        } ?>
	</div>
<?php }

/**
 * Single Sidebar Top
 */
add_action( 'learn-press/course-summary-sidebar', 'wellco_single_course_sidebar_top', 5 );
function wellco_single_course_sidebar_top() { 
	$course = LP_Global::course();
	$lessons = $course->get_items( LP_LESSON_CPT );
	$quizzes = $course->get_items( LP_QUIZ_CPT );
	$lessons  = count( $lessons );
	$quizzes  = count( $quizzes );
	$students = $course->count_students();
	$level = learn_press_get_post_level( get_the_ID() );
	$price = $course->get_price_html();
	?>
	<div class="sg-course-sidebar-top">
		<div class="br-sidebar-meta">
			<div class="br-meta--item br-meta--price">
				<div class="br-item--label">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><path d="M291 244l-72-21.9c-9-2.8-15.2-12.1-15.2-22.7 0-12.9 9.2-23.4 20.5-23.4h45c7 0 13.8 1.9 19.9 5.4 6.4 3.7 14.3 3.4 19.7-1.6l12-11.3c7.6-7.2 6.3-19.4-2.3-25.2-13.8-9.3-29.9-14.5-46.4-15.1V112c0-8.8-7.2-16-16-16h-16c-8.8 0-16 7.2-16 16v16c-37.6.1-68.2 32.1-68.2 71.4 0 31.5 20.2 59.7 49.2 68.6l72 21.9c9 2.8 15.2 12.1 15.2 22.7 0 12.9-9.2 23.4-20.5 23.4h-45c-7 0-13.8-1.9-19.9-5.4-6.4-3.7-14.3-3.4-19.7 1.6l-12 11.3c-7.6 7.2-6.3 19.4 2.3 25.2 13.8 9.3 29.9 14.5 46.4 15.1V400c0 8.8 7.2 16 16 16h16c8.8 0 16-7.2 16-16v-16c37.6-.1 68.2-32.1 68.2-71.4 0-31.5-20.2-59.7-49.2-68.6zM248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 448c-110.3 0-200-89.7-200-200S137.7 56 248 56s200 89.7 200 200-89.7 200-200 200z"/></svg>
					<?php echo esc_html__('Giá khóa học', 'wellco') ?>
				</div>
				<div class="br-item--value">
					<div class="course-price">
						<?php if ( $course->has_sale_price() ) : ?>
							<span class="origin-price"> <?php echo ''.$course->get_origin_price_html(); ?></span>
						<?php endif; ?>
						<span class="price"><?php echo ''.$price; ?></span>
					</div>
				</div>
			</div>
			<div class="br-meta--item">
				<div class="br-item--label">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><path d="M248 104c-53 0-96 43-96 96s43 96 96 96 96-43 96-96-43-96-96-96zm0 144c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm0-240C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 448c-49.7 0-95.1-18.3-130.1-48.4 14.9-23 40.4-38.6 69.6-39.5 20.8 6.4 40.6 9.6 60.5 9.6s39.7-3.1 60.5-9.6c29.2 1 54.7 16.5 69.6 39.5-35 30.1-80.4 48.4-130.1 48.4zm162.7-84.1c-24.4-31.4-62.1-51.9-105.1-51.9-10.2 0-26 9.6-57.6 9.6-31.5 0-47.4-9.6-57.6-9.6-42.9 0-80.6 20.5-105.1 51.9C61.9 339.2 48 299.2 48 256c0-110.3 89.7-200 200-200s200 89.7 200 200c0 43.2-13.9 83.2-37.3 115.9z"/></svg>
					<?php echo esc_html__('Huấn luyện viên', 'wellco') ?>
				</div>
				<div class="br-item--value">
					<?php echo ''.$course->get_instructor_html(); ?>
				</div>
			</div>
			<div class="br-meta--item">
				<div class="br-item--label">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"/></svg>
					<?php echo esc_html__('Thời lượng', 'wellco') ?>
				</div>
				<div class="br-item--value">
					<?php echo learn_press_get_post_translated_duration( get_the_ID(), esc_html__( 'Lifetime access', 'wellco' ) ); ?>
				</div>
			</div>
			<div class="br-meta--item">
				<div class="br-item--label">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M128 152v-32c0-4.4 3.6-8 8-8h208c4.4 0 8 3.6 8 8v32c0 4.4-3.6 8-8 8H136c-4.4 0-8-3.6-8-8zm8 88h208c4.4 0 8-3.6 8-8v-32c0-4.4-3.6-8-8-8H136c-4.4 0-8 3.6-8 8v32c0 4.4 3.6 8 8 8zm299.1 159.7c-4.2 13-4.2 51.6 0 64.6 7.3 1.4 12.9 7.9 12.9 15.7v16c0 8.8-7.2 16-16 16H80c-44.2 0-80-35.8-80-80V80C0 35.8 35.8 0 80 0h352c8.8 0 16 7.2 16 16v368c0 7.8-5.5 14.2-12.9 15.7zm-41.1.3H80c-17.6 0-32 14.4-32 32 0 17.7 14.3 32 32 32h314c-2.7-17.3-2.7-46.7 0-64zm6-352H80c-17.7 0-32 14.3-32 32v278.7c9.8-4.3 20.6-6.7 32-6.7h320V48z"/></svg>
					<?php echo esc_html__('Số buổi học', 'wellco') ?>
				</div>
				<div class="br-item--value">
					<?php echo esc_attr($lessons); ?> 
					<?php echo esc_html__('buổi', 'wellco'); ?>
				</div>
			</div>
			<div class="br-meta--item d-none">
				<div class="br-item--label">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 448c-110.532 0-200-89.431-200-200 0-110.495 89.472-200 200-200 110.491 0 200 89.471 200 200 0 110.53-89.431 200-200 200zm107.244-255.2c0 67.052-72.421 68.084-72.421 92.863V300c0 6.627-5.373 12-12 12h-45.647c-6.627 0-12-5.373-12-12v-8.659c0-35.745 27.1-50.034 47.579-61.516 17.561-9.845 28.324-16.541 28.324-29.579 0-17.246-21.999-28.693-39.784-28.693-23.189 0-33.894 10.977-48.942 29.969-4.057 5.12-11.46 6.071-16.666 2.124l-27.824-21.098c-5.107-3.872-6.251-11.066-2.644-16.363C184.846 131.491 214.94 112 261.794 112c49.071 0 101.45 38.304 101.45 88.8zM298 368c0 23.159-18.841 42-42 42s-42-18.841-42-42 18.841-42 42-42 42 18.841 42 42z"/></svg>
					<?php echo esc_html__('Question', 'wellco') ?>
				</div>
				<div class="br-item--value">
					<?php echo esc_attr($quizzes); ?> 
					<?php if($quizzes > 1) {
						echo esc_html__('Quizzes', 'wellco');
					} else {
						echo esc_html__('Quizze', 'wellco');
					}?>
				</div>
			</div>
			<div class="br-meta--item">
				<div class="br-item--label">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M13.2 100l6.8 2v37.6c-7 4.2-12 11.5-12 20.3 0 8.4 4.6 15.4 11.1 19.7L3.5 242c-1.7 6.9 2.1 14 7.6 14h41.8c5.5 0 9.3-7.1 7.6-14l-15.6-62.3C51.4 175.4 56 168.4 56 160c0-8.8-5-16.1-12-20.3v-30.5L90.6 123C84 139.4 80 157.2 80 176c0 79.5 64.5 144 144 144s144-64.5 144-144c0-18.8-4-36.6-10.6-53l77.4-23c17.6-5.2 17.6-34.8 0-40L240.9 2.5C235.3.8 229.7 0 224 0s-11.3.8-16.9 2.5L13.2 60c-17.6 5.2-17.6 34.8 0 40zM224 272c-52.9 0-96-43.1-96-96 0-14.1 3.3-27.3 8.8-39.3l70.4 20.9c14.8 4.4 27.2 2 33.8 0l70.4-20.9c5.5 12 8.8 25.3 8.8 39.3-.2 52.9-43.3 96-96.2 96zm-3.2-223.5c1-.3 3.3-.9 6.5 0L333.5 80l-106.3 31.5c-2.1.6-4.2.7-6.5 0L114.5 80l106.3-31.5zm98.6 272.1L224 400l-95.4-79.4C57.1 323.7 0 382.2 0 454.4v9.6c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-9.6c0-72.2-57.1-130.7-128.6-133.8zM200 464H48v-9.6c0-40.4 27.9-74.4 66-83.5l86 71.6V464zm200 0H248v-21.5l86-71.6c38.1 9.1 66 43.1 66 83.5v9.6z"/></svg>
					<?php echo esc_html__('Đã đăng ký', 'wellco') ?>
				</div>
				<div class="br-item--value">
					<?php echo esc_attr($students); ?> 
					<?php echo esc_html__('Học viên', 'wellco');?>
				</div>
			</div>
			<div class="br-meta--item br-meta--level">
				<div class="br-item--label">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M216 288h-48c-8.84 0-16 7.16-16 16v192c0 8.84 7.16 16 16 16h48c8.84 0 16-7.16 16-16V304c0-8.84-7.16-16-16-16zM88 384H40c-8.84 0-16 7.16-16 16v96c0 8.84 7.16 16 16 16h48c8.84 0 16-7.16 16-16v-96c0-8.84-7.16-16-16-16zm256-192h-48c-8.84 0-16 7.16-16 16v288c0 8.84 7.16 16 16 16h48c8.84 0 16-7.16 16-16V208c0-8.84-7.16-16-16-16zm128-96h-48c-8.84 0-16 7.16-16 16v384c0 8.84 7.16 16 16 16h48c8.84 0 16-7.16 16-16V112c0-8.84-7.16-16-16-16zM600 0h-48c-8.84 0-16 7.16-16 16v480c0 8.84 7.16 16 16 16h48c8.84 0 16-7.16 16-16V16c0-8.84-7.16-16-16-16z"/></svg>
					<?php echo esc_html__('Yêu cầu kỹ năng', 'wellco') ?>
				</div>
				<div class="br-item--value">
					<?php echo esc_html( $level ); ?>
				</div>
			</div>

		</div>
		<?php $ct_the_excerpt = get_the_excerpt();
        if(!empty($ct_the_excerpt)) { ?>
        	<div class="br-sidebar-excerpt">
            	<?php echo esc_html($ct_the_excerpt); ?>
            </div>
        <?php } ?>
		<div class="br-sidebar-button">
			<?php LP()->template( 'course' )->course_buttons(); ?>
		</div>
	</div>
<?php }


add_action( 'learn-press/course-content-summary', 'wellco_single_course_footer', 500 );
function wellco_single_course_footer() { 
	$sg_course_related = wellco_get_opt( 'sg_course_related', false );
	$sg_course_cta = wellco_get_opt( 'sg_course_cta', false );
	$sg_course_cta_text = wellco_get_opt( 'sg_course_cta_text' );
	$sg_course_related_subtitle = wellco_get_opt( 'sg_course_related_subtitle' );
	$sg_course_related_title = wellco_get_opt( 'sg_course_related_title' );
	?>
	<div class="sg-course-footer">
		<?php if($sg_course_cta && !empty($sg_course_cta_text)) : ?>
			<div class="sg-course-cta">
				<div class="sg-course-cta--inner">
					<?php echo ct_print_html($sg_course_cta_text); ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if($sg_course_related && !empty($sg_course_related_title)) : ?>
			<div class="sg-course-related-post">
				<div class="row">
					<div class="container">
						<div class="sg-course-related--inner">
							<div class="sg-course-related--header">
								<div class="ct-heading h-align-center item-st-default">
									<?php if(!empty($sg_course_related_subtitle)) : ?>
										<div class="item--sub-title style-default">
											<span>
												<i class="fas fa-book"></i>
												<?php echo ct_print_html($sg_course_related_subtitle); ?>
											</span>
										</div>
									<?php endif; ?>
									<h3 class="item--title case-animate-time st-default ">
										<span><?php echo ct_print_html($sg_course_related_title); ?></span>
									</h3>
								</div>
							</div>
							<div class="sg-course-related--primary">
								<div class="ct-grid ct-course ct-course-grid1">
									<div class="ct-grid-inner row">
										<?php 
											global $post;
										    $current_id = $post->ID;
										    $posttags = wellco_get_the_category($post->ID);
										    if (empty($posttags)) return;
										    $tags = array();
										    foreach ($posttags as $tag) {
										        $tags[] = $tag->term_id;
										    }
										    $post_number = '4';
										    $query_similar = new WP_Query(array('posts_per_page' => $post_number, 'post_type' => 'lp_course', 'post_status' => 'publish', 'category__in' => ''));
										    $course = learn_press_get_course( $post->ID );
										    if (count($query_similar->posts) > 1) { ?>
										        <?php foreach ($query_similar->posts as $post):
						                            if ($post->ID !== $current_id) : ?>
						                                <div class="grid-item col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
						                                    <div class="grid-item-inner">
						                                        <?php if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) : ?>
						                                            <div class="item--featured">
						                                            	<div class="item--price">
								                                            <?php echo ''.$course->get_price_html(); ?>
								                                        </div>
						                                                <a href="<?php echo esc_url( get_permalink()); ?>" >
						                                                	<?php the_post_thumbnail('wellco-related-course'); ?>
						                                                </a>
						                                            </div>
						                                        <?php endif; ?>
						                                        <div class="item--holder">
						                                        	<a class="item--readmore" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><i class="bravisicon-angle-arrow-right"></i></a>
						                                        	<div class="item--category">
								                                        <?php the_terms( $post->ID, 'course_category', '', ' ' ); ?>
								                                    </div>
						                                            <h3 class="item--title">
						                                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
						                                            </h3>
						                                            <div class="item--author">
								                                        <?php echo ''.$course->get_instructor()->get_profile_picture(); ?>
								                                        <?php echo ''.$course->get_instructor_html(); ?>
								                                    </div>
						                                        </div>
						                                    </div>
						                                </div>
						                            <?php endif;
						                        endforeach; ?>
										    <?php }
										    wp_reset_postdata();
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
<?php }

add_action( 'learn-press/after-course-instructor-socials', 'wellco_single_course_socials', 500 );
function wellco_single_course_socials() { 
	$course     = LP_Global::course();
	$instructor = $course->get_instructor();
	$socials = $instructor->get_profile_socials( $instructor->get_id() );
	if ( $socials ) : ?>
		<div class="sg-author-socials">
			<?php echo implode( '', $socials ); ?>
		</div>
	<?php endif;
}