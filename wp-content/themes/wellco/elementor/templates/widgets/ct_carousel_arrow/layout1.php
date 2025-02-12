<?php
$default_settings = [
    'style' => '',
    'class' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings); ?>
<div class="ct-nav-carousel <?php echo esc_attr($style); ?> <?php echo esc_attr($class); ?>">
    <div class="nav-prev"><i class="bravisicon-angle-arrow-left"></i></div>
    <div class="nav-next"><i class="bravisicon-angle-arrow-right"></i></div>
</div>