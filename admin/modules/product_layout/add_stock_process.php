<?php
	
	include "../../../config/config.php";
	include "../../../classes/Product.php";
	
	$shoes_id = $_POST['shoes_id'];
	$shoes_stock = $_POST['shoes_stock']; // stock baru 
	
	$act = $_REQUEST['act'];
	
	$kk = new Product();
	
	
	switch($act)
	{
		case "add_stock" : 
		
		$kk->add_stock_php($shoes_id,$shoes_stock);
		
		break;
		
		case "get_stock" :
		
		$kk->getStock($shoes_id);
		
		break;
	}


?>