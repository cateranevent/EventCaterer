<?php
$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');

$current_user = wp_get_current_user(); 
$user_id = $current_user->ID; 

$categ_name = $_POST['categ_name'];
global $wpdb;


    $tablename='category';
    $data=array(
        'user_id' => $user_id,
        'categ_name' => $categ_name);
     $wpdb->insert( $tablename, $data); 
?>
