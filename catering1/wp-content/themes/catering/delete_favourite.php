<?php
$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');

$current_user = wp_get_current_user(); 
$user_id = $current_user->ID; 
$post_id = $_POST['post_id'];
global $wpdb;

$wpdb->query( $wpdb->prepare( "DELETE FROM favourite WHERE post_id = $post_id and user_id = $user_id" ) );
?>


