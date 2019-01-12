<?php 
	ob_start();
	session_start();
	ob_end_clean();

	include("../config/config.php");
	include("../classes/database.php");

	if(isset($_POST["username"]) && isset($_POST["password"])){
		$db = new database($root=true);
		if($_POST["level"]=="user"){
		$level="user";
		$sql = "SELECT username,password,customer_name,customer_id FROM ms_customer WHERE username='" . $_POST["username"] . "' AND password='" . md5($_POST["password"]) . "'";
		}
		else{
			$level="admin";
			$sql = "SELECT admin_name FROM ms_user_admin WHERE username_admin='" . $_POST["username"] . "' AND password_admin='" . md5($_POST["password"]) . "'";
		}
		$result=$db->db_rowcount($sql);
	

		if($result>0){
			$rowcustomer=$db->db_getonerow($sql);
			if($level=="user"){
			$_SESSION["customer_name"]=$rowcustomer["customer_name"];
			$_SESSION["customer_id"]=$rowcustomer["customer_id"];
			echo $rowcustomer["customer_name"];
			}
			else{
				$_SESSION["admin"]=$rowcustomer["admin_name"];
				echo"1";	
			}
		}else{
			echo "failed";
		}

	}
 ?>