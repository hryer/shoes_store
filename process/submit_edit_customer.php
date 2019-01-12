<?php
	session_start();
	//submit edit customer
	
	include "../config/config.php";
	
	$customer_id= $_SESSION['customer_id'];
	$name 		= htmlentities($_POST["fullname"],	ENT_QUOTES);
	$email 		= htmlentities($_POST["email"], 	ENT_QUOTES);
	$phone 		= htmlentities($_POST["phone"], 	ENT_QUOTES);
	$gender 	= htmlentities($_POST["sex"],		ENT_QUOTES);
	$address 	= htmlentities($_POST["address"],	ENT_QUOTES);
	$post_code 	= htmlentities($_POST["post_code"], ENT_QUOTES);
	$country 	= htmlentities($_POST["country"],	ENT_QUOTES);
	$province 	= htmlentities($_POST["province"],	ENT_QUOTES);
	$city 		= htmlentities($_POST["city"],		ENT_QUOTES);
	$username 	= htmlentities($_POST["username"], 	ENT_QUOTES);
	$password 	= md5($_POST["password"]);
	$cpassword	= md5($_POST["cpassword"]);
	
	$flag = 0;
	
	if(empty($name) || empty($email) || empty($phone) || empty($gender)|| empty($address)|| empty($post_code)|| empty($country)|| empty($province)|| empty($city)|| empty($username))
	{
		$flag = 1 ;
			
	}
	if(!is_numeric($post_code) || !is_numeric($phone))
	{
		$flag = 1;	
	}
	if($password != $cpassword)
	{
		$flag = 1;
	}
	
	
	if($flag == 0)
	{
		if($password == md5(""))
		{
		  $sql = "UPDATE ms_customer SET
		  customer_name 	= '$name'		,
		  customer_email 	= '$email'		,
		  phone_no 			= '$phone'		,
		  gender			= '$gender'		,
		  customer_address	= '$address'	,
		  post_code			= '$post_code'	,
		  country			= '$country'	,
		  city				= '$city'		,
		  province			= '$province'	,
		  username			= '$username'	,
		  
		  create_date		= now() 
		  where 
		  customer_id 		= $customer_id ";
		}
		else
		{
		$sql = "UPDATE ms_customer SET
		  customer_name 	= '$name'		,
		  customer_email 	= '$email'		,
		  phone_no 			= '$phone'		,
		  gender			= '$gender'		,
		  customer_address	= '$address'	,
		  post_code			= '$post_code'	,
		  country			= '$country'	,
		  city				= '$city'		,
		  province			= '$province'	,
		  username			= '$username'	,
		  password 			= '$password'	,
		  create_date		= now() 
		  where 
		  customer_id 		= $customer_id ";
		}
		
		$query = mysql_query($sql,$connection) or die(mysql_error());
		header("location:../index.php?customer_detail&sucessed");
	}
	else
	{
		header("location:../index.php?customer_detail&error");
	}


?>