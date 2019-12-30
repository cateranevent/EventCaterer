<?php
$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');
$cater_id = $_POST['cater_id'];
$current_user = wp_get_current_user(); 
$user_id = $current_user->ID; 
global $wpdb;

$wpdb->get_results("SELECT * FROM bakery_menu_cart WHERE user_id = $user_id and cart_status = 0");
$rowcount = $wpdb->num_rows;
?>



<?php
if($rowcount != 0){ ?>


<?php

$filelabjobpre = $wpdb->get_results("SELECT sum(price) as price FROM `bakery_menu_cart` WHERE user_id = $user_id and cart_status = 0");         
foreach ($filelabjobpre as $filesabjpbpre) {
          setup_postdata( $filesabjpbpre ); 
          $categ_price = $filesabjpbpre->price;

?>


<?php
}
?>


<table class="tablepayment">
    
        
        
         <tr class="tablepaymentaddb">
            <td>Total</td>
            <td class="newg">£<?php echo $categ_price; ?></td>  
        </tr>

      <tr class="tablepaymentaddb">
            <td>Deposit Fee 14%</td>
            <td class="newg">£<?php echo $commission_admin = round($categ_price * 14/100); ?></td>  
        </tr>


  <tr class="tablepaymentaddb">
            <td>Balance to pay later</td>
            <td class="newg">£<?php echo $categ_price; ?> - £<?php echo $commission_admin; ?> = £<?php echo $categ_price - $commission_admin; ?></td>  
        </tr>


        <tr>
            <td><h5>Pay Total</h5></td>
            <td class="newg"><h5>£<?php echo $commission_admin; ?></h5></td>  
        </tr>
        
        
        
    
    </table>






<center>


    <button class="buttonpayment" id="getquote" name="getquote">BUY NOW</button>
    
    
    
    
    
    
    
      <script type="text/javascript">
jQuery(document).ready(function(){
        jQuery("#getquote").click(function () {
            
            
<?php if ( is_user_logged_in() ) { ?>
 
    
           window.location='http://scopun.co.uk/projects/catering1/cake-order-payment/?cater=<?php echo $cater_id; ?>';
            
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

