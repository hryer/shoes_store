<?php
	
	include "../../../config/config.php";
	
	// pick a maskot 
	
	$id = $_POST['id'];
	$shoes_id = $_POST['shoes_id'];
	
	$str = "update ms_shoes_image set maskot = 0 where shoes_id = $shoes_id"; 
	mysql_query($str);
	
	$str2 = "update ms_shoes_image set maskot = 1 where image_id = $id";
	mysql_query($str2);

?>