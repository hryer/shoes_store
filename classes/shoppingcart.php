<?php 
	
	class shoppingcart{
		function __construct(){
			if(!isset($_SESSION["cart"])){
				$_SESSION["cart"]=array();
			}
		}

		function checkcart($shoes_id=0){
			$result=false;
			if($shoes_id>0){
				for($i=0;$i<=count($_SESSION["cart"])-1;$i++){
					if($_SESSION["cart"][$i]["shoes_id"]==$shoes_id){
						$result=true;
						break;
					}
				}
			}
			return $result;
		}

		function changeqty($shoes_id=0,$qty=0){
			if($shoes_id>0 && $qty>0){
				for($i=0 ; $i<=count($_SESSION["cart"])-1;$i++){
					if($_SESSION["cart"][$i]["shoes_id"]==$shoes_id){
						$_SESSION["cart"][$i]["qty"]=$_SESSION["cart"][$i]["qty"]+$qty;
					}
				}
			}
		}

		function addtocart($shoes_id=0,$qty=0){
			if($shoes_id>0 && $qty>0){
				if($this->checkcart($shoes_id)==true){
					$this->changeqty($shoes_id,$qty);
				}else{
				 $_SESSION["cart"][]=array("shoes_id"=>$shoes_id,"qty"=>$qty);
				}
			}
		}

		function removecart($shoes_id=0){
			
			if($shoes_id>0){
				for($i=0 ; $i<=count($_SESSION["cart"])-1;$i++){
					if($_SESSION["cart"][$i]["shoes_id"]==$shoes_id){
						// untuk hapus array php
						array_splice($_SESSION["cart"],$i,1);
						break;
					}
				}
			}
		}

		function editcart($shoes_id=0,$qty){
			if($shoes_id>0 && $qty>0){
				for($i=0 ; $i<=count($_SESSION["cart"])-1;$i++){
					if($_SESSION["cart"][$i]["shoes_id"]==$shoes_id){
						// timpa qty
						$_SESSION["cart"][$i]["qty"]=$qty;
						break;
					}
				}
			}
		}

		function gettotalqty(){
			$total=0;

			
			for($i=0;$i<=count($_SESSION["cart"])-1;$i++){
				$total=$total+$_SESSION["cart"][$i]["qty"];
			}

			return $total;
		}

		function clearcart(){
			$_SESSION["cart"]=array();
			
		}
	}
 ?>