<?php
$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');
$current_user = wp_get_current_user(); 
$user_id = $current_user->ID; 
global $wpdb;

$wpdb->query( $wpdb->prepare( "DELETE FROM menu_cart WHERE user_id = $user_id and cart_status = 0" ) );
$wpdb->query( $wpdb->prepare( "DELETE FROM bakery_menu_cart WHERE user_id = $user_id and cart_status = 0" ) );
?>
