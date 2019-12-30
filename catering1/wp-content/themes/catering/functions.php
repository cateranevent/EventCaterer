<?php defined( 'ABSPATH' ) OR die( 'This script cannot be accessed directly.' );

/**
 * Include all the needed files
 *
 * (!) Note for Clients: please, do not modify this or other theme's files. Use child theme instead!
 */

if ( ! defined( 'US_ACTIVATION_THEMENAME' ) ) {
	define( 'US_ACTIVATION_THEMENAME', 'Impreza' );
}


add_role( 'caterer', __('Caterer'));
add_role( 'bakery', __('Bakery'));



/*
add_action("gform_user_registered", "autologin", 10, 4);
function autologin($user_id, $config, $entry, $password) {
        wp_set_auth_cookie($user_id, false, '');
}
*/



/**
* Gravity Forms Custom Activation Template
* https://gravitywiz.com/customizing-gravity-forms-user-registration-activation-page
*/
add_action('wp', 'custom_maybe_activate_user', 9);
function custom_maybe_activate_user() {
 $template_path = STYLESHEETPATH . '/gfur-activate-template/activate.php';

 $is_activate_page = isset( $_GET['page'] ) && $_GET['page'] == 'gf_activation';
 
 if( ! file_exists( $template_path ) || ! $is_activate_page )
 return;
 
 require_once( $template_path );
 
 exit();
}







$us_theme_supports = array(
	'plugins' => array(
		'js_composer' => '/framework/plugins-support/js_composer/js_composer.php',
		'Ultimate_VC_Addons' => '/framework/plugins-support/Ultimate_VC_Addons.php',
		'revslider' => '/framework/plugins-support/revslider.php',
		'contact-form-7' => NULL,
		'gravityforms' => '/framework/plugins-support/gravityforms.php',
		'woocommerce' => '/framework/plugins-support/woocommerce/woocommerce.php',
		'codelights' => '/framework/plugins-support/codelights.php',
		'wpml' => '/framework/plugins-support/wpml.php',
		'bbpress' => '/framework/plugins-support/bbpress.php',
		'tablepress' => '/framework/plugins-support/tablepress.php',
		'the-events-calendar' => '/framework/plugins-support/the_events_calendar.php',
		'us-header-builder' => '/framework/plugins-support/us_header_builder.php',
	),
);

require dirname( __FILE__ ) . '/framework/framework.php';

unset( $us_theme_supports );

