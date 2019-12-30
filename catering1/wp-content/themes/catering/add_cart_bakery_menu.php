<?php
$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');
$menu_id = $_POST['menu_id'];
$categ_name = $_POST['categ_name'];
$cater_id = $_POST['cater_id'];
$price = $_POST['price'];
$current_user = wp_get_current_user(); 
$user_id = $current_user->ID; 
global $wpdb;

$wpdb->get_results("SELECT * FROM bakery_menu_cart WHERE menu_id = $menu_id and user_id = $user_id and cart_status = 0");
$rowcount = $wpdb->num_rows;

if($rowcount != 0){
    echo "already added!";
}else{
    $tablename='bakery_menu_cart';
    $data=array(
        'menu_id' => $menu_id,
        'cater_id' => $cater_id,
'categ_name' => $categ_name,
'price' => $price,
        'user_id' => $user_id);
     $wpdb->insert( $tablename, $data); 
     echo "Thankyou added!";
}
?>