<?php include("../../../config/config.php"); ?>

<?php include("../../../function/cms_layout_function.php"); ?>

<?php include("../../../classes/Order.php");



  $order_obj = new Order();



  $sql="";

  $total_data_perpage=10;

  

  if (isset($_REQUEST["act"])) {

	  switch ($_REQUEST["act"]) {

		  

		 case "paginglist" :

		   //------- Start Pa$total_data=10;

		   

		   //Check active page

		   $active_page=0;

		    

		   if (isset($_REQUEST["page"])) {

			 $active_page=$_REQUEST["page"]-1; 

		   }

		   else {

			 $active_page=0;  

		   }

		   

		   $first_data = $active_page * $total_data_perpage;

		     $no=$first_data+1;

		   

		  

		  // array data order

		  $data = $order_obj->paginglist_order($first_data,$total_data_perpage);

		  

		   if (!empty($data)) {

			 foreach($data as $rowua ) {

				 echo "<tr>";

				 echo "<td align='center'>";

				 echo getCheckBox($rowua["order_id"]);

				 echo "</td>";

				 

				 echo "<td align='center'>$no</td>"; 

				 echo "<td>$rowua[customer_name]</td>";

				 echo "<td>".number_format($rowua['total_price'])."</td>";

				 echo "<td>$rowua[address]</td>";

				 echo "<td>$rowua[city]</td>";

				 echo "<td>$rowua[email]</td>"; 

				 echo "<td>$rowua[phone]</td>"; 

				 

				 echo "<td>";

				 echo getLinkView($rowua["order_id"]);

				 echo "</td>"; 

				 echo "</tr>";

				 $no++; 

			 }

		   }

		   else {

			 echo "";   

		   }

		   

		   //------- End Paging Listv-----------

		   

		   break;

		 

		 case "getdata" : 

		   //--------- Start Data Edit -----------

		  $order_obj->get_data_order();

		   break;

		   //--------- End Data Edit -----------

		   

		 case "delete" :  

		   //--------- Start Delete -----------

		   if (isset($_POST["id"])) {

			 $order_obj->delete_order();

		   }

		   break;

		   //--------- End Delete ----------- 

		   

		 case "totalpage" :  

		   //--------- Start View -----------

		   

		   $sql="SELECT * FROM tr_order a, tr_order_detail b where a.order_id = b.order_id ORDER BY a.order_id DESC";

		   $qua = mysql_query($sql);

		   $total= mysql_num_rows($qua);

		   $total_page=ceil($total/$total_data_perpage);

		   echo $total_page;

		   break;

		   //--------- End View -----------    

		   

	  }

  }

?>