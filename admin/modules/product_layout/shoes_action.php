<?php include("../../../config/config.php"); ?>

<?php include("../../../function/cms_layout_function.php"); ?>

<?php include "../../../classes/Product.php"; ?>

<?php

	

  $product_obj = new Product();



  $sql="";

  $GLOBALS['total_data_perpage'] = 10;

  

  //$_REQUEST['act'] = "paginglist"; // sample value 

  

  if (isset($_REQUEST["act"])) {

	  switch ($_REQUEST["act"]) {

		 

		 

		 

		 case "paginglist" :

		  

		   		$product_obj->paginglist_product();

		   

		   break;

		 

		 

		 

		 case "add" :

		   //--------- Start Add -----------

		   

		    

			$qshoes = $product_obj->addProduct();

			

		  

		   break;

		   //--------- End Add -----------

		 

		 

		 case "getdata" : // untuk edit 

		   //--------- Start Data Edit -----------

		   $product_obj->getSProduct();



		   break;

		   //--------- End Data Edit -----------

		 

		 case "edit" :

		   //--------- Start Edit -----------

		  	

			$qshoes=$product_obj->updateProduct($_REQUEST['shoes_id']);

			if ($qshoes) {

				echo "Edit shoes successfully...";

			}

			else {

				echo "Edit shoes failed...";

			}

		  

		  

		   break;

		   //--------- End Edit -----------

		    

		 

		 case "view" :  

		   //--------- Start View -----------

		   

		   break;

		   //--------- End View -----------

		   

		 case "delete" :  

		   //--------- Start Delete -----------

		   if (isset($_REQUEST["id"])) {

			 

			 $qshoes = $product_obj->deteleProduct($_REQUEST['id']);

			 

			 if ($qshoes) {

				echo "Delete shoes successfully...";

			}

			else {

				echo "Delete shoes failed...";

			}

		   }

		   break;

		   //--------- End Delete ----------- 

		   

		 case "totalpage" :  // Untuk paging 

		   //--------- Start View -----------

		   

		   $sql="SELECT * FROM ms_shoes ORDER BY shoes_id DESC";

		   $qshoes=mysql_query($sql);

		   $total= mysql_num_rows($qshoes);

		   $total_page=ceil($total/$total_data_perpage);

		   echo $total_page;

		   break;

		   //--------- End View -----------    

		   

	  }

  }

?>