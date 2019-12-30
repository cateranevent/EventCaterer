<?php
$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');
$post_id = $_POST['post_id'];
$user_id = $_POST['user_id'];
global $wpdb;

$wpdb->get_results("SELECT * FROM favourite WHERE post_id = $post_id and user_id = $user_id");
$rowcount = $wpdb->num_rows;

if($rowcount != 0){
    echo "already added!";
}else{
    $tablename='favourite';
    $data=array(
        'post_id' => $post_id,
        'user_id' => $user_id);
     $wpdb->insert( $tablename, $data); 
     echo "Thankyou added!";
}
?>


