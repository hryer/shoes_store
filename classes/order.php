<?php 
	class order extends database {

		function __construct($root=false){
			parent::__construct($root);

		}

		function saveorder($customer_id=0,$address="",$city="",$country="",$email="",$phone="",$total_price=0){
			if(isset($_SESSION["cart"])){
				$data = array("customer_id"=>$customer_id,
				"address"=>"'" . $address . "'",
				"country"=>"'" . $country . "'",
				"city"=>"'" . $city . "'",
				"email"=>"'" . $email . "'",
				"phone"=>"'" . $phone . "'",
				"total_price"=> $total_price,
				"order_date"=>"now()"
				);

				$order_id = parent::db_insert("tr_order",$data);	

				for($i=0;$i<=count($_SESSION["cart"])-1;$i++){
					$sqldetail="SELECT price FROM ms_shoes WHERE shoes_id=" . $_SESSION["cart"][$i]["shoes_id"];
                   
					$shoesrow=parent::db_getonerow($sqldetail);

					$subtotal=$shoesrow["price"] * $_SESSION["cart"][$i]["qty"];

					$datadetail = array("order_id"=>$order_id,
						"shoes_id"=>$_SESSION["cart"][$i]["shoes_id"],
						"jumlah_barang"=>$_SESSION["cart"][$i]["qty"],
						"harga"=>$shoesrow["price"],
						"jumlah_harga"=>$subtotal);

					parent::db_insert("tr_order_detail",$datadetail);
					//echo $order_id;
				}
			}
		}
	}
 ?>	