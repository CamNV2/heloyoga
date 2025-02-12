<?php
if (! defined ( 'ABSPATH' )) {
	exit ();
}
/**
 * Add Bravis Theme User Core.
 *
 * @name Bravis Theme User_Core
 * @since 1.0.0
 */
if (! class_exists ( 'Bravis_Theme_User_Core' )) {
	class Bravis_Theme_User_Core {
		function __construct() {
			//add_filter( 'login_redirect', array($this, 'login_redirect', 10, 3 ));
		}
		
		function login_redirect($redirect_to, $request, $user) {
			global $user;
			
			//return home_url();
		}
	}
	
	new Bravis_Theme_User_Core;
}