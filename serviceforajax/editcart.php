<?php 
	ob_start();
	session_start();
	ob_end_clean();

	include("../config/config.php");
	include("../classes/shoppingcart.php");

	if(isset($_POST["shoes_id"]) && isset($_POST["qty"])){

		$cart = new shoppingcart();
		$cart->editcart($_POST["shoes_id"],$_POST["qty"]);
		echo $cart->gettotalqty();
	}
 ?>