<?php include("../../../config/config.php"); ?>
<?php include("../../../function/cms_layout_function.php"); ?>
<?php include("../../../classes/Order_detail.php");

	$od_obj = new Order_detail();
	
  $sql="";
  $total_data_perpage=10;
  
  $order_id = isset($_REQUEST['order_id']) ? $_REQUEST['order_id'] : 1;
  
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
		   
		   $data = $od_obj->paginglist_order_detail($first_data,$total_data_perpage,$order_id);
		   
		   if (!empty($data)) {
			 foreach($data as $rowua) {
				 echo "<tr>";
				
				 
				 echo "<td align='center'>$no</td>"; 
				
				 echo "<td>$rowua[shoes_name]</td>";
				 echo "<td>$rowua[jumlah_barang]</td>";
				 echo "<td>".number_format($rowua[harga])."</td>";
				 echo "<td>".number_format($rowua[jumlah_harga])."</td>"; 
				 
				 
				
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
		   $od_obj->getdata_order_detail();
		   break;
		   //--------- End Data Edit -----------
		   
		   
		 case "totalpage" :  
		   //--------- Start View -----------
		   
		   $sql="SELECT * FROM tr_order ORDER BY order_id DESC";
		   $qua = mysql_query($sql);
		   $total= mysql_num_rows($qua);
		   $total_page=ceil($total/$total_data_perpage);
		   echo $total_page;
		   break;
		   //--------- End View -----------    
		   
	  }
  }
?>