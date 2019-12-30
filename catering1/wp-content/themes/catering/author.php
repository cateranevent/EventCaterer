<?php defined( 'ABSPATH' ) OR die( 'This script cannot be accessed directly.' );
$us_layout = US_Layout::instance();
get_header();
$author = get_user_by( 'slug', get_query_var( 'author_name' ) );


$titlebar_vars = array(
	'title' => get_field('caterer_company_name', 'user_'.$author->ID),
);


//us_load_template( 'templates/titlebar', $titlebar_vars );
global $wpdb;
?>






<?php $user_info = get_userdata($author->ID);
      $bakerr_role = implode(', ', $user_info->roles);
?>

<?php if($bakerr_role == "bakery"){ ?>

<?php $caterer_1 = get_field('bakery_company_name', 'user_'.$author->ID); ?>
<?php $caterer_2 = get_field('bakery_company_description', 'user_'.$author->ID); ?>
<?php $caterer_7 = get_field('bakery_upload_your_logo', 'user_'.$author->ID); ?>
<?php $caterer_8 = get_field('bakery_upload_your_cover_photo', 'user_'.$author->ID); ?>

<?php }else{ ?>

<?php $caterer_1 = get_field('caterer_company_name', 'user_'.$author->ID); ?>
<?php $caterer_2 = get_field('caterer_company_description', 'user_'.$author->ID); ?>
<?php $caterer_3 = get_field('caterer_specialities', 'user_'.$author->ID); ?>
<?php $caterer_4 = get_field('caterer_cusine', 'user_'.$author->ID); ?>
<?php $caterer_5 = get_field('caterer_minimum_order_amount', 'user_'.$author->ID); ?>
<?php $caterer_6 = get_field('caterer_delivery', 'user_'.$author->ID); ?>
<?php $caterer_7 = get_field('caterer_upload_your_logo', 'user_'.$author->ID); ?>
<?php $caterer_8 = get_field('caterer_upload_your_cover_photo', 'user_'.$author->ID); ?>

<?php } ?>


<style>
    .categringbanner {
  background: 
    linear-gradient(
      rgba(0, 0, 0, 0.6),
      rgba(0, 0, 0, 0.6)
    ),
    url(<?php echo $caterer_8; ?>);
  background-size: cover;
    width: 100%;
    height: 500px;
    position: relative;
    float: left;
    background-position: center center;
}

    .mid{text-align: center; color: #fff;}

.mid .forest {
  font-weight: 900;
  color: white;
  text-transform: uppercase;
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 2rem;
  transform: translate(-50%, -50%);
}


    
    .childhead{    text-transform: none;
    font-weight: initial;
    font-size: 18px;
    margin-top: 10px;}  
    .singlelogo{    background: #fff;
    width: 150px;
    height: 150px;
    margin: 0 auto;
    border-radius: 50%;
    padding: 25px;
    margin-bottom: 20px;}
    

</style>







<div class="viewcate">
    
    
    <div class="categringbanner mid">
    <div class="forest">
        <div class="singlelogo"><img src="<?php echo $caterer_7; ?>"/></div>
        <?php echo $caterer_1; ?>

        <div class="childhead"><?php echo $caterer_2; ?></div>  

    </div>

    </div>
</div>





<style>
    .minviewcate{}
	.catefiltersearch{    background: #faf9f8;
    text-align: center;}
	.steps{display: inline-block;
    text-align: center;
    padding: 30px 80px;}
    .anssearch{}
    
    
    .steps i{    font-size: 25px;
    margin-bottom: 10px;
    border-bottom: 2px solid #F36C21;
    padding-bottom: 10px;}
    
    .accordionsf {
background-color: #fcfbf9;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 18px;
    transition: 0.4s;
    margin-bottom: 5px;
}

.actives, .accordionsf:hover {
        background-color: #F36C21;
    color: #fff;
}

.accordionsf:after {
    content: '\002B';
    font-weight: bold;
    float: right;
    margin-left: 5px;
}

.actives:after {
    content: "\2212";
}

.panels {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
}
    
    .otopj{  background: #f3f1f0;  padding: 50px;}
    
    .leftsecmenus{ margin-top: 50px;padding: 20px;
    background: #fff;
    width: 100%;
    max-width: 66.33%;
    display: inline-block;
    vertical-align: top;} 
    .rightsectincart{  margin-top: 50px;  padding: 50px;
    background: #fff;
    width: 100%;
    max-width: 33.33%;
    display: inline-block;}
    .panels ul{list-style: none; vertical-align: top; margin: 0;}
    .panels li{    border-bottom: 1px solid #e8e8e8;
    padding: 10px 0;}
    
    
    .buttonpayment {
    background: #F36C21;
    color: #fff;
    padding: 10px 30px;
    font-size: 14px;
        text-transform: uppercase;
width: 100%;
}


    .buttonpayments {
    background: #f5f5f5;
    padding: 10px 30px;
    font-size: 14px;
        text-transform: uppercase;
 width: 100%;
}
    
    .rightsectincart p{margin-bottom: 30px;}
    
    .fixsidebar{}

    .tablepayment td{    border: unset;
    padding: 5px;}
    .tablepayment tr{}
    
    .tablepaymentaddb{border-bottom: 1px solid #e8e8e8;}
    .newg{text-align: right;}
    .tablepayment h5{font-weight: bold;
    font-size: 25px;}
    
    
    .menuimg{  margin-right: 10px;  display: inline-block;
    vertical-align: middle;}
    .menuimg img{border-radius: 50%; width: 50px;

height: 50px;}
    .menuitem{color: #F36C21;}
    .menubuttond{    display: inline-block;
    float: right;}
   .menubutton {
   background: #f5f5f5;
    color: #383838;
    padding: 10px 30px;
    font-size: 14px;
    text-transform: uppercase;
}
    
    .editbtn{    background: #fff;
    padding: 10px 30px;
    font-size: 14px;
    position: absolute;
    right: 35px;
    top: -60px;
    letter-spacing: 1px;}
    
    .editbtn:hover{    background: #F36C21;
    color: #fff;}
    
    
    .input-wrapper-origin {
    position: relative;
    margin-bottom: 10px;
}
    
  .input-wrapper-origin input {
    padding-left: 40px;
    border-radius: 0;
}
    
    .input-wrapper-origin i {
    position: absolute;
    left: 10px;
    top: 12px;
    font-size: 20px;
}
    
    
    .pricingsh{}
    
    .no_item{}
    .menuconctent{display: inline-block;

vertical-align: top;

width: 100%;

max-width: 70%;}
    .menuitemdesc{}
    .menuitemalergy{font-size: 12px; text-transform: capitalize;}
    .menuitemspicy{font-size: 12px;}
    .cakeimg{    font-size: 50px;
    color: #f36c21;}





@media only screen and (min-width: 320px) and (max-width: 736px){

.singlelogo {
    width: 100px;
    height: 100px;
}
.mid .forest {
    width: 100%;
font-size: 14px;
}
.childhead {
    font-size: 14px;
    line-height: 20px;
}
.otopj {
    padding: 0;
}
.leftsecmenus {
    margin-top: 0;
    max-width: 100%;
}
.rightsectincart {
    margin-top: 20px;
    margin-bottom: 20px;
    max-width: 100%;
}
.menubuttond {
        display: inline-block;
    float: unset;
    margin-top: 10px;
    margin-left: 60px;
}


}



</style>



<div class="otopj">

<div class="leftsecmenus">

    
    
<style>
     #myInput {
  background-image: url('/css/searchicon.png'); /* Add a search icon to input */
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 100%; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
}

#myUL {
  /* Remove default list styling */
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL div a {
  border: 1px solid #ddd; /* Add a border to all links */
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6; /* Grey background color */
  padding: 12px; /* Add some padding */
  text-decoration: none; /* Remove default text underline */
  font-size: 18px; /* Increase the font-size */
  color: black; /* Add a black text color */
  display: block; /* Make it into a block element to fill the whole list */
}

#myUL div a:hover:not(.header) {
  background-color: #eee; /* Add a hover effect to all links, except for headers */
}
    </style>
    
    
<div class="input-wrapper-origin">
  <input type="text" id="myInput"  onkeyup="myFunction()" placeholder="e.g. Sandwich…">
 <i class="fa fa-search" aria-hidden="true"></i>
</div>
    
    
    
    
    
    
    
    
    <?php if($bakerr_role == "bakery"){ ?>
    
    
    
    
<div id="myUL">
    
   <six id="finala"><forty id="finalb"> <button class="accordionsf">Birthday Cakes</button>

<div class="panels">
<ul>   
    
       
<?php    
$wpdb->get_results("SELECT * FROM `bakery_menu` where categ_name = 'Birthday Cakes' and user_id = $author->ID order by menu_id ASC");
$recred = $wpdb->num_rows;
?>    
    
    <?php if($recred == 0){ ?>
        <li class="no_item">There is no item available in this category</li>
    <?php  } ?>
    
    
    
<?php 
$filelabjobprmenu = $wpdb->get_results("SELECT * FROM `bakery_menu` where categ_name = 'Birthday Cakes' and user_id = $author->ID order by menu_id ASC");          
foreach ($filelabjobprmenu as $filesabjpbprme) {
    setup_postdata( $filesabjpbprme ); 
    $menu_id = $filesabjpbprme->menu_id;
    $menu_name = $filesabjpbprme->menu_name;
    $menu_desc = $filesabjpbprme->menu_desc;
    $menu_alergy = $filesabjpbprme->menu_alergy;
    $menu_image = $filesabjpbprme->menu_image;
    $menu_price = $filesabjpbprme->menu_price;

$menu_caketype = $filesabjpbprme->menu_caketype;
$menu_cakesize = $filesabjpbprme->menu_cakesize;

?>
    
    
    
    
    
<li>
 <div class="menuimg">
    
     <?php if($menu_image != ""){ ?>
                <img src="http://scopun.co.uk/projects/catering1/wp-content/themes/catering/menu_image/<?php echo $menu_image; ?>"/>
                <?php  }else{ ?>
     <div class="cakeimg"><i class="fa fa-birthday-cake" aria-hidden="true"></i></div>
                 <?php  } ?>
    
    </div>
            <div class="menuconctent">
               <div class="menuitem"><?php echo $menu_name; ?> - <?php echo $menu_cakesize; ?></div>
                <div class="menuitemdesc"><?php echo preg_replace('/\\\\/', '', $menu_desc); ?></div>
                <div class="menuitemalergy"><strong>Alergy</strong>: <?php echo $menu_alergy; ?></div>
                <div class="menuitemalergy"><strong>Type</strong>: <?php echo $menu_caketype; ?></div>
                <div class="menuitemalergy"><strong>Size</strong>: <?php echo $menu_cakesize; ?></div>
                <div class="menuitemspicy" style="color: red; font-size: 20px;"><strong>Price</strong>: £<?php echo $menu_price; ?></div>
            </div>
            
            <div class="menubuttond"><button class="menubutton" id="bakerymenuadd1_<?php echo $menu_id; ?>" name="bakerymenuadd1_<?php echo $menu_id; ?>"><i class="fa fa-plus"></i>&nbsp;&nbsp;ADD</button></div>
    
</li>
    
    
    
    
      <script type="text/javascript">
jQuery(document).ready(function(){
        getcart1();
getcarttotal1();
        jQuery("#bakerymenuadd1_<?php echo $menu_id; ?>").click(function () {
            
            
<?php if ( is_user_logged_in() ) { ?>
 
 
 
            var categ_name="Birthday Cakes";   
            var cater_id="<?php echo $author->ID; ?>";  
            var menu_id="<?php echo $menu_id; ?>";
                                  var price="<?php echo $menu_price; ?>";
			var userdata2uee= "menu_id="+menu_id+"&cater_id="+cater_id+"&categ_name="+categ_name+"&price="+price;
			jQuery.ajax({
				type:"post",
				data:userdata2uee,
				url:"http://scopun.co.uk/projects/catering1/wp-content/themes/catering/add_cart_bakery_menu.php",
				cache:false,
				success:function(msg2r){
						alert(msg2r);
          getcart1();
                    getcarttotal1();
                   
				}
	       });	
            
                                  
                                  
<?php } else { ?>
    
    alert("please first login then press buy!")
   
<?php } ?>            
            
            
        });
});
</script> 
    
    

    
    
    
    
    
    
    
    
    
    
 <?php  } ?> 
    
    
    
    
    </ul>
</div>
       </forty>
    </six>
    


    <six id="finala"><forty id="finalb"> <button class="accordionsf">Wedding Cakes</button>

<div class="panels">
<ul>   
    
       
<?php    
$wpdb->get_results("SELECT * FROM `bakery_menu` where categ_name = 'Wedding Cakes' and user_id = $author->ID order by menu_id ASC");
$recred = $wpdb->num_rows;
?>    
    
    <?php if($recred == 0){ ?>
        <li class="no_item">There is no item available in this category</li>
    <?php  } ?>
    
    
    
<?php 
$filelabjobprmenu = $wpdb->get_results("SELECT * FROM `bakery_menu` where categ_name = 'Wedding Cakes' and user_id = $author->ID order by menu_id ASC");          
foreach ($filelabjobprmenu as $filesabjpbprme) {
    setup_postdata( $filesabjpbprme ); 
    $menu_id = $filesabjpbprme->menu_id;
    $menu_name = $filesabjpbprme->menu_name;
    $menu_desc = $filesabjpbprme->menu_desc;
    $menu_alergy = $filesabjpbprme->menu_alergy;
    $menu_image = $filesabjpbprme->menu_image;
    $menu_price = $filesabjpbprme->menu_price;


$menu_caketype = $filesabjpbprme->menu_caketype;
$menu_cakesize = $filesabjpbprme->menu_cakesize;
?>
    
    
    
    
    
<li>
 <div class="menuimg">
    
     <?php if($menu_image != ""){ ?>
                <img src="http://scopun.co.uk/projects/catering1/wp-content/themes/catering/menu_image/<?php echo $menu_image; ?>"/>
                <?php  }else{ ?>
               <div class="cakeimg"><i class="fa fa-birthday-cake" aria-hidden="true"></i></div>
                 <?php  } ?>
    
    </div>
            <div class="menuconctent">
              <div class="menuitem"><?php echo $menu_name; ?> - <?php echo $menu_cakesize; ?></div>
                <div class="menuitemdesc"><?php echo preg_replace('/\\\\/', '', $menu_desc); ?></div>
                <div class="menuitemalergy"><strong>Alergy</strong>: <?php echo $menu_alergy; ?></div>
                       <div class="menuitemalergy"><strong>Type</strong>: <?php echo $menu_caketype; ?></div>
                <div class="menuitemalergy"><strong>Size</strong>: <?php echo $menu_cakesize; ?></div>
                <div class="menuitemspicy" style="color: red; font-size: 20px;"><strong>Price</strong>: £<?php echo $menu_price; ?></div>
            </div>
            
            <div class="menubuttond"><button class="menubutton" id="bakerymenuadd2_<?php echo $menu_id; ?>" name="bakerymenuadd2_<?php echo $menu_id; ?>"><i class="fa fa-plus"></i>&nbsp;&nbsp;ADD</button></div>
    
</li>
    
    
    
    
    
    
    
      <script type="text/javascript">
jQuery(document).ready(function(){
        getcart1();
getcarttotal1();
        jQuery("#bakerymenuadd2_<?php echo $menu_id; ?>").click(function () {
            
            
<?php if ( is_user_logged_in() ) { ?>
 
 
 
            var categ_name="Birthday Cakes";   
            var cater_id="<?php echo $author->ID; ?>";  
            var menu_id="<?php echo $menu_id; ?>";
                                  var price="<?php echo $menu_price; ?>";
			var userdata2uee= "menu_id="+menu_id+"&cater_id="+cater_id+"&categ_name="+categ_name+"&price="+price;
			jQuery.ajax({
				type:"post",
				data:userdata2uee,
				url:"http://scopun.co.uk/projects/catering1/wp-content/themes/catering/add_cart_bakery_menu.php",
				cache:false,
				success:function(msg2r){
						alert(msg2r);
          getcart1();
                    getcarttotal1();
                   
				}
	       });	
            
                                  
                                  
<?php } else { ?>
    
    alert("please first login then press buy!")
   
<?php } ?>            
            
            
        });
});
</script> 
    
    
    
    
    
    
    
 <?php  } ?> 
    
    
    
    
    </ul>
    
    
    
    
</div>
       </forty>
    </six>
    
    
    
    <six id="finala"><forty id="finalb"> <button class="accordionsf">Photo Cakes</button>

<div class="panels">
<ul>   
    
       
<?php    
$wpdb->get_results("SELECT * FROM `bakery_menu` where categ_name = 'Photo Cakes' and user_id = $author->ID order by menu_id ASC");
$recred = $wpdb->num_rows;
?>    
    
    <?php if($recred == 0){ ?>
        <li class="no_item">There is no item available in this category</li>
    <?php  } ?>
    
    
    
<?php 
$filelabjobprmenu = $wpdb->get_results("SELECT * FROM `bakery_menu` where categ_name = 'Photo Cakes' and user_id = $author->ID order by menu_id ASC");          
foreach ($filelabjobprmenu as $filesabjpbprme) {
    setup_postdata( $filesabjpbprme ); 
    $menu_id = $filesabjpbprme->menu_id;
    $menu_name = $filesabjpbprme->menu_name;
    $menu_desc = $filesabjpbprme->menu_desc;
    $menu_alergy = $filesabjpbprme->menu_alergy;
    $menu_image = $filesabjpbprme->menu_image;
    $menu_price = $filesabjpbprme->menu_price;

$menu_caketype = $filesabjpbprme->menu_caketype;
$menu_cakesize = $filesabjpbprme->menu_cakesize;
?>
    
    
    
    
    
<li>
 <div class="menuimg">
    
     <?php if($menu_image != ""){ ?>
                <img src="http://scopun.co.uk/projects/catering1/wp-content/themes/catering/menu_image/<?php echo $menu_image; ?>"/>
                <?php  }else{ ?>
<div class="cakeimg"><i class="fa fa-birthday-cake" aria-hidden="true"></i></div>
                 <?php  } ?>
    
    </div>
            <div class="menuconctent">
              <div class="menuitem"><?php echo $menu_name; ?> - <?php echo $menu_cakesize; ?></div>
                <div class="menuitemdesc"><?php echo preg_replace('/\\\\/', '', $menu_desc); ?></div>
                <div class="menuitemalergy"><strong>Alergy</strong>: <?php echo $menu_alergy; ?></div>
                       <div class="menuitemalergy"><strong>Type</strong>: <?php echo $menu_caketype; ?></div>
                <div class="menuitemalergy"><strong>Size</strong>: <?php echo $menu_cakesize; ?></div>
                <div class="menuitemspicy" style="color: red; font-size: 20px;"><strong>Price</strong>: £<?php echo $menu_price; ?></div>
            </div>
            
            <div class="menubuttond"><button class="menubutton" id="bakerymenuadd3_<?php echo $menu_id; ?>" name="bakerymenuadd3_<?php echo $menu_id; ?>"><i class="fa fa-plus"></i>&nbsp;&nbsp;ADD</button></div>
    
</li>
    
    
    
    
    
      <script type="text/javascript">
jQuery(document).ready(function(){
        getcart1();
getcarttotal1();
        jQuery("#bakerymenuadd3_<?php echo $menu_id; ?>").click(function () {
            
            
<?php if ( is_user_logged_in() ) { ?>
 
 
 
            var categ_name="Birthday Cakes";   
            var cater_id="<?php echo $author->ID; ?>";  
            var menu_id="<?php echo $menu_id; ?>";
                                  var price="<?php echo $menu_price; ?>";
			var userdata2uee= "menu_id="+menu_id+"&cater_id="+cater_id+"&categ_name="+categ_name+"&price="+price;
			jQuery.ajax({
				type:"post",
				data:userdata2uee,
				url:"http://scopun.co.uk/projects/catering1/wp-content/themes/catering/add_cart_bakery_menu.php",
				cache:false,
				success:function(msg2r){
						alert(msg2r);
          getcart1();
                    getcarttotal1();
                   
				}
	       });	
            
                                  
                                  
<?php } else { ?>
    
    alert("please first login then press buy!")
   
<?php } ?>            
            
            
        });
});
</script> 
    
    
    
    
    
    
 <?php  } ?> 
    
    
    
    
    </ul>
    
    
    
</div>
       </forty>
    </six>
    
    
    
    
    

</div> 
    
    
    
    
    
    
    
    
    
    
  <script type="text/javascript">
      function getcart1(){
            var menu_id="<?php echo $menu_id; ?>";
			var userdata2uee= "menu_id="+menu_id;
			jQuery.ajax({
				type:"post",
				data:userdata2uee,
				url:"http://scopun.co.uk/projects/catering1/wp-content/themes/catering/view_bakery_carts.php",
				cache:false,
				success:function(messainsgs){

						jQuery("#view_carts").html(messainsgs);   
				}
	       });	
    }
      
      
      
       function getcarttotal1(){
            var cater_id="<?php echo $author->ID; ?>";
			var userdata2uee= "cater_id="+cater_id;
			jQuery.ajax({
				type:"post",
				data:userdata2uee,
				url:"http://scopun.co.uk/projects/catering1/wp-content/themes/catering/view_bakert_carts_total.php",
				cache:false,
				success:function(messainsgs){

						jQuery("#view_carts_total").html(messainsgs);   
				}
	       });	
    }
      
      
      
        
</script>     
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
 <?php  }else{ ?>   


    
    
    <?php $certificate = get_field('caterer_hygiene_certificate', 'user_'.$author->ID); ?>
    <div><strong>Caterer Hygiene Certificate:</strong> <a href="<?php echo $certificate; ?>" download>Download</a></div> 
  
    
    
    
    
<?php
$custom_args = array(
    'post_type' => 'catering',
    'orderby'          => 'date',
    'order'            => 'DESC',
    'author'=> $author->ID, 'showposts' => '1',
    'posts_per_page' => -1
 );

  

  $custom_query = new WP_Query( $custom_args ); ?>

  <?php if ( $custom_query->have_posts() ) : ?>


    <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

		  <?php $post_id = get_the_ID(); ?>

<div><strong>Specialities:</strong> <?php echo strip_tags(get_the_term_list( $post_id, 'specialities', ' ',' | ')); ?></div>
<div><strong>Cusine:</strong> <?php echo strip_tags(get_the_term_list( $post_id, 'cusine', ' ',' | ')); ?></div>
<div><strong>Minimum Order Amount:</strong> £<?php echo get_field('caterer_minimum_order_amount', $post_id); ?></div>
<div><strong>Delivery:</strong> <?php echo get_field('caterer_delivery', $post_id); ?></div>
    <br />
    
    <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>
  <?php else:  ?>
  <?php endif; ?>







    
<div id="myUL">
    
    
    
    
    
    
    
    
    
    
     
<?php 
$filelabjobpr = $wpdb->get_results("SELECT * FROM `category` where user_id = $author->ID order by categ_id ASC");          
foreach ($filelabjobpr as $filesabjpbpr) {
    setup_postdata( $filesabjpbpr ); 
    $categ_id = $filesabjpbpr->categ_id;
    $categ_name = $filesabjpbpr->categ_name;
?>
    
   <six id="finala"><forty id="finalb"> <button class="accordionsf"><?php echo $categ_name; ?></button>


<div class="panels">
<ul>   
    
<?php    
$wpdb->get_results("SELECT * FROM `menu` where categ_name = '$categ_name' and user_id = $author->ID order by menu_id ASC");
$recred = $wpdb->num_rows;
?>    
    
    <?php if($recred == 0){ ?>
        <li class="no_item">There is no item available in this category</li>
    <?php  } ?>
    
    
    
<?php 
$filelabjobprmenu = $wpdb->get_results("SELECT * FROM `menu` where categ_name = '$categ_name' and user_id = $author->ID order by menu_id ASC");          
foreach ($filelabjobprmenu as $filesabjpbprme) {
    setup_postdata( $filesabjpbprme ); 
    $menu_id = $filesabjpbprme->menu_id;
    $menu_name = $filesabjpbprme->menu_name;
    $menu_desc = $filesabjpbprme->menu_desc;
    $menu_alergy = $filesabjpbprme->menu_alergy;
    $menu_image = $filesabjpbprme->menu_image;
    $menu_spicy = $filesabjpbprme->menu_spicy;
    $menu_csv = $filesabjpbprme->menu_csv;
?>
    

    
        <li>
            
            <div class="menuimg">
                <?php if($menu_csv != "Yes"){ ?>
                
                <?php if($menu_image != ""){ ?>
                <img src="http://scopun.co.uk/projects/catering1/wp-content/themes/catering/menu_image/<?php echo $menu_image; ?>"/>
                <?php  }else{ ?>
                <img src="http://scopun.co.uk/projects/catering1/wp-content/uploads/2018/08/food-icon-new.png"/>
                 <?php  } ?>
                
                <?php  }else{ ?>
                
                <?php if($menu_image != ""){ ?>
                <img src="<?php echo $menu_image; ?>"/>
                <?php  }else{ ?>
                <img src="http://scopun.co.uk/projects/catering1/wp-content/uploads/2018/08/food-icon-new.png"/>
                 <?php  } ?>
                
                
                <?php  } ?>
                
            </div>
            <div class="menuconctent">
                <div class="menuitem"><?php echo $menu_name; ?></div>
                <div class="menuitemdesc"><?php echo preg_replace('/\\\\/', '', $menu_desc); ?></div>
                <div class="menuitemalergy"><strong>Alergy</strong>: <?php echo str_replace(","," | ",$menu_alergy); ?></div>
                <div class="menuitemspicy"><strong>Spicy</strong>: <?php echo $menu_spicy; ?></div>
            </div>
            
            <div class="menubuttond"><button class="menubutton" id="menuadd_<?php echo $menu_id; ?>" name="menuadd_<?php echo $menu_id; ?>"><i class="fa fa-plus"></i>&nbsp;&nbsp;ADD</button></div>
    
</li>
    

    
  <script type="text/javascript">
jQuery(document).ready(function(){
        getcart();
    getcarttotal();
        jQuery("#menuadd_<?php echo $menu_id; ?>").click(function () {
            
            
<?php if ( is_user_logged_in() ) { ?>
 
 
 
            var categ_id="<?php echo $categ_id; ?>";
            var cater_id="<?php echo $author->ID; ?>";                        
            var menu_id="<?php echo $menu_id; ?>";
			var userdata2uee= "menu_id="+menu_id+"&cater_id="+cater_id+"&categ_id="+categ_id;
			jQuery.ajax({
				type:"post",
				data:userdata2uee,
				url:"http://scopun.co.uk/projects/catering1/wp-content/themes/catering/add_cart_menu.php",
				cache:false,
				success:function(msg2r){
						alert(msg2r);
                        getcart();
                    getcarttotal();
				}
	       });	
            
<?php } else { ?>
    
    alert("please first login then press buy!")
   
<?php } ?>            
            
            
        });
});
</script> 

        <?php  } ?> 
    
    
    
     
  <script type="text/javascript">
      function getcart(){
            var menu_id="<?php echo $menu_id; ?>";
			var userdata2uee= "menu_id="+menu_id;
			jQuery.ajax({
				type:"post",
				data:userdata2uee,
				url:"http://scopun.co.uk/projects/catering1/wp-content/themes/catering/view_carts.php",
				cache:false,
				success:function(messainsgs){

						jQuery("#view_carts").html(messainsgs);   
				}
	       });	
    }
      
      
      
       function getcarttotal(){
           
            var cater_id="<?php echo $author->ID; ?>";
			var userdata2uee= "cater_id="+cater_id;
			jQuery.ajax({
				type:"post",
				data:userdata2uee,
				url:"http://scopun.co.uk/projects/catering1/wp-content/themes/catering/view_carts_total.php",
				cache:false,
				success:function(messainsgs){

						jQuery("#view_carts_total").html(messainsgs);   
				}
	       });	
    }
      
      
      
        
</script>     
    

       
    </ul>
</div>
    
       </forty>
    </six>
    
    <?php  } ?>   
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
   
</div> 
    
    
    
    
    
     <?php  } ?>    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
<script>
function myFunction() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();
  ul = document.getElementById("myUL");
  li = ul.getElementsByTagName('six');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("forty")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
</script>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

</div>


<div class="rightsectincart">
    
    
    <div class="fixsidebar">
  <center>  
    <h3>YOUR ORDER</h3>

      <div id="view_carts"></div>
      

    </center>
    
<hr />
    
     <div id="view_carts_total"></div>
        


    
    </div> 
    
    
    
</div>


</div>


<script>
var acc = document.getElementsByClassName("accordionsf");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("actives");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>




<?php
get_footer();
