<?php
$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');
$current_user = wp_get_current_user();
global $wpdb;

$find_categ = $_POST['find_categ'];
$postcode = $_POST['postcode'];

?>






<?php

echo do_shortcode( '[php snippet=38]' );

?>





<?php 





if($find_categ != "" && $find_categ != "0"){


$filelabjobpr = $wpdb->get_results("SELECT distinct user_id FROM category where categ_name = '$find_categ'");     
foreach ($filelabjobpr as $filesabjpbpr) {
    setup_postdata( $filesabjpbpr ); 
    $find_categ_only = $filesabjpbpr->user_id;

$user_info = get_userdata($find_categ_only);

  $custom_args = array(
    'post_type' => 'bakery',
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
    

<?php $caterer_1 = get_field('bakery_company_name', $post_id); ?>
<?php $caterer_2 = get_field('bakery_company_description', $post_id); ?>
<?php $caterer_7 = get_field('bakery_upload_your_logo', $post_id); ?>
<?php $post_author_id = get_post_field( 'post_author', $post_id ); ?>

<?php $caterer_address = get_field('bakery_address', $post_id); ?>
<?php $caterer_town = get_field('bakery_town', $post_id); ?>
<?php $caterer_post_code = get_field('bakery_post_code', $post_id); ?>
<?php $caterer_country = get_field('bakery_country', $post_id); ?>
<?php 

$blob = $user_info->user_login; 

$usernames = str_replace(" ","-",$blob);

?>

  <div class="mining">
            <div class="catimage"><img src="<?php echo $caterer_7; ?>"/></div>
            <div class="catecontent">
                <h5><a href="http://scopun.co.uk/projects/catering1/author/<?php echo $usernames; ?>/"><?php the_title(); ?></a></h5>

<div class="address"><?php echo $caterer_post_code; ?> <?php echo $caterer_address; ?> <?php echo $caterer_town; ?> <?php echo $caterer_country; ?></div>

                <p><?php echo wp_trim_words( $caterer_2, 40, '...' ); ?> </p>
                <div class="carting">
                <button class="buttonsnew" id="quotings_<?php echo $post_id; ?>" name="quotings_<?php echo $post_id; ?>">Buy Now</button> 
                </div>
            </div>
        </div> 





<script type="text/javascript">
jQuery(document).ready(function(){
         jQuery("#quotings_<?php echo $post_id; ?>").click(function () {
                window.location='http://scopun.co.uk/projects/catering1/author/<?php echo $usernames; ?>';
            });
});
</script>   
    <?php endwhile; ?>

  <?php wp_reset_postdata(); ?>

  <?php else:  ?>
<p style="color:red;">No Bakery found near your location.</p>
  <?php endif; ?>


<?php
}
}else if($postcode != ""){



















$values = array();

$args = array(
    'role'    => 'Bakery',
    'orderby' => 'ID',
    'order'   => 'DESC'
);


$users = get_users( $args );



foreach ( $users as $user ) {



  $custom_args = array(
      'post_type' => 'bakery',
	   'orderby'          => 'date',
	  'order'            => 'DESC',
'author'=> $user->id, 'showposts' => '1',

'meta_query' => array(
        array(
            'key' => 'bakery_post_code',
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
    

<?php $caterer_1 = get_field('bakery_company_name', $post_id); ?>
<?php $caterer_2 = get_field('bakery_company_description', $post_id); ?>
<?php $caterer_7 = get_field('bakery_upload_your_logo', $post_id); ?>
<?php $post_author_id = get_post_field( 'post_author', $post_id ); ?>

<?php $caterer_address = get_field('bakery_address', $post_id); ?>
<?php $caterer_town = get_field('bakery_town', $post_id); ?>
<?php $caterer_post_code = get_field('bakery_post_code', $post_id); ?>
<?php $caterer_country = get_field('bakery_country', $post_id); ?>





<?php 

$blobe = $user->user_login; 

$usernamese = str_replace(" ","-",$blobe);

?>

  <div class="mining">
            <div class="catimage"><img src="<?php echo $caterer_7; ?>"/></div>
            <div class="catecontent">
                <h5><a href="http://scopun.co.uk/projects/catering1/author/<?php echo $usernamese; ?>/"><?php the_title(); ?></a></h5>
<div class="address"><?php echo $caterer_post_code; ?> <?php echo $caterer_address; ?> <?php echo $caterer_town; ?> <?php echo $caterer_country; ?></div>
                <p><?php echo wp_trim_words( $caterer_2, 40, '...' ); ?> </p>
                <div class="carting">
                <button class="buttonsnew" id="quotingsw_<?php echo $post_id; ?>" name="quotingsw_<?php echo $post_id; ?>">Buy Now</button> 
                </div>
            </div>
        </div> 





<script type="text/javascript">
jQuery(document).ready(function(){
         jQuery("#quotingsw_<?php echo $post_id; ?>").click(function () {
                window.location='http://scopun.co.uk/projects/catering1/author/<?php echo $usernamese; ?>';
            });

});
</script>   


 
    <?php endwhile; ?>

  <?php wp_reset_postdata(); ?>

  <?php else:  ?>

  <?php endif; ?>

	
        <?php $values[] = $custom_query->post_count; ?>
<?php } ?>




<?php 
$tmp = array_filter($values);
if (empty($tmp)) { ?>

<p style="color:red;">No Bakery found near your location.</p>

<?php } 

































}else{
?>




<?php
$args = array(
    'role'    => 'Bakery',
    'orderby' => 'ID',
    'order'   => 'DESC'
);


$users = get_users( $args );
foreach ( $users as $user ) {




  $custom_args = array(
    'post_type' => 'bakery',
    'orderby'          => 'date',
    'order'            => 'DESC',
    'author'=> $user->id, 'showposts' => '1',
    'posts_per_page' => -1
 );






    
?>


    
<?php    
    
  $custom_query = new WP_Query( $custom_args ); ?>

  <?php if ( $custom_query->have_posts() ) : ?>


    <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

		  <?php $post_id = get_the_ID(); ?>
    

<?php $caterer_1 = get_field('bakery_company_name', $post_id); ?>
<?php $caterer_2 = get_field('bakery_company_description', $post_id); ?>
<?php $caterer_7 = get_field('bakery_upload_your_logo', $post_id); ?>
<?php $post_author_id = get_post_field( 'post_author', $post_id ); ?>

<?php $caterer_address = get_field('bakery_address', $post_id); ?>
<?php $caterer_town = get_field('bakery_town', $post_id); ?>
<?php $caterer_post_code = get_field('bakery_post_code', $post_id); ?>
<?php $caterer_country = get_field('bakery_country', $post_id); ?>

<?php 

$blobe = $user->user_login; 

$usernamese = str_replace(" ","-",$blobe);

?>

  <div class="mining">
            <div class="catimage"><img src="<?php echo $caterer_7; ?>"/></div>
            <div class="catecontent">
                <h5><a href="http://scopun.co.uk/projects/catering1/author/<?php echo $usernamese; ?>/"><?php the_title(); ?></a></h5>
<div class="address"><?php echo $caterer_post_code; ?> <?php echo $caterer_address; ?> <?php echo $caterer_town; ?> <?php echo $caterer_country; ?></div>
                <p><?php echo wp_trim_words( $caterer_2, 40, '...' ); ?> </p>
                <div class="carting">
                <button class="buttonsnew" id="quotingsw_<?php echo $post_id; ?>" name="quotingsw_<?php echo $post_id; ?>">Buy Now</button> 
                </div>
            </div>
        </div> 





<script type="text/javascript">
jQuery(document).ready(function(){
         jQuery("#quotingsw_<?php echo $post_id; ?>").click(function () {
                window.location='http://scopun.co.uk/projects/catering1/author/<?php echo $usernamese; ?>';
            });

});
</script>   













    <?php endwhile; ?>

  <?php wp_reset_postdata(); ?>

  <?php else:  ?>
    <!--<p><?php _e( 'Sorry, no product matched your criteria.' ); ?></p>-->
  <?php endif; ?>

	
        
<?php } ?>



<?php } ?>


