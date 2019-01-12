<?php 
	ob_start();
	session_start();
	ob_end_clean();

	include("../config/config.php");
	include("../classes/shoppingcart.php");

	$cart = new shoppingcart();
	$cart->clearcart();
	echo $cart->gettotalqty();
 ?>