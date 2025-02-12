<?php
$default_settings = [
    'date' => '2030/10/10',
    'ct_day' => '',
    'ct_hour' => '',
    'ct_minute' => '',
    'ct_second' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings); 
$month = esc_html__('Month', 'wellco');
$months = esc_html__('Months', 'wellco');
$day = esc_html__('Day', 'wellco');
$days = esc_html__('Days', 'wellco');
$hour = esc_html__('Hour', 'wellco');
$hours = esc_html__('Hours', 'wellco');
$minute = esc_html__('Minute', 'wellco');
$minutes = esc_html__('Minutes', 'wellco');
$second = esc_html__('Second', 'wellco');
$seconds = esc_html__('Seconds', 'wellco');
?>
<div class="ct-countdown ct-countdown-layout1 <?php echo esc_attr($style); ?>" 
	data-month="<?php echo esc_attr($month) ?>"
	data-months="<?php echo esc_attr($months) ?>"
	data-day="<?php echo esc_attr($day) ?>"
	data-days="<?php echo esc_attr($days) ?>"
	data-hour="<?php echo esc_attr($hour) ?>"
	data-hours="<?php echo esc_attr($hours) ?>"
	data-minute="<?php echo esc_attr($minute) ?>"
	data-minutes="<?php echo esc_attr($minutes) ?>"
	data-second="<?php echo esc_attr($second) ?>"
	data-seconds="<?php echo esc_attr($seconds) ?>">
	<div class="ct-countdown-inner" data-count-down="<?php echo esc_attr($date);?>"></div>
</div>