<?php defined( 'ABSPATH' ) OR die( 'This script cannot be accessed directly.' );
/*
* Template Name: List Bakery
*/
$us_layout = US_Layout::instance();
get_header();
$titlebar_vars = array(
	'title' => 'Bakery',
);
us_load_template( 'templates/titlebar', $titlebar_vars );


$find_categ = $_GET['find_categ'];
$postcode = $_GET['postcode'];
?>





<div class="l-main">
		<div class="l-main-h i-cf">
			<main class="l-content">
				<section class="l-section">
					<div class="l-section-h i-cf">
                        
                        

<style>
.pro{text-align: center; padding: 20px;}
.pro img{width: 100px;}

    
    .maincate{}
    .filtercar{ vertical-align: top;   display: inline-block;
    width: 100%;    padding-right: 20px;
    max-width: 33.33%;}
    .mainsec{    display: inline-block;
    width: 100%;
    max-width: 66.33%;
    vertical-align: top;}
    .catimage{    display: inline-block;
    width: 120px;
}
    
    .catimage img{    width: 100px;
    height: 100px;}
    
    .catecontent{    display: inline-block;
    width: 550px;
    vertical-align: top;}
    .catecontent h5{margin-bottom: 0;}
    
.buttonsnew {
    background: #F36C21;
    color: #fff;
    text-transform: uppercase;
    padding: 10px 30px;
    font-size: 14px;
}
    
    
.buttonsnew:hover {
    background: #383838;
}
    
    
    
    .catecontent p{}

    .reviews{}
    .spec{}
    .cusine{}
    .minorder{display: inline-block;
    margin-right: 20px;}
    .delivery{    display: inline-block;}
    .carting{margin-top: 10px;}
    
    .mining{background: #fcfbf9;  margin-bottom: 20px; padding: 20px;}
    
    

.rating { 
  border: none;
  display: inline-block;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #F36C21;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #F36C21;  } 
    
    
    
    .filtercar h6{     border: 2px solid #f5f5f5;
    padding: 10px;
    text-transform: uppercase;
    font-size: 15px;}
    .filtercar ul{      margin-left: 20px;  list-style: none;}
    .filtercar li{}
    .filtercar input[type="checkbox"] {
            margin-top: 6px;
    }
    
     .deliveryq {
            margin-top: 6px;
    }
    
.slider {
    -webkit-appearance: none;
    width: 100%;
    height: 15px;
    border-radius: 5px;
    background: #d3d3d3;
    outline: none;
    opacity: 0.7;
    -webkit-transition: .2s;
    transition: opacity .2s;
}

.slider:hover {
    opacity: 1;
}

.slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background: #F36C21;
    cursor: pointer;
}

.slider::-moz-range-thumb {
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background: #F36C21;
    cursor: pointer;
}
    
    
.slidecontainer input[type="range"] {
               height: 5px;
    border: unset;
    }   
    
 .slidecontainer input[type="range"]:focus {
            box-shadow: unset;
    }   
       
    
    
    
    
    

.star-ratings-css {
  unicode-bidi: bidi-override;
  color: #c5c5c5;
  font-size: 20px;
  height: 25px;
  width: 100px;
  position: relative;
  padding: 0;
        display: inline-block;
}
.star-ratings-css-top {
  color: #F36C21;
  padding: 0;
  position: absolute;
  z-index: 1;
  display: block;
  top: 0;
  left: 0;
  overflow: hidden;
}
.star-ratings-css-bottom {
  padding: 0;
  display: block;
  z-index: 0;
}


    
    .pagination{ }    
    .nextpage{     cursor: pointer;   background: #f5f5f5;
    display: inline-block; padding: 5px 20px;}
    .pagnav{     cursor: pointer;   background: #f5f5f5;
    display: inline-block; padding: 5px 20px;}
    .previouspage{     cursor: pointer;   background: #f5f5f5;
    display: inline-block; padding: 5px 20px;}
    
    
    
    .nextpage:hover{ background: #F36C21; color: #fff;}
    .pagnav:hover{ background: #F36C21; color: #fff;}
    .previouspage:hover{ background: #F36C21; color: #fff;}
    
    
    .tophesearch{    margin-bottom: 20px;}
    .tophesearch input{}
    .tophesearch h4{}
    
    
    
    .selectingcateg{
        
background: #fff;
padding-left: 10px;
 -webkit-appearance: none;
    -moz-appearance: none;
    -webkit-border-radius: 0px;
    background-image: url(https://image.flaticon.com/icons/svg/60/60781.svg);
    background-position: 97% 50%;
    background-repeat: no-repeat;
    background-size: 12px;
        
        
    }
    
    
    .mainsearch{margin-bottom: 20px;
    background: #fcfbf9;
    padding: 30px;
    text-align: center;}
    .categscopun{    text-align: left;    display: inline-block;
    width: 100%;
    max-width: 40%;}
    .categscopun select{    height: 45px;}
    .postciding{     text-align: left;   display: inline-block;
    width: 100%;
    max-width: 40%;}
    .postciding input{ background: #fff;   height: 45px;}
    .findbtn{    display: inline-block;}
    .findbtn button{background: #383838;
    color: #fff;
    text-transform: uppercase;
    padding: 10px 30px;
    font-size: 14px;}
    
     .address{    font-size: 13px;
    font-style: italic;
    color: #000;
    font-weight: bold;}






@media only screen and (min-width: 320px) and (max-width: 736px){

.filtercar {
    max-width: 100%;
    padding-right: 0;
}
.mainsec {
    max-width: 100%;
}
.searchtextbox {
    margin-right: 0;
    max-width: 100% !important;
    margin-bottom: 10px;
}
.button {
    width: 100%;
}
.catecontent {
    width: 100%;
}



}




</style>







<div class="maincate">
    <div class="filtercar">
        
        
        


        <h6>Category</h6>   
        <ul>   
        <li><input type="checkbox" class="specialq" id="special" name="special" value="Birthday Cakes"/> Birthday Cakes</li>
        <li><input type="checkbox" class="specialq" id="special" name="special" value="Wedding Cakes"/> Wedding Cakes</li>
        <li><input type="checkbox" class="specialq" id="special" name="special" value="Photo Cakes"/> Photo Cakes </li>
     
        </ul>
        
 <!--
        
        <h6>Distance</h6> 
        
        
        
<div class="slidecontainer">
  <input type="range" min="1" max="5000" value="1" class="slider" id="myRange" name="myRange">
  <p style="font-size: 12px;">Miles: <span id="demo"></span></p>
</div>

<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>
        
      -->
        
    </div>
    
    <div class="mainsec">
        
        
        
        
        <div class="tophesearch">


         
            
  
<?php if($postcode != "" || $find_categ != "0"){ ?>
<?php if($postcode != ""){ ?>
<?php echo "<strong>Postcode: </strong>".$postcode; ?>
<?php  } ?>

<?php if($find_categ != "0" && $find_categ != ""){ ?>
<?php echo "<strong>Category: </strong>".$find_categ; ?>
<?php  } ?>

<?php  } ?>  

          
       
            

            
            
            
        </div>
        
        

        
 
<div id="preloader" class="pro">
       <img src="http://scopun.co.uk/projects/catering1/wp-content/uploads/2019/02/lg.gooey-ball-lodaer.gif"/>
</div>       
<div id="view_caterers"></div>
        
        

        
        
        
    </div>
</div>



<input type="hidden" id="postcode" name="postcode" value="<?php echo $postcode; ?>">
<input type="hidden" id="find_categ" name="find_categ" value="<?php echo $find_categ; ?>">



 <script type="text/javascript"> 

    function view_feed_more(){
            var find_categ=jQuery('#find_categ').val();
var postcode=jQuery('#postcode').val();
			var userdata2uee= "postcode="+postcode+"&find_categ="+find_categ;
			jQuery.ajax({
				type:"post",
				data:userdata2uee,
				url:"http://scopun.co.uk/projects/catering1/wp-content/themes/catering/get-bakery.php",
				cache:false,
				success:function(msg2r){
						jQuery('#preloader').show();
						jQuery('#view_caterers').html(msg2r);	
                                                jQuery('#preloader').fadeOut(1000);
				}
	       });	
    }
</script>



<script type="text/javascript">
jQuery(document).ready(function(){
     view_feed_more();
});
</script>    


                        
<script type="text/javascript">
        jQuery('.specialq').on('change', function(){
            var special = [];
            jQuery('[name="special"]:checked').each(function(i,e) {
                special.push(e.value);
            });
            special = special.join(',');
            
			var userdata2uee1= "special="+special;
			jQuery.ajax({
				type:"post",
				data:userdata2uee1,
				url:"http://scopun.co.uk/projects/catering1/wp-content/themes/catering/get-bakery.php",
				cache:false,
				success:function(msg2r){
						jQuery('#preloader').show();
						jQuery('#view_caterers').html(msg2r);	
                        jQuery('#preloader').fadeOut(1000);
				}
	       });	   
        });
</script> 

              
    
                        
<script type="text/javascript">
        jQuery('#myRange').on('change', function(){
            var myRange=jQuery('#myRange').val();
			var userdata2uee= "myRange="+myRange;
			jQuery.ajax({
				type:"post",
				data:userdata2uee,
				url:"http://scopun.co.uk/projects/catering1/wp-content/themes/catering/get-bakery.php",
				cache:false,
				success:function(msg2r){
						jQuery('#preloader').show();
						jQuery('#view_caterers').html(msg2r);	
                        jQuery('#preloader').fadeOut(1000);
				}
	       });	
        });
</script> 
                        
                        
                        


 </div>
				</section>
			</main>
		</div>
</div>









<?php
get_footer();

