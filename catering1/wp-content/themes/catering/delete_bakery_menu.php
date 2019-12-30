<?php
$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');

$current_user = wp_get_current_user(); 
$user_id = $current_user->ID; 
$menu_id = $_POST['menu_id'];
global $wpdb;

$wpdb->query( $wpdb->prepare( "DELETE FROM bakery_menu WHERE menu_id = $menu_id and user_id = $user_id" ) );
?>
