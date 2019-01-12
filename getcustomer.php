<?php 
	if(isset($_GET["customer_id"])){
		if($_GET["customer_id"]!="" && is_numeric($_GET["customer_id"])){
			$customer_obj = new customer($_GET["customer_id"]);
			$utility_obj = new utility();
		
 ?>

 <h2><?php echo $customer_obj->customer_name(); ?></h2>
 <h2><?php echo $customer_obj->customer_address(); ?></h2>
 <h2><?php echo $customer_obj->customer_email(); ?></h2>

 	

 </p>

 <?php }
 } 
 ?>