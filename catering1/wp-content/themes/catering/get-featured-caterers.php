<?php
$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');
$current_user = wp_get_current_user();

$newest = $_POST['newest'];
$highest = $_POST['highest'];
$lowest = $_POST['lowest'];

?>



<style>
    .mining{background-color: #fcfbf9;
    width: 100%;
    max-width: 48.55%;
    display: inline-block;
    vertical-align: top;
    padding: 10px;
    margin-right: 5px;
    margin-bottom: 7px;
}
    .catimage{     display: inline-block;
    vertical-align: middle;
    margin-right: 20px;}
    .catimage img{    width: 100px;
    height: 100px;}
    .catecontent{    display: inline-block;
    vertical-align: middle;
    width: 100%;
    max-width: 70%;}
    .catecontent h5{ margin-bottom: 0;}
    .address{font-size: 13px;
    font-style: italic;}



	@media only screen and (min-width: 320px) and (max-width: 736px){

.mining {
    max-width: 100%;
 
}

.catecontent {
    max-width: 55%;
    font-size: 14px;
}
.catecontent h5 {
    font-size: 14px;
}



}
</style>


<?php
$args = array(
    'role'    => 'Caterer',
    'orderby' => 'ID',
    'order'   => 'DESC',
    'number' => '12'
);


$users = get_users( $args );
foreach ( $users as $user ) {


  $custom_args = array(
    'post_type' => 'catering',
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
    

<?php $caterer_upload_your_logo = get_field('caterer_upload_your_logo', $post_id); ?>
<?php $post_author_id = get_post_field( 'post_author', $post_id ); ?>

<?php $caterer_address = get_field('caterer_address', $post_id); ?>
<?php $caterer_town = get_field('caterer_town', $post_id); ?>
<?php $caterer_post_code = get_field('caterer_post_code', $post_id); ?>
<?php $caterer_country = get_field('caterer_country', $post_id); ?>







    <div class="mining">
            <div class="catimage"><img src="<?php echo $caterer_upload_your_logo; ?>"/></div>
            <div class="catecontent">
                <h5><a href="http://scopun.co.uk/projects/catering1/author/<?php echo $user->user_login; ?>/"><?php the_title(); ?></a></h5>
                <div class="spec"><?php echo strip_tags(get_the_term_list( $post_id, 'specialities', ' ',', ')); ?></div>
                <div class="address"><?php echo $caterer_post_code; ?> <?php echo $caterer_address; ?> <?php echo $caterer_town; ?> <?php echo $caterer_country; ?></div>
            </div>
        </div> 








     
     
    <?php endwhile; ?>

  <?php wp_reset_postdata(); ?>

  <?php else:  ?>

  <?php endif; ?>

	
        
<?php } ?>








