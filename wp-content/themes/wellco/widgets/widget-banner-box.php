<?php

class CT_Banner_Box extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'ct_wg_bannerbox',
            esc_html__('* Banner Box', 'wellco'),
            array('description' => esc_html__('Banner Box Widget', 'wellco'),)
        );
    }

    function widget($args, $instance)
    {

        extract($args);

        $wg_title = isset($instance['wg_title']) ? (!empty($instance['wg_title']) ? $instance['wg_title'] : '') : '';
        $background_img_id = isset($instance['background_img']) ? (!empty($instance['background_img']) ? $instance['background_img'] : '') : '';
        $background_img_url = wp_get_attachment_image_url($background_img_id, '');
        $wg_btn_text = isset($instance['wg_btn_text']) ? (!empty($instance['wg_btn_text']) ? $instance['wg_btn_text'] : '') : '';
        $wg_btn_link = isset($instance['wg_btn_link']) ? (!empty($instance['wg_btn_link']) ? $instance['wg_btn_link'] : '') : '';
        
        ?>
        <div class="ct-wg-bannerbox1 widget">
            <div class="ct-wg-bannerbox-inner bg-image" style="background-image: url('<?php echo esc_url($background_img_url)?>');">

                <?php if (!empty($wg_title)) : ?>
                    <h3 class="wg-title"><?php echo esc_html($wg_title); ?></h3>
                <?php endif; ?>

                <?php if (!empty($wg_btn_text)): ?>
                    <a class="btn" href="<?php echo esc_url($wg_btn_link); ?>">
                        <?php echo wp_kses_post($wg_btn_text); ?>
                        <i class="bravisicon-angle-arrow-right"></i>
                    </a>
                <?php endif; ?>
                
            </div>
        </div>
        <?php
    }

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['wg_title'] = strip_tags($new_instance['wg_title']);
        $instance['wg_btn_text'] = strip_tags($new_instance['wg_btn_text']);
        $instance['wg_btn_link'] = strip_tags($new_instance['wg_btn_link']);
        $instance['background_img'] = strip_tags($new_instance['background_img']);
        return $instance;
    }

    function form($instance)
    {
        $wg_title = isset($instance['wg_title']) ? esc_attr($instance['wg_title']) : '';
        $wg_btn_text = isset($instance['wg_btn_text']) ? esc_attr($instance['wg_btn_text']) : '';
        $wg_btn_link = isset($instance['wg_btn_link']) ? esc_attr($instance['wg_btn_link']) : '';
        $background_img = isset($instance['background_img']) ? esc_attr($instance['background_img']) : '';
        ?>

        <div class="ct-wg-image-wrap" style="margin-top: 15px;">
            <label style="margin-top: 4px;" for="<?php echo esc_url($this->get_field_id('background_img')); ?>"><?php esc_html_e('Box Background Image', 'wellco'); ?></label>
            <input type="hidden" class="widefat hide-image-url"
                   id="<?php echo esc_attr($this->get_field_id('background_img')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('background_img')); ?>"
                   value="<?php echo esc_attr($background_img) ?>"/>
            <div class="ct-wg-show-image">
                <?php
                if ($background_img != "") {
                    ?>
                    <img style="max-width: 110px;" src="<?php echo wp_get_attachment_image_url($background_img) ?>">
                    <?php
                }
                ?>
            </div>
            <?php
            if ($background_img != "") {
                ?>
                <a href="#" class="ct-wg-select-image button" style="display: none;"><?php esc_html_e('Select Image', 'wellco'); ?></a>
                <a href="#" class="ct-wg-remove-image button"><?php esc_html_e('Remove Image', 'wellco'); ?></a>
                <?php
            } else {
                ?>
                <a href="#" class="ct-wg-select-image button"><?php esc_html_e('Select Image', 'wellco'); ?></a>
                <a href="#" class="ct-wg-remove-image button" style="display: none;"><?php esc_html_e('Remove Image', 'wellco'); ?></a>
                <?php
            }
            ?>
        </div>
        
        <p>
            <label for="<?php echo esc_url($this->get_field_id('wg_title')); ?>"><?php esc_html_e('Title', 'wellco'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('wg_title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('wg_title')); ?>" type="text"
                   value="<?php echo esc_attr($wg_title); ?>"/></p>

        <p>
            <label for="<?php echo esc_url($this->get_field_id('wg_btn_text')); ?>"><?php esc_html_e('Button Text', 'wellco'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('wg_btn_text')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('wg_btn_text')); ?>" type="text"
                   value="<?php echo esc_attr($wg_btn_text); ?>"/></p>

        <p>
            <label for="<?php echo esc_url($this->get_field_id('wg_btn_link')); ?>"><?php esc_html_e('Button Link', 'wellco'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('wg_btn_link')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('wg_btn_link')); ?>" type="text"
                   value="<?php echo esc_attr($wg_btn_link); ?>"/></p>

        <?php
    }

}
function register_fancybox_widget() {
    if(function_exists('ct_register_wp_widget')){
        ct_register_wp_widget( 'CT_Banner_Box' );
    }
}
add_action('widgets_init', 'register_fancybox_widget');

?>