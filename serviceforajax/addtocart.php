<?php 
	ob_start();
	session_start();
	ob_end_clean();

	include("../config/config.php");
	include("../classes/shoppingcart.php");

	if(isset($_POST["shoes_id"]) && isset($_POST["qty"])){
		//echo $_POST["qty"];
		//cho $_POST["shoes_id"];
		//die;
		$cart = new shoppingcart();
		$cart->addtocart($_POST["shoes_id"],$_POST["qty"]);
		//die;
		
		echo $cart->gettotalqty();
		//die;
	}
 ?>