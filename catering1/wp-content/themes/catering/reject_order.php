<?php
$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');
$order_id = $_POST['order_id'];
$current_user = wp_get_current_user(); 
$user_id = $current_user->ID; 
global $wpdb;


$wpdb->query( $wpdb->prepare( "UPDATE menu_cart SET payment_type='Reject' WHERE cater_id = $user_id and order_id = '$order_id'" ) );

?>


<?php
$filelabjobpre = $wpdb->get_results("SELECT * FROM `menu_cart` WHERE order_id = '$order_id'");         
foreach ($filelabjobpre as $filesabjpbpre) {
        setup_postdata( $filesabjpbpre ); 
        $user_id = $filesabjpbpre->user_id;
}

        $user_info = get_userdata($user_id);
        $userloginname = $user_info->user_login;
        $nicename = $user_info->user_nicename;
        $email = $user_info->user_email;
?>


<?php

$to = $email;
$subject = "cateranevent@gmail.com - Reject Order";
$message = "

Hi $nicename<br /><br />
your order has been cancelled.
";

$headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
wp_mail($to, $subject, $message, $headers);



?>



