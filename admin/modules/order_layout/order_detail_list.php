<h1 class="rightcontenttitle">Order Detail  </h1>

<!-- data order cuuuy -->
	<?php
        
        $_GET['id'] = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : 1;
		
		$id = $_GET['id'];
        
        $str3 	= "select * from tr_order a, ms_customer b where a.customer_id = b.customer_id and order_id = $id";
        $q3		= mysql_query($str3);
        $f 		= mysql_fetch_array($q3);
        
    ?>

    <table width="600" border="0" cellpadding="5" cellspacing="0" id="table_order" style="">
      <tr>
        <td width="135">Order Id </td>
        <td width="12">:</td>
        <td width="378"><?php echo $f['order_id']?></td>
        <td width="35">&nbsp;</td>
      </tr>
      <tr>
        <td>Customer Name </td>
        <td>:</td>
        <td><?php echo $f['customer_name']?></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Address</td>
        <td>:</td>
        <td><?php echo $f['customer_address']?></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Email</td>
        <td>:</td>
        <td><?php echo $f['customer_email']?></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>

   <table border="1" cellpadding="5" cellspacing="0" width="80%" id="datalisttable">
    <thead>
      <tr>
       
        <th width="">No</th>
        
        <th width="">Shoes Name</th>
        <th width="">Jumlah Barang</th>
        <th width="">Harga</th>
        <th width="">Jumlah Harga</th>
        
       
      </tr>
    </thead>
    <tbody>
     <tr>
        
       <td>&nbsp;</td>
     
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
      
       
      
      </tr>
      
    </tbody>
  </table>
  
              <br>
              
              <div id="pagingplaceholder"></div>
              <br><br><br>
              
              <!---<a href="javascript:" id="addmemberbutton">+&nbsp;Add</a>
              &nbsp;&nbsp;&nbsp;--->     
              
              
              <script type="text/javascript" language="javascript">
                 var selectyesno=false;
                 var selectcount=0;
				 var activepage=1;
				 var totalpage=0;
				
				function getTotalPage() {
					var total=0;
					$.ajax({
						type:"POST",
						url:"modules/order_layout/order_detail_action.php?act=totalpage&order_id=<?php echo $_GET['id']?>",
						success: function(data) {
						  total=data;
						  // Empty pagingplaceholder  
						  $("#pagingplaceholder").html("");
						  
						  // Fill pagingplaceholder 
						   for (i=1;i<=total;i++) {
							 if (activepage==i) {
								$("#pagingplaceholder").append("<span class='activepagingitem'>" + i + "</span>"); 
							 }
							 else {
							  $("#pagingplaceholder").append("<a href='javascript:' class='pagingitem' page='" + i + "'>" + i + "</a>");	                        
							 }
							}
							
							$(".pagingitem").click(function() {
							  activepage= $(this).attr("page");	
							  getOrderData();
							  
								});
						  //------------------------ 	
						}
					 }); 
					 
					 return total;
		      }
				
                function getOrderData() {
                  $.ajax({
                      type:"POST",
                      url:"modules/order_layout/order_detail_action.php?act=paginglist&order_id=<?php echo $_GET['id']?>",
					  data:"page="+activepage,
                      success:function(data) {
						  
						  //alert(data);
						  
                       if (data!="") {	  
                        $("#datalisttable tbody").html(data);
                        
                        $(".linkview").click(function() {
                          getOrderDataDetail($(this).attr("data-id"));
						  $("#dataformplaceholder h2").html("View User Order ");
						  $("#thedataform input, #thedataform select, #thedataform textarea").attr("disabled",true); // disable klo cuma view	
                        });
		
                        $(".linkdelete").click(function() {
                         var yesno=window.confirm('Are You sure to delete this data ?');	
                         if (yesno) { 	
                          deleteOrderData($(this).attr("data-id"));	
                         }
                        });
                        
                        $(".selectdata").click(function() {
                            if ($(this).prop("checked")) {
                                selectcount++;
                            }
                            else {
                                selectcount--;
                            }
                            
                            if (selectcount>0) {
                                $("#deleteall").show();
                            }
                            else if (selectcount<0) {
                                selectcount=0;
                                $("#deleteall").hide();
                            }
                            
                        });
                        
						getTotalPage();
						
                        $("#selectall").show();
                         
                       }
                      }
                  });	
                }
                
                function getOrderDataDetail(id) {
				  
                  $.ajax({
                      type:"POST",
                      url:"modules/order_layout/order_detail_action.php?act=getdata&order_id=<?php echo $_GET['id']?>",
                      data:"id="+id,
                      dataType:"json",
                      success:function(data) {
						
						//alert(data); return false;
						
						// fleksibel 
                        $("#order_detail_id").val(data.order_detail_id);  
                        $("#customer_id").val(data.customer_id);
						$("#total_price").val(data.total_price);
						$("#address").val(data.address);						
						$("#country").val(data.country);
						$("#email").val(data.email);
						$("#phone").val(data.phone);
						
                      }
                  });	
                }
  
                
                /*
                function deleteAdminData(id) {
                  $.ajax({
                      type:"POST",
                      url:"modules/order_layout/order_detail_action.php?act=delete&order_id=<?php echo $_GET['id']?>",
                      data:$("#thedataform").serialize(),
                      success:function(data) {
                        $("#updatestatus").html(data);  
                        getOrderData();	
                           
                      }
                  });		
                }*/
                
				
				$("#editadmin").hide();
                $("#selectall").hide();
                $("#deleteall").hide();
                
                
                
                //----------Check Alll & Delete All --------------------
                $("#selectall").click(function() {
                  if (selectyesno==false) {
                   $(".selectdata").prop("checked",true); 	       
                   $(this).html("Deselect all");
                   selectyesno=true; 
                   
                  }
                  else {
                    $(".selectdata").prop("checked",false);  
                    $(this).html("Select All");
                    selectyesno=false;
                  }
                });
                
                
                $("#deleteall").click(function() {
                  var yatidak;
                  yatidak=confirm("Are you sure to delete this ?");
                  
                  if (yatidak) {
                    $(".selectdata:checked").each(function() {
                        deleteAdminData($(this).val());
                    });
                  }
                });
                //----------Check Alll & Delete All --------------------
                getOrderData();
				getTotalPage();
              </script>