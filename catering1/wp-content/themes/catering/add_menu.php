<?php
$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');

$current_user = wp_get_current_user(); 
$user_id = $current_user->ID; 

$menu_name = $_POST['menu_name'];
$menu_desc = $_POST['menu_desc'];
$menu_alergy = $_POST['menu_alergy'];
$categ_name = $_POST['categ_name'];
$menu_spicy = $_POST['menu_spicy'];
$menu_image = $_POST['menu_image'];
global $wpdb;



if($menu_image != "" && $menu_image != "undefined"){
    $tablename='menu';
    $data=array(
        'menu_name' => $menu_name,
        'menu_desc' => $menu_desc,
        'menu_alergy' => $menu_alergy,
        'categ_name' => $categ_name,
        'menu_image' => $menu_image,
        'menu_spicy' => $menu_spicy,
        'user_id' => $user_id);
     $wpdb->insert( $tablename, $data); 
}else{
 $tablename='menu';
    $data=array(
        'menu_name' => $menu_name,
        'menu_desc' => $menu_desc,
        'menu_alergy' => $menu_alergy,
        'categ_name' => $categ_name,
        'menu_spicy' => $menu_spicy,
        'user_id' => $user_id);
     $wpdb->insert( $tablename, $data); 
}

?>
