<?php
$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');
$current_user = wp_get_current_user();
global $wpdb;

$special = $_POST['special'];
$specials = explode(',', $special);

$cusine = $_POST['cusine'];
$cusines = explode(',', $cusine);

$delivery = $_POST['delivery'];
$deliverys = explode(',', $delivery);

$postcode = $_POST['postcode'];
$find_categ = $_POST['find_categ'];

$myrange = $_POST['myRange'];
?>









<?php

echo do_shortcode( '[php snippet=37]' );

?>









<?php 






if($postcode != "" && $find_categ != "0"){

$filelabjobpr1 = $wpdb->get_results("SELECT DISTINCT a.user_id FROM `wp_usermeta` a INNER JOIN category b ON a.user_id = b.user_id  where a.meta_key = 'caterer_post_code' and a.meta_value = '$postcode' and b.categ_name = '$find_categ'");  

if (count($filelabjobpr1)> 0){
   
foreach ($filelabjobpr1 as $filesabjpbpr1) {
    setup_postdata( $filesabjpbpr1 ); 
    $find_categ_only1 = $filesabjpbpr1->user_id;



$user_info = get_userdata($find_categ_only1);





  $custom_args = array(
    'post_type' => 'catering',
    'orderby'          => 'date',
    'order'            => 'DESC',
    'author'=> $find_categ_only1, 'showposts' => '1',
    'posts_per_page' => -1
 );


?>
    
<?php    
    
  $custom_query = new WP_Query( $custom_args ); ?>

  <?php if ( $custom_query->have_posts() ) : ?>


    <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

		  <?php $post_id = get_the_ID(); ?>
    

<?php $caterer_1 = get_field('caterer_company_name', $post_id); ?>
<?php $caterer_2 = get_field('caterer_company_description', $post_id); ?>
<?php $caterer_5 = get_field('caterer_minimum_order_amount', $post_id); ?>
<?php $caterer_6 = get_field('caterer_delivery', $post_id); ?>
<?php $caterer_7 = get_field('caterer_upload_your_logo', $post_id); ?>
<?php $post_author_id = get_post_field( 'post_author', $post_id ); ?>



  <div class="mining">
            <div class="catimage"><img src="<?php echo $caterer_7; ?>"/></div>
            <div class="catecontent">
                <h5><a href="http://scopun.co.uk/projects/catering1/author/<?php echo $user_info->user_login; ?>/"><?php the_title(); ?></a></h5>
                <p><?php echo wp_trim_words( $caterer_2, 40, '...' ); ?> </p>
                <!--<div class="reviews"><strong>Reviews:</strong> 
                    <div class="star-ratings-css">
                      <div class="star-ratings-css-top" style="width: 88%"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                      <div class="star-ratings-css-bottom"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                    </div> 
                </div>--> 
                <div class="spec"><strong>Specialities:</strong> <?php echo strip_tags(get_the_term_list( $post_id, 'specialities', ' ',' | ')); ?></div>
                <div class="cusine"><strong>Cusine:</strong> <?php echo strip_tags(get_the_term_list( $post_id, 'cusine', ' ',' | ')); ?></div>
                <div class="minorder"><strong>Minimum Order Amount:</strong> £<?php echo $caterer_5; ?></div>
                <div class="delivery"><strong>Delivery:</strong> <?php echo $caterer_6; ?></div>
                <div class="carting">
                <button class="buttonsnew" id="quotings_<?php echo $post_id; ?>" name="quotings_<?php echo $post_id; ?>">Get Quote</button> 
                    
                    
                    
                <!--<a  class="buttonsnew" href="http://scopun.co.uk/projects/catering1/author/<?php echo $user_info->user_login; ?>/">Get Quote</a>-->
                    
                    
                <button class="buttonsnew" id="favourite_categ_both_<?php echo $post_id; ?>" name="favourite_categ_<?php echo $post_id; ?>"><i class="fa fa-heart-o"></i></button>
                </div>
            </div>
        </div> 





<script type="text/javascript">
jQuery(document).ready(function(){
    
    
    
            jQuery("#quotings_<?php echo $post_id; ?>").click(function () {
                window.location='http://scopun.co.uk/projects/catering1/author/<?php echo $user_info->user_login; ?>';
            });
                
                
                
                
                
        jQuery("#favourite_categ_both_<?php echo $post_id; ?>").click(function () {
            var post_id="<?php echo $post_id; ?>";
            var user_id="<?php echo $current_user->ID; ?>";
            
            
            <?php if($current_user->ID != ""){ ?>
                
			var userdata2uee= "post_id="+post_id+"&user_id="+user_id;
			jQuery.ajax({
				type:"post",
				data:userdata2uee,
				url:"http://scopun.co.uk/projects/catering1/wp-content/themes/catering/add_favourite.php",
				cache:false,
				success:function(msg2r){
						alert(msg2r);
				}
	       });	
            
            <?php }else{ ?>
                
                alert("Please first you login then!");
                
            <?php } ?>
            
        });
});
</script>   
    <?php endwhile; ?>

  <?php wp_reset_postdata(); ?>

  <?php else:  ?>
    <!--<p><?php _e( 'Sorry, no product matched your criteria.' ); ?></p>-->
  <?php endif; ?>


<?php

}

}else{ ?>


<p style="color:red;">No Caterers found near your location.</p>


<?php

}


}else if($postcode != ""){


?>
















<?php

$values = array();

$args = array(
    'role'    => 'Caterer',
    'orderby' => 'ID',
    'order'   => 'DESC'
);


$users = get_users( $args );
foreach ( $users as $user ) {



  $custom_args = array(
      'post_type' => 'catering',
	   'orderby'          => 'date',
	  'order'            => 'DESC',
'author'=> $user->id, 'showposts' => '1',

'meta_query' => array(
        array(
            'key' => 'caterer_post_code',
            'value' => $postcode,
            'compare' => '='
        ),
    ),



'posts_per_page' => -1
    );







    
?>
    
<?php    
    
  $custom_query = new WP_Query( $custom_args ); ?>

  <?php if ( $custom_query->have_posts() ) : ?>


    <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

		  <?php $post_id = get_the_ID(); ?>
    

<?php $caterer_1 = get_field('caterer_company_name', $post_id); ?>
<?php $caterer_2 = get_field('caterer_company_description', $post_id); ?>
<?php $caterer_5 = get_field('caterer_minimum_order_amount', $post_id); ?>
<?php $caterer_6 = get_field('caterer_delivery', $post_id); ?>
<?php $caterer_7 = get_field('caterer_upload_your_logo', $post_id); ?>
<?php $post_author_id = get_post_field( 'post_author', $post_id ); ?>









  <div class="mining">
            <div class="catimage"><img src="<?php echo $caterer_7; ?>"/></div>
            <div class="catecontent">
                <h5><a href="http://scopun.co.uk/projects/catering1/author/<?php echo $user->user_login; ?>/"><?php the_title(); ?></a></h5>
                <p><?php echo wp_trim_words( $caterer_2, 40, '...' ); ?> </p>
                <!--<div class="reviews"><strong>Reviews:</strong> 
                    <div class="star-ratings-css">
                      <div class="star-ratings-css-top" style="width: 88%"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                      <div class="star-ratings-css-bottom"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                    </div> 
                </div>--> 
                <div class="spec"><strong>Specialities:</strong> <?php echo strip_tags(get_the_term_list( $post_id, 'specialities', ' ',' | ')); ?></div>
                <div class="cusine"><strong>Cusine:</strong> <?php echo strip_tags(get_the_term_list( $post_id, 'cusine', ' ',' | ')); ?></div>
                <div class="minorder"><strong>Minimum Order Amount:</strong> £<?php echo $caterer_5; ?></div>
                <div class="delivery"><strong>Delivery:</strong> <?php echo $caterer_6; ?></div>
                <div class="carting">
                <button class="buttonsnew" id="quotings_<?php echo $post_id; ?>" name="quotings_<?php echo $post_id; ?>">Get Quote</button> 
                <button class="buttonsnew" id="favourite_postcode_<?php echo $post_id; ?>" name="favourite_<?php echo $post_id; ?>"><i class="fa fa-heart-o"></i></button>
                </div>
            </div>
        </div> 





<script type="text/javascript">
jQuery(document).ready(function(){
    
    
    
         jQuery("#quotings_<?php echo $post_id; ?>").click(function () {
                window.location='http://scopun.co.uk/projects/catering1/author/<?php echo $user->user_login; ?>';
            });
    
    
        jQuery("#favourite_postcode_<?php echo $post_id; ?>").click(function () {
            var post_id="<?php echo $post_id; ?>";
            var user_id="<?php echo $current_user->ID; ?>";
            
            
            <?php if($current_user->ID != ""){ ?>
                
			var userdata2uee= "post_id="+post_id+"&user_id="+user_id;
			jQuery.ajax({
				type:"post",
				data:userdata2uee,
				url:"http://scopun.co.uk/projects/catering1/wp-content/themes/catering/add_favourite.php",
				cache:false,
				success:function(msg2r){
						alert(msg2r);
				}
	       });	
            
            <?php }else{ ?>
                
                alert("Please first you login then!");
                
            <?php } ?>
            
        });
});
</script>   
    <?php endwhile; ?>

  <?php wp_reset_postdata(); ?>

  <?php else:  ?>
   <!--<p><?php _e( 'Sorry, no product matched your criteria.' ); ?></p>-->
  <?php endif; ?>

	
        <?php $values[] = $custom_query->post_count; ?>
<?php } ?>




<?php 
$tmp = array_filter($values);
if (empty($tmp)) { ?>

<p style="color:red;">No Caterers found near your location.</p>

<?php } ?>











<?php


}else if($find_categ != ""){


$filelabjobpr = $wpdb->get_results("SELECT distinct user_id FROM category where categ_name = '$find_categ'");     
foreach ($filelabjobpr as $filesabjpbpr) {
    setup_postdata( $filesabjpbpr ); 
    $find_categ_only = $filesabjpbpr->user_id;

$user_info = get_userdata($find_categ_only);

  $custom_args = array(
    'post_type' => 'catering',
    'orderby'          => 'date',
    'order'            => 'DESC',
    'author'=> $find_categ_only, 'showposts' => '1',
    'posts_per_page' => -1
 );


?>
    
<?php    
    
  $custom_query = new WP_Query( $custom_args ); ?>

  <?php if ( $custom_query->have_posts() ) : ?>


    <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

		  <?php $post_id = get_the_ID(); ?>
    

<?php $caterer_1 = get_field('caterer_company_name', $post_id); ?>
<?php $caterer_2 = get_field('caterer_company_description', $post_id); ?>
<?php $caterer_5 = get_field('caterer_minimum_order_amount', $post_id); ?>
<?php $caterer_6 = get_field('caterer_delivery', $post_id); ?>
<?php $caterer_7 = get_field('caterer_upload_your_logo', $post_id); ?>
<?php $post_author_id = get_post_field( 'post_author', $post_id ); ?>



  <div class="mining">
            <div class="catimage"><img src="<?php echo $caterer_7; ?>"/></div>
            <div class="catecontent">
                <h5><a href="http://scopun.co.uk/projects/catering1/author/<?php echo $user_info->user_login; ?>/"><?php the_title(); ?></a></h5>
                <p><?php echo wp_trim_words( $caterer_2, 40, '...' ); ?> </p>
                <!--<div class="reviews"><strong>Reviews:</strong> 
                    <div class="star-ratings-css">
                      <div class="star-ratings-css-top" style="width: 88%"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                      <div class="star-ratings-css-bottom"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                    </div> 
                </div>--> 
                <div class="spec"><strong>Specialities:</strong> <?php echo strip_tags(get_the_term_list( $post_id, 'specialities', ' ',' | ')); ?></div>
                <div class="cusine"><strong>Cusine:</strong> <?php echo strip_tags(get_the_term_list( $post_id, 'cusine', ' ',' | ')); ?></div>
                <div class="minorder"><strong>Minimum Order Amount:</strong> £<?php echo $caterer_5; ?></div>
                <div class="delivery"><strong>Delivery:</strong> <?php echo $caterer_6; ?></div>
                <div class="carting">
                <button class="buttonsnew" id="quotings_<?php echo $post_id; ?>" name="quotings_<?php echo $post_id; ?>">Get Quote</button> 
                <button class="buttonsnew" id="favourite_categ_<?php echo $post_id; ?>" name="favourite_categ_<?php echo $post_id; ?>"><i class="fa fa-heart-o"></i></button>
                </div>
            </div>
        </div> 





<script type="text/javascript">
jQuery(document).ready(function(){
    
    
         jQuery("#quotings_<?php echo $post_id; ?>").click(function () {
                window.location='http://scopun.co.uk/projects/catering1/author/<?php echo $user_info->user_login; ?>';
            });
    
    
        jQuery("#favourite_categ_<?php echo $post_id; ?>").click(function () {
            var post_id="<?php echo $post_id; ?>";
            var user_id="<?php echo $current_user->ID; ?>";
            
            
            <?php if($current_user->ID != ""){ ?>
                
			var userdata2uee= "post_id="+post_id+"&user_id="+user_id;
			jQuery.ajax({
				type:"post",
				data:userdata2uee,
				url:"http://scopun.co.uk/projects/catering1/wp-content/themes/catering/add_favourite.php",
				cache:false,
				success:function(msg2r){
						alert(msg2r);
				}
	       });	
            
            <?php }else{ ?>
                
                alert("Please first you login then!");
                
            <?php } ?>
            
        });
});
</script>   
    <?php endwhile; ?>

  <?php wp_reset_postdata(); ?>

  <?php else:  ?>
<p style="color:red;">No Caterers found near your location.</p>
  <?php endif; ?>


<?php
}
}else{
?>




<?php
$IP = $_SERVER['REMOTE_ADDR'];
$APIKEY = 'cc4dd44628b78f22f0e2727bd394e1848a9428c0d19769c0f8449c4b1227d715';
$results = json_decode(file_get_contents('http://api.ipinfodb.com/v3/ip-city/?key=' .$APIKEY. '&ip=' .$IP. '&format=json'),TRUE);
$specifcuser = $results['zipCode'];
?>








<?php
$args = array(
    'role'    => 'Caterer',
    'orderby' => 'ID',
    'order'   => 'DESC'
);


$users = get_users( $args );
foreach ( $users as $user ) {



if($special != ""){


  $custom_args = array(
      'post_type' => 'catering',
	   'orderby'          => 'date',
	  'order'            => 'DESC',
'author'=> $user->id, 'showposts' => '1',

'tax_query' => array(
        array(
            'taxonomy' => 'specialities',
            'field' => 'slug',
            'terms' => $specials
        ),
    ),


'posts_per_page' => -1
    );



}else if($cusine != ""){


  $custom_args = array(
      'post_type' => 'catering',
	   'orderby'          => 'date',
	  'order'            => 'DESC',
'author'=> $user->id, 'showposts' => '1',

'tax_query' => array(
        array(
            'taxonomy' => 'cusine',
            'field' => 'slug',
            'terms' => $cusines
        ),
    ),


'posts_per_page' => -1
    );



}else if($delivery != ""){


  $custom_args = array(
      'post_type' => 'catering',
	   'orderby'          => 'date',
	  'order'            => 'DESC',
'author'=> $user->id, 'showposts' => '1',

'meta_query' => array(
        array(
            'key' => 'caterer_delivery',
            'value' => $delivery,
            'compare' => '='
        ),
    ),



'posts_per_page' => -1
    );



}else{


  $custom_args = array(
    'post_type' => 'catering',
    'orderby'          => 'date',
    'order'            => 'DESC',
    'author'=> $user->id, 'showposts' => '1',
    'posts_per_page' => -1
 );



}






    
?>


    
<?php    
    
  $custom_query = new WP_Query( $custom_args ); ?>

  <?php if ( $custom_query->have_posts() ) : ?>


    <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

		  <?php $post_id = get_the_ID(); ?>
    

<?php $caterer_1 = get_field('caterer_company_name', $post_id); ?>
<?php $caterer_2 = get_field('caterer_company_description', $post_id); ?>
<?php $caterer_5 = get_field('caterer_minimum_order_amount', $post_id); ?>
<?php $caterer_6 = get_field('caterer_delivery', $post_id); ?>
<?php $caterer_7 = get_field('caterer_upload_your_logo', $post_id); ?>
<?php $post_author_id = get_post_field( 'post_author', $post_id ); ?>










<?php
$postcodes = get_field('caterer_post_code', $post_id); 
$postcode1 = urlencode($specifcuser);
$postcode2 = urlencode($postcodes);

$api = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins='.$postcode1.'&destinations='.$postcode2.'&key=AIzaSyA0kSosFrpEtYsemBsw6vLBkvBygWtcDJI");
$data = json_decode($api);

?>


<?php 
$oxying = $data->rows[0]->elements[0]->distance->value * 0.000621371; 
$oxyingnow = round($oxying);
?>



<?php if($myrange != ""){ ?>

<?php if($myrange >= $oxyingnow){ ?>

  <div class="mining">
            <div class="catimage"><img src="<?php echo $caterer_7; ?>"/></div>
            <div class="catecontent">
                <h5><a href="http://scopun.co.uk/projects/catering1/author/<?php echo $user->user_login; ?>/"><?php the_title(); ?></a></h5>
                <p><?php echo wp_trim_words( $caterer_2, 40, '...' ); ?> </p>
                <!--<div class="reviews"><strong>Reviews:</strong> 
                    <div class="star-ratings-css">
                      <div class="star-ratings-css-top" style="width: 88%"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                      <div class="star-ratings-css-bottom"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                    </div> 
                </div>--> 
                <div class="spec"><strong>Specialities:</strong> <?php echo strip_tags(get_the_term_list( $post_id, 'specialities', ' ',' | ')); ?></div>
                <div class="cusine"><strong>Cusine:</strong> <?php echo strip_tags(get_the_term_list( $post_id, 'cusine', ' ',' | ')); ?></div>
                <div class="minorder"><strong>Minimum Order Amount:</strong> £<?php echo $caterer_5; ?></div>
                <div class="delivery"><strong>Delivery:</strong> <?php echo $caterer_6; ?></div>
                <div class="carting">
                <button class="buttonsnew" id="quotings_<?php echo $post_id; ?>" name="quotings_<?php echo $post_id; ?>">Get Quote</button> 
                <button class="buttonsnew" id="favourite_<?php echo $post_id; ?>" name="favourite_<?php echo $post_id; ?>"><i class="fa fa-heart-o"></i></button>
                </div>
            </div>
        </div> 





<script type="text/javascript">
jQuery(document).ready(function(){
    
    
         jQuery("#quotings_<?php echo $post_id; ?>").click(function () {
                window.location='http://scopun.co.uk/projects/catering1/author/<?php echo $user->user_login; ?>';
            });
    
    
        jQuery("#favourite_<?php echo $post_id; ?>").click(function () {
            var post_id="<?php echo $post_id; ?>";
            var user_id="<?php echo $current_user->ID; ?>";
            
            
            <?php if($current_user->ID != ""){ ?>
                
			var userdata2uee= "post_id="+post_id+"&user_id="+user_id;
			jQuery.ajax({
				type:"post",
				data:userdata2uee,
				url:"http://scopun.co.uk/projects/catering1/wp-content/themes/catering/add_favourite.php",
				cache:false,
				success:function(msg2r){
						alert(msg2r);
				}
	       });	
            
            <?php }else{ ?>
                
                alert("Please first you login then!");
                
            <?php } ?>
            
        });
});
</script>   

<?php  } ?>

<?php }else{ ?>


  <div class="mining">
            <div class="catimage"><img src="<?php echo $caterer_7; ?>"/></div>
            <div class="catecontent">
                <h5><a href="http://scopun.co.uk/projects/catering1/author/<?php echo $user->user_login; ?>/"><?php the_title(); ?></a></h5>
                <p><?php echo wp_trim_words( $caterer_2, 40, '...' ); ?> </p>
                <!--<div class="reviews"><strong>Reviews:</strong> 
                    <div class="star-ratings-css">
                      <div class="star-ratings-css-top" style="width: 88%"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                      <div class="star-ratings-css-bottom"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                    </div> 
                </div>--> 
                <div class="spec"><strong>Specialities:</strong> <?php echo strip_tags(get_the_term_list( $post_id, 'specialities', ' ',' | ')); ?></div>
                <div class="cusine"><strong>Cusine:</strong> <?php echo strip_tags(get_the_term_list( $post_id, 'cusine', ' ',' | ')); ?></div>
                <div class="minorder"><strong>Minimum Order Amount:</strong> £<?php echo $caterer_5; ?></div>
                <div class="delivery"><strong>Delivery:</strong> <?php echo $caterer_6; ?></div>
                <div class="carting">
                <button class="buttonsnew" id="quotingsw_<?php echo $post_id; ?>" name="quotingsw_<?php echo $post_id; ?>">Get Quote</button> 
                <button class="buttonsnew" id="favouritew_<?php echo $post_id; ?>" name="favouritew_<?php echo $post_id; ?>"><i class="fa fa-heart-o"></i></button>
                </div>
            </div>
        </div> 





<script type="text/javascript">
jQuery(document).ready(function(){
    
    
         jQuery("#quotingsw_<?php echo $post_id; ?>").click(function () {
                window.location='http://scopun.co.uk/projects/catering1/author/<?php echo $user->user_login; ?>';
            });
    
    
        jQuery("#favouritew_<?php echo $post_id; ?>").click(function () {
            var post_id="<?php echo $post_id; ?>";
            var user_id="<?php echo $current_user->ID; ?>";
            
            
            <?php if($current_user->ID != ""){ ?>
                
			var userdata2uee= "post_id="+post_id+"&user_id="+user_id;
			jQuery.ajax({
				type:"post",
				data:userdata2uee,
				url:"http://scopun.co.uk/projects/catering1/wp-content/themes/catering/add_favourite.php",
				cache:false,
				success:function(msg2r){
						alert(msg2r);
				}
	       });	
            
            <?php }else{ ?>
                
                alert("Please first you login then!");
                
            <?php } ?>
            
        });
});
</script>   

<?php } ?>











    <?php endwhile; ?>

  <?php wp_reset_postdata(); ?>

  <?php else:  ?>
    <!--<p><?php _e( 'Sorry, no product matched your criteria.' ); ?></p>-->
  <?php endif; ?>

	
        
<?php } ?>



<?php } ?>


