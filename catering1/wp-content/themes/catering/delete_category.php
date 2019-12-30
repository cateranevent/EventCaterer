<?php
$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');

$current_user = wp_get_current_user(); 
$user_id = $current_user->ID; 
$categ_id = $_POST['categ_id'];
$categ_name = $_POST['categ_name'];
global $wpdb;

$wpdb->query( $wpdb->prepare( "DELETE FROM category WHERE categ_id = $categ_id and user_id = $user_id" ) );
$wpdb->query( $wpdb->prepare( "DELETE FROM menu WHERE categ_name = '$categ_name' and user_id = $user_id" ) );
?>
