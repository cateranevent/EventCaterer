<?php
$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');
$menu_id = $_POST['menu_id'];
$current_user = wp_get_current_user(); 
$user_id = $current_user->ID; 
global $wpdb;

$wpdb->get_results("SELECT * FROM menu_cart WHERE user_id = $user_id and cart_status = 0");
$rowcount = $wpdb->num_rows;
?>



<?php
if($rowcount != 0){ ?>
<style>
.tablepayments{border: 2px dashed #F36C21;}
.tablepayments td{}
.tablepayments tr{}

</style>
<table class="tablepayments">

<?php
$ctr = 0;
$filelabjobpr = $wpdb->get_results("SELECT t1.cart_id, t1.menu_id, t1.cart_datetime, t1.cart_status, t2.menu_name, t2.categ_name FROM menu_cart t1 INNER JOIN menu t2 ON t1.menu_id = t2.menu_id where t1.user_id = $user_id and t1.cart_status = 0");         
foreach ($filelabjobpr as $filesabjpbpr) {

    setup_postdata( $filesabjpbpr ); 
    $cart_id = $filesabjpbpr->cart_id;
    $menu_id = $filesabjpbpr->menu_id;
    $cart_datetime = $filesabjpbpr->cart_datetime;
    $cart_status = $filesabjpbpr->cart_status;
    $menu_name = $filesabjpbpr->menu_name;
    $categ_name = $filesabjpbpr->categ_name;
$ctr++;
?>


 
        <tr>
            <td><?php echo $ctr; ?> -- <?php echo $menu_name; ?></td>
        </tr>
       
    
   
<?php
}
?>

     </table>


<button class="buttonpayments" id="clearcart" name="clearcart">CLEAR CART</button>


 <script type="text/javascript">
      jQuery("#clearcart").click(function () {
            var menu_id="";
			var userdata2uee= "menu_id="+menu_id;
			jQuery.ajax({
				type:"post",
				data:userdata2uee,
				url:"http://scopun.co.uk/projects/catering1/wp-content/themes/catering/clear_cart.php",
				cache:false,
				success:function(messainsgs){
						getcart();
getcarttotal();
				}
	       });	
        });	
        
</script>  



<?php }else{ ?>

    You haven't added anything to your cart yet!

<?php
}
?>
