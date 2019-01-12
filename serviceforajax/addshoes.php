<?php 
	include("../config/config.php");
	include("../classes/utility.php");
	include("../classes/database.php");
	include("../classes/shoes.php");

	$shoes_name = $_POST["shoes_name"];
	$brand_id = $_POST["brand_id"];
	$price = $_POST["price"];
	$stock = $_POST["stock"];
	$descripton = $_POST["description"];

	$db_obj = new database(true);
	$data = array("shoes_name"=>"'" . $shoes_name . "'",
				  "brand_id"=>$brand_id,
				  "price"=>$price,
				  "stock"=>$stock,
				  "description"=>"'" . $description . "'");
	

	$result = 0;
	$result = $db_obj->db_insert("ms_shoes",$data);

	if($result>0){
		echo "Add Data success";
	}else{
		echo "Add Data Failed";
	}
 ?>
