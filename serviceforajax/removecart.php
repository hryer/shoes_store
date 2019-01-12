<?php 
	ob_start();
	session_start();
	ob_end_clean();

	include("../config/config.php");
	include("../classes/shoppingcart.php");

	if(isset($_POST["shoes_id"])){
		// print_r($_POST["shoes_id"]);
		// echo $_POST["shoes_id"];
		
		$cart = new shoppingcart();
		$cart->removecart($_POST["shoes_id"]);
		echo $cart->gettotalqty();
	}
 ?>