<?php 

	ob_start();
	session_start();
	//ob_end_clean();
	include "../config/config.php";
	include "../classes/Login.php";
	
	$location = basename($_POST['this_location']);
	
	$login_obj = new Login();
	
	$login_process = $login_obj->login_process();
	
	if($login_process == "success"){
		
		if($location != "php3")
		{
		
			header("location:../$location");
		}
		else
		{
			header("location:..");
		}
	}
	else {
		//echo "<p> kondisi error jalan </p>"; exit;
		header("location:../index.php?loginerror");
		
	}
?>
