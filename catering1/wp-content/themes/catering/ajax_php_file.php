<?php
$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');
global $wpdb;

if(!$_FILES['file']['error']){
	$uploaddir = 'menu_image/'; // change this
	$file = $_FILES['file'];
	$ext = pathinfo($file['name'], PATHINFO_EXTENSION);
	$ext = strtolower($ext);
	$fileName = uniqid(time(), false).'.'.$ext;
	$destinationfile = $uploaddir . $fileName;
	if(move_uploaded_file($file['tmp_name'], $destinationfile)){  ?>

<input type="hidden" id="menu_image" name="menu_image" value="<?php echo $fileName; ?>">
 


<?php
	}
}
?>

