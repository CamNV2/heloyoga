<?php
/**
 * The template for displaying register form.
 *
 * Override this template
 *
 * @author 		Bravis Theme User
 * @package 	Bravis Theme User/Templates
 * @version     1.0.0
 */
if (! defined('ABSPATH')) {
    exit(); // Exit if accessed directly
}
?>

<div class="ct-user-form-body ct-user-form-register">
	<div class="register-form">
		<div class="fields-content">
			<div class="field-group">
				<input id="res_user" type="text" class="input" placeholder="<?php esc_html_e('Username', 'bravis-theme-user'); ?>" data-validate="<?php esc_html_e('Required Field', 'bravis-theme-user'); ?>" data-user-length="<?php esc_html_e('Username too short. At least 4 characters is required.', 'bravis-theme-user'); ?>" data-special-char="<?php esc_html_e("The value of text field can't contain any of the following characters: \ / : * ? \" < > space", 'bravis-theme-user'); ?>">
				<i class="zmdi zmdi-account"></i>
			</div>
			<div class="field-group">
				<input id="res_email" type="text" class="input" placeholder="<?php esc_html_e('Email Address', 'bravis-theme-user'); ?>" data-validate="<?php esc_html_e('Required Field', 'bravis-theme-user'); ?>"  data-email-format="<?php esc_html_e('The Email address is incorrect!', 'bravis-theme-user'); ?>">
				<i class="zmdi zmdi-email"></i>
			</div>
			<div class="field-group">
				<input id="res_pass1" type="password" class="input" data-type="password" placeholder="<?php esc_html_e('Password', 'bravis-theme-user'); ?>" data-validate="<?php esc_html_e('Required Field', 'bravis-theme-user'); ?>" data-pass-length="<?php esc_html_e( 'Password length must be greater than 5.', 'bravis-theme-user' ); ?>">
				<i class="zmdi zmdi-lock"></i>
			</div>
			<div class="field-group">
				<input id="res_pass2" type="password" class="input" data-type="password" placeholder="<?php esc_html_e('Confirm Password', 'bravis-theme-user'); ?>" data-validate="<?php esc_html_e('Required Field', 'bravis-theme-user'); ?>" data-pass-confirm="<?php esc_html_e('Your password and confirmation password do not match.', 'bravis-theme-user'); ?>">
				<i class="zmdi zmdi-lock"></i>
			</div>
			<div class="field-group">
				<button type="button" class="button btn-up-register"><?php esc_html_e('Create Account', 'bravis-theme-user');?></button>
			</div>
		</div>
	</div>
</div>