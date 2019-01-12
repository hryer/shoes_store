<?php 

	include "../config/config.php";
    include "../classes/database.php";
	
    if(isset($_POST['g-recaptcha-response'])&&$_POST['g-recaptcha-response']){
    	$secret = "6LfcGCMUAAAAAAZyCGD43DmOddaWyKRgrXD5ujVY";
    	$ip = $_SERVER['REMOTE_ADDR'];
    	$captcha = $_POST['g-recaptcha-response'] ;
    	$rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
    	
    	$arr = json_decode($rsp,TRUE);
    	if($arr['success']){
    		// start response
    		$customer_name 	= htmlentities($_POST["customer_name"],ENT_QUOTES);
			$customer_email = htmlentities($_POST["customer_email"],ENT_QUOTES);
			$phone_no = htmlentities($_POST["phone_no"],ENT_QUOTES);
			$gender = $_POST["gender"];
			$customer_address = htmlentities($_POST["customer_address"],ENT_QUOTES);
			$post_code = htmlentities($_POST["post_code"],ENT_QUOTES);
			$country = htmlentities($_POST["country"],ENT_QUOTES);
			$province = htmlentities($_POST["province"],ENT_QUOTES);
			$city = htmlentities($_POST["city"],ENT_QUOTES);
			$username = htmlentities($_POST["username"],ENT_QUOTES);
			$password = md5(htmlentities($_POST["password"],ENT_QUOTES));
			$term = $_POST['term'];

			$db = new database(true);

			$data=array("customer_name" =>"'" . $customer_name . "'", 
						"customer_email" =>"'" . $customer_email . "'",
						"phone_no" =>"'" . $phone_no . "'",
						"gender" =>"'" . $gender . "'",
						"customer_address" =>"'" . $customer_address . "'",
						"post_code" =>"'" . $post_code . "'",
						"country" =>"'" . $country . "'",
						"province" =>"'" . $province . "'",
						"city" =>"'" . $city . "'",
						"username" =>"'" . $username . "'",
						"password" =>"'" . $password . "'",
						"create_date" =>"now()");

	// echo '<pre>'; print_r($data); echo '</pre>';
	// exit;

			$result=$db->db_insert("ms_customer",$data);

			if($result){
				header("location:../index.php?regis_success");
			}else{
				header("location:../index.php?register_error");
			}

		// end success response
    	}else{
    		header("location:../index.php?regis_error");
    	}

    }
	
?>