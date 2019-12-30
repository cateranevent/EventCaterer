<?php
$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');


$emailaddress = $_POST['emailaddress'];
$chat_subject = $_POST['chat_subject'];
$chat_message = $_POST['chat_message'];
$order_id = $_POST['order_id'];
$cater_id = $_POST['cater_id'];
$user_id = $_POST['user_id'];
$user_type = $_POST['user_type'];
global $wpdb;

    $tablename='chatting';
    $data=array(
        'emailaddress' => $emailaddress,
        'chat_subject' => $chat_subject,
        'chat_message' => $chat_message,
        'order_id' => $order_id,
        'cater_id' => $cater_id,
        'user_id' => $user_id,
        'user_type' => $user_type);
     $wpdb->insert( $tablename, $data); 


?>
