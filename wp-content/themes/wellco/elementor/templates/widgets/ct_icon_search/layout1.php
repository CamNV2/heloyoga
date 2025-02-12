<?php 
$default_settings = [
    'style' => '',
    'text_placeholder' => '',
    'text_button' => '',
    'post_type' => '',
    'quick_search' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
?>
<?php if($style == 'style1') : ?>
	<div class="ct-search-popup"><i class="bravisicon-search"></i></div>
<?php endif; ?>

<?php if($style == 'style2') : ?>
	<div class="ct-header-search-form ct-search-form2">
		<form role="search" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
			<input type="text" placeholder="<?php if(!empty($text_placeholder)) { echo esc_attr( $text_placeholder ); } else { esc_attr_e('Search', 'wellco'); } ?>" name="s" class="search-field" />
		    <button type="submit" class="search-submit"><i class="bravisicon-search"></i></button>
		</form>
	</div>
<?php endif; ?>

<?php if($style == 'style3') : ?>
	<div class="ct-search-form3">
		<form role="search" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
			<i class="bravisicon-search"></i>
			<input type="text" placeholder="<?php if(!empty($text_placeholder)) { echo esc_attr( $text_placeholder ); } else { esc_attr_e('Search Coach', 'wellco'); } ?>" name="s" class="search-field" />
		    <button type="submit" class="search-submit btn btn-primary">
		    	<?php if(!empty($text_button)) { echo esc_attr($text_button); } else { echo esc_html__('Search Now', 'wellco'); } ?>
		    	<i class="bravisicon-angle-arrow-right"></i>
		    </button>
		    <?php if(!empty($post_type)) : ?>
		    	<input type="hidden" name="post_type" value="<?php echo esc_attr($post_type); ?>">
		    <?php endif; ?>
		</form>
		<?php if(isset($quick_search) && !empty($quick_search) && count($quick_search)): ?>
		    <div class="ct-search-list">
		        <?php
		        	foreach ($quick_search as $key => $ct_list): ?>
		            <a href="<?php echo esc_url(home_url( '/' )); ?>?s=<?php echo ct_print_html($ct_list['content'])?>&post_type=<?php echo esc_attr($post_type); ?>">
		            	<span></span>
		            	<?php echo ct_print_html($ct_list['content'])?>
		            </a>
		        <?php endforeach; ?>
		    </div>
		<?php endif; ?>
	</div>
<?php endif; ?>