<?php
$default_settings = [
    'wg_title' => '',
    'portfolio_content' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$has_icon = ! empty( $settings['ct_icon'] );
if ( $has_icon ) {
    $widget->add_render_attribute( 'i', 'class', $settings['ct_icon'] );
    $widget->add_render_attribute( 'i', 'aria-hidden', 'true' );
}
?>
<div class="ct-portfolio-detail">
    <?php if(!empty($wg_title)) : ?>
        <h4 class="wg-title"><?php echo esc_attr($wg_title); ?></h4>
    <?php endif; ?>
    <?php if(isset($portfolio_content) && !empty($portfolio_content) && count($portfolio_content)): ?>
        <div class="list--detail">
            <?php foreach ($portfolio_content as $key => $value):
                $label = isset($value['label']) ? $value['label'] : '';
                $content = isset($value['content']) ? $value['content'] : '';
                $content_type = isset($value['content_type']) ? $value['content_type'] : '';
                ?>
                <div class="item--detail">
                    <?php if(!empty($label)) : ?>
                        <label><?php echo esc_attr($label); ?></label>
                    <?php endif; ?>
                    <div class="item--content">
                        <?php 
                            switch ($content_type) {
                                case 'date':
                                    echo get_the_date();
                                    break;

                                case 'category':
                                    the_terms( get_the_ID(), 'portfolio-category', '', ' ' );
                                    break;

                                case 'social':
                                    wellco_socials_share_portfolio();
                                    break;
                                
                                default:
                                    echo esc_attr($content);
                                    break;
                            }
                        ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>