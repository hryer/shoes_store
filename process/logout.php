<?php 

	// ini adalah logout

	ob_start();

	session_start();

	ob_end_clean();
	

	//menghapus sesion

	session_destroy();

	unset($_SESSION['username']);

	unset($_SESSION['customer_id']);

	unset($_SESSION['customer_name']);

	

	//kembali ke index.php

	header("location:../index.php");

?>