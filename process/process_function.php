<?php
	
	include "../function/functions_cart.php";
	
	function save_order($customer_id)
	{
		//include "../config/config.php";
		
		$cart_obj = new Cart();
		
		$total_price = $cart_obj->get_order_total();
		
		$fullname 	 = htmlentities($_POST['fullname'],		ENT_QUOTES);
		$address	 = htmlentities($_POST['address'],		ENT_QUOTES);
		$city 		 = htmlentities($_POST['city'],			ENT_QUOTES);
		$country 	 = htmlentities($_POST['country'],		ENT_QUOTES);
		$email		 = htmlentities($_POST['email'],		ENT_QUOTES);
		$phone		 = htmlentities($_POST['phone_number'],	ENT_QUOTES);
		
		$sql_insert_order 	 = " insert into tr_order set 	 	 ";
		$sql_insert_order	.= " customer_id = '$customer_id'	,";
		$sql_insert_order	.= " address 	 = '$address'		,";
		$sql_insert_order	.= " city	 	 = '$city'			,";
		$sql_insert_order	.= " country	 = '$country'		,"; 
		$sql_insert_order	.= " email		 = '$email'			,"; 
		$sql_insert_order	.= " total_price = '$total_price'	,"; 
		$sql_insert_order	.= " phone		 = '$phone'			,";
		$sql_insert_order	.= " order_date	 = now()	 		 "; 
		
		$q = mysql_query($sql_insert_order) or die(mysql_error());
		
		return $q;
		
	}
	
	function get_data_order()
	{
		//include "../config/config.php";
		
		//$cid = $_SESSION['customer_id'];
		$str = "select * from tr_order order by order_date DESC LIMIT 1";
		$q = mysql_query($str);
		$f = mysql_fetch_array($q);
		
		return $f;	
	}
	
	function validation()
	{
		$commit 	= $_POST['commit'];
		$fullname 	= htmlentities($_POST['fullname'],	ENT_QUOTES);
		$address	= htmlentities($_POST['address'],	ENT_QUOTES);
		$city 		= htmlentities($_POST['city'],		ENT_QUOTES);
		$country 	= htmlentities($_POST['country'],	ENT_QUOTES);
		$email		= htmlentities($_POST['email'],		ENT_QUOTES);
		$phone		= htmlentities($_POST['phone_number'],ENT_QUOTES);
		
		print_r($_POST);
		
		//$post_code  = htmlentities($_POST['phone_number'],ENT_QUOTES);
		
		$flag = 0;
		
		if(empty($address) || empty($city) || empty($country) || empty($email) || empty($phone))
		{
			$flag = 1;
			echo "<p> kondisi satu jalan ..  </p>";
		}
		
		if(!is_numeric($phone))
		{
			$flag = 1;
			echo "<p> kondisi dua jalan ..  </p>";
		}
		
		if(!isset($commit))
		{
			$flag = 1;
			echo "<p> kondisi tiga jalan ..  </p>";
		}
		
		echo "<p> Done ..  </p>";
		//exit;
		return $flag;
		/*if($commit == "")
		{
			return false;	
		}
		else
		{
			return true;	
		}*/
		
	}
	
	function save_order_detail($order_id)
	{
		//include "../config/config.php";
		
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			 
			$shoes_id		= $_SESSION['cart'][$i]['shoes_id'];
			$q				= $_SESSION['cart'][$i]['qty'];
			$price			= get_price($shoes_id);
			$jumlah_harga	= $price * $q;
			
			$sql  = "insert into tr_order_detail set 		 ";
			$sql .= "order_id 			='$order_id'		,";
			$sql .= "shoes_id 			='$shoes_id'		,";
			$sql .= "jumlah_barang		='$q'				,";
			$sql .= "harga				='$price'			,";
			$sql .= "jumlah_harga		='$jumlah_harga'	 ";
			
			$q = mysql_query($sql) or die(mysql_error());
			return $q;
		}
		
	}
?>