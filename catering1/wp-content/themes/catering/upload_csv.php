<?php
$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');
$current_user = wp_get_current_user(); 
$user_id = $current_user->ID; 
global $wpdb;


echo $filename=$_FILES["file"]["tmp_name"];
 
 
		 if($_FILES["file"]["size"] > 0)
		 {
 
		  	$file = fopen($filename, "r");

$headers = fgetcsv($file, 1000, ",");


	         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
             
             
$tablename='menu';
    $data=array(
        'menu_name' => $emapData[0],
        'menu_desc' => $emapData[1],
        'menu_alergy' => $emapData[2],
        'categ_name' => $emapData[3],
        'menu_image' => $emapData[4],
        'menu_spicy' => $emapData[5],
        'user_id' => $user_id,
        'menu_csv' => 'Yes');
     $wpdb->insert( $tablename, $data); 
     
     

                 
                
                
 
	         }
	         fclose($file);

		 }



?>

