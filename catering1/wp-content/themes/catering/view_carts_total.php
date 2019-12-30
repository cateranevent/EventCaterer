<?php
$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');
$cater_id = $_POST['cater_id'];
$current_user = wp_get_current_user(); 
$user_id = $current_user->ID; 
global $wpdb;

$wpdb->get_results("SELECT * FROM menu_cart WHERE user_id = $user_id and cart_status = 0");
$rowcount = $wpdb->num_rows;
?>



<?php
if($rowcount != 0){ ?>


<?php
$filelabjobpr = $wpdb->get_results("SELECT GROUP_CONCAT(DISTINCT t3.categ_name SEPARATOR ',') as categ_name FROM menu_cart t1 
INNER JOIN menu t2 ON t1.menu_id = t2.menu_id 
INNER JOIN category t3 ON t2.categ_name = t3.categ_name 
where t1.user_id = $user_id and t1.cart_status = 0
group by t1.cart_id and t3.categ_name");         
foreach ($filelabjobpr as $filesabjpbpr) {

    setup_postdata( $filesabjpbpr ); 
    $categ_name = $filesabjpbpr->categ_name;


    $myArray = explode(',',$categ_name);



?>
   
<?php
}
?>


<?php

$filelabjobpre = $wpdb->get_results("SELECT sum(categ_price) as categ_price FROM `category` WHERE categ_name IN('".implode("','",$myArray)."')  and user_id = $cater_id");         
foreach ($filelabjobpre as $filesabjpbpre) {
          setup_postdata( $filesabjpbpre ); 
          $categ_price = $filesabjpbpre->categ_price;

?>


<?php
}
?>

<!--
<table class="tablepayment">
    
        
        
         <tr class="tablepaymentaddb">
            <td>Total</td>
            <td class="newg">£<?php echo $categ_price; ?></td>  
        </tr>
        <tr>
            <td><h5>Grand Total</h5></td>
            <td class="newg"><h5>£<?php echo $categ_price; ?></h5></td>  
        </tr>
        
        
        
    
    </table>

-->




<center>


    <button class="buttonpayment" id="getquote" name="getquote">GET QUOTE</button>
    
    
    
    
    
    
    
      <script type="text/javascript">
jQuery(document).ready(function(){
        jQuery("#getquote").click(function () {
            
            
<?php if ( is_user_logged_in() ) { ?>
 
    
           window.location='http://scopun.co.uk/projects/catering1/order-payment/?cater=<?php echo $cater_id; ?>';
            
<?php } else { ?>
    
    alert("please first login then press buy!")
   
<?php } ?>            
            
            
        });
});
</script> 
    
    
    
    
    
    
</center>
    







<?php }else{ ?>

   

<?php
}
?>
