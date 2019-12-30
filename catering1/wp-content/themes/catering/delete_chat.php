<?php
$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');
$chat_id1 = $_POST['chat_id1'];
global $wpdb;

$wpdb->query( $wpdb->prepare( "DELETE FROM chatting WHERE chat_id = $chat_id1" ) );

?>