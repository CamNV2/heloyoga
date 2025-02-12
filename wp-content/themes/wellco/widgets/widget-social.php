<?php
class CS_Social_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'cs_social_widget', // Base ID
            esc_html__('* Social', 'wellco'), // Name
            array('description' => esc_html__('Social Widget', 'wellco'),) // Args
        );
    }

    function widget($args, $instance) {
        global $woocommerce;

        extract($args);
        if (!empty($instance['title'])) {
            $title = apply_filters('widget_title', empty($instance['title']) ? esc_html__('Social', 'wellco' ) : $instance['title'], $instance, $this->id_base);
        }

        $icon_facebook = 'bravisicon-facebook';
        $link_facebook = isset($instance['link_facebook']) ? $instance['link_facebook'] : '';

        $icon_youtube = 'bravisicon-youtube';
        $link_youtube = isset($instance['link_youtube']) ? $instance['link_youtube'] : '';

        $icon_twitter = 'bravisicon-twitter';
        $link_twitter = isset($instance['link_twitter']) ? $instance['link_twitter'] : '';

        $icon_skype = 'bravisicon-skype';
        $link_skype = isset($instance['link_skype']) ? $instance['link_skype'] : '';

        $icon_dribbble = 'bravisicon-dribbble';
        $link_dribbble = isset($instance['link_dribbble']) ? $instance['link_dribbble'] : '';

        $icon_linkedin = 'bravisicon-linkedin';
        $link_linkedin = isset($instance['link_linkedin']) ? $instance['link_linkedin'] : '';

        $icon_vimeo = 'bravisicon-vimeo';
        $link_vimeo = isset($instance['link_vimeo']) ? $instance['link_vimeo'] : '';

        $icon_pinterest = 'bravisicon-pinterest';
        $link_pinterest = isset($instance['link_pinterest']) ? $instance['link_pinterest'] : '';

        $icon_instagram = 'bravisicon-instagram';
        $link_instagram = isset($instance['link_instagram']) ? $instance['link_instagram'] : '';

        echo wp_kses_post($args['before_widget']);

        if (!empty($title))
                echo ''.$before_title . $title . $after_title;

            echo "<ul class='ct-social'>";

            if ($link_facebook != '') {
                echo '<li><a class="social-facebook" target="_blank" href="'.esc_url($link_facebook).'"><i class="'.$icon_facebook.'"></i></a></li>';
            }

            if ($link_youtube != '') {
                echo '<li><a class="social-youtube" target="_blank" href="'.esc_url($link_youtube).'"><i class="'.$icon_youtube.'"></i></a></li>';
            }

            if ($link_twitter != '') {
                echo '<li><a class="social-twitter" target="_blank" href="'.esc_url($link_twitter).'"><i class="'.$icon_twitter.'"></i></a></li>';
            }

            if ($link_skype != '') {
                echo '<li><a class="social-skype" target="_blank" href="'.esc_url($link_skype).'"><i class="'.$icon_skype.'"></i></a></li>';
            }

            if ($link_dribbble != '') {
                echo '<li><a class="social-dribbble" target="_blank" href="'.esc_url($link_dribbble).'"><i class="'.$icon_dribbble.'"></i></a></li>';
            }

            if ($link_linkedin != '') {
                echo '<li><a class="social-linkedin" target="_blank" href="'.esc_url($link_linkedin).'"><i class="'.$icon_linkedin.'"></i></a></li>';
            }

            if ($link_vimeo != '') {
                echo '<li><a class="social-vimeo" target="_blank" href="'.esc_url($link_vimeo).'"><i class="'.$icon_vimeo.'"></i></a></li>';
            }

            if ($link_pinterest != '') {
                echo '<li><a class="social-pinterest" target="_blank" href="'.esc_url($link_pinterest).'"><i class="'.$icon_pinterest.'"></i></a></li>';
            }

            if ($link_instagram != '') {
                echo '<li><a class="social-instagram" target="_blank" href="'.esc_url($link_instagram).'"><i class="'.$icon_instagram.'"></i></a></li>';
            }

            echo "</ul>";

        echo wp_kses_post($args['after_widget']);
    }

    function update( $new_instance, $old_instance ) {
         $instance = $old_instance;
         $instance['title'] = strip_tags($new_instance['title']);

         $instance['link_facebook'] = strip_tags($new_instance['link_facebook']);

         $instance['link_youtube'] = strip_tags($new_instance['link_youtube']);

         $instance['link_twitter'] = strip_tags($new_instance['link_twitter']);

         $instance['link_skype'] = strip_tags($new_instance['link_skype']);

         $instance['link_dribbble'] = strip_tags($new_instance['link_dribbble']);

         $instance['link_linkedin'] = strip_tags($new_instance['link_linkedin']);

         $instance['link_vimeo'] = strip_tags($new_instance['link_vimeo']);

         $instance['link_pinterest'] = strip_tags($new_instance['link_pinterest']);

         $instance['link_instagram'] = strip_tags($new_instance['link_instagram']);

         return $instance;
    }

    function form( $instance ) {
         $title = isset($instance['title']) ? esc_attr($instance['title']) : '';

         $link_facebook = isset($instance['link_facebook']) ? esc_attr($instance['link_facebook']) : '';

         $link_youtube = isset($instance['link_youtube']) ? esc_attr($instance['link_youtube']) : '';

         $link_twitter = isset($instance['link_twitter']) ? esc_attr($instance['link_twitter']) : '';

         $link_skype = isset($instance['link_skype']) ? esc_attr($instance['link_skype']) : '';

         $link_dribbble = isset($instance['link_dribbble']) ? esc_attr($instance['link_dribbble']) : '';

         $link_linkedin = isset($instance['link_linkedin']) ? esc_attr($instance['link_linkedin']) : '';

         $link_vimeo = isset($instance['link_vimeo']) ? esc_attr($instance['link_vimeo']) : '';

         $link_pinterest = isset($instance['link_pinterest']) ? esc_attr($instance['link_pinterest']) : '';

         $link_instagram = isset($instance['link_instagram']) ? esc_attr($instance['link_instagram']) : '';

         ?>
         <p><label for="<?php echo esc_url($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title:', 'wellco' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_facebook')); ?>"><?php esc_html_e( 'Link Facebook:', 'wellco' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_facebook') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_facebook') ); ?>" type="text" value="<?php echo esc_attr( $link_facebook ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_youtube')); ?>"><?php esc_html_e( 'Link Youtube:', 'wellco' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_youtube') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_youtube') ); ?>" type="text" value="<?php echo esc_attr( $link_youtube ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_twitter')); ?>"><?php esc_html_e( 'Link Twitter:', 'wellco' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_twitter') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_twitter') ); ?>" type="text" value="<?php echo esc_attr( $link_twitter ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_skype')); ?>"><?php esc_html_e( 'Link Skype:', 'wellco' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_skype') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_skype') ); ?>" type="text" value="<?php echo esc_attr( $link_skype ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_dribbble')); ?>"><?php esc_html_e( 'Link Dribbble:', 'wellco' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_dribbble') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_dribbble') ); ?>" type="text" value="<?php echo esc_attr( $link_dribbble ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_linkedin')); ?>"><?php esc_html_e( 'Link Linkedin:', 'wellco' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_linkedin') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_linkedin') ); ?>" type="text" value="<?php echo esc_attr( $link_linkedin ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_vimeo')); ?>"><?php esc_html_e( 'Link Vimeo:', 'wellco' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_vimeo') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_vimeo') ); ?>" type="text" value="<?php echo esc_attr( $link_vimeo ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_pinterest')); ?>"><?php esc_html_e( 'Link Pinterest:', 'wellco' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_pinterest') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_pinterest') ); ?>" type="text" value="<?php echo esc_attr( $link_pinterest ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_instagram')); ?>"><?php esc_html_e( 'Link Instagram:', 'wellco' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_instagram') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_instagram') ); ?>" type="text" value="<?php echo esc_attr( $link_instagram ); ?>" /></p>
        
    <?php
    }

}

/**
* Class CS_Social_Widget
*/

function register_social_widget() {
    if(function_exists('ct_register_wp_widget')) {
        ct_register_wp_widget('CS_Social_Widget');
    }
}

add_action('widgets_init', 'register_social_widget');
?>