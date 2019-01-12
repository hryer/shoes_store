<?php 
	include("../config/config.php");
	include("../classes/utility.php");
	include("../classes/database.php");

	$shoes_id = $_POST["shoes_id"];
	$shoes_name = $_POST["shoes_name"];
	$brand_id = $_POST["brand_id"];
	$price = $_POST["price"];
	$stock = $_POST["stock"];
	$description = $_POST["description"];

	$data = array("shoes_name"=>"'" . $shoes_name . "'",
					"brand_id"=>$brand_id,
					"price"=>$price,
					"stock"=>$stock,
					"description"=>"'" . $description . "'");

	$db_obj = new database(true);
	$result =$db_obj->db_update("ms_shoes",$data,"shoes_id=" . $shoes_id);

	echo $result;
 ?>