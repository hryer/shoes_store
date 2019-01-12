<?php 
	include("../config/config.php");
	include("../classes/utility.php");
	include("../classes/database.php");
 	include("../classes/shoes.php");

 	$shoes_obj = new shoes($_REQUEST["shoes_id"],true);
 	echo "{";
 	echo "\"shoes_name\":" . "\"" . $shoes_obj->shoes_name() . "\",";
 	echo "\"shoes_id\":" . "\"" . $shoes_obj->shoes_id() . "\",";
 	echo "\"brand_id\":" . "\"" . $shoes_obj->brand_id() . "\",";
 	echo "\"price\":" . "\"" . $shoes_obj->price() . "\",";
 	echo "\"stock\":" . "\"" .$shoes_obj->stock() . "\",";
 	echo "\"description\":" . "\"" .$shoes_obj->description() . "\""; 
 	echo "}";
 ?>