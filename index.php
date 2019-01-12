<?php

ob_start();

session_start();

ob_end_clean();

//$_SESSION['username'] = isset($_SESSION['username']) ? $_SESSION['username'] : ""; 

 ?>

<?php 	include "config/config.php"; 
		include "classes/utility.php";
		include "classes/database.php";		
		include "classes/shoes.php";
		include "classes/customer.php";
		include "classes/shoppingcart.php";

?>
	

 <?php //include "asset/crypt/cryptographp.fct.php"; ?>



<?php //$_SESSION['username'] = isset($_SESSION['username']) ? $_SESSION['username'] : NULL; ?>

<!DOCTYPE html>

<head>

	<?php include "layout/head_layout.php"; ?>

</head>



<body>

  <img id="preloader" src="<?php echo $base_url;?>asset/loader.gif">

  <div id="body_wrapper">



    <div id="wrapper">

<!-----------------------------------------------THIS IS HEADER ----------------------------------------------------->



	<div id="header">

    	<?php include "layout/header_layout.php"; ?>

    </div> 

   

<!---------------------------------------------- END OF HEADER ------------------------------------------------------>

    

    <div id="templatemo_menubar">

    	<?php include "layout/menu_layout.php"; ?>

             

        <div id="templatemo_search">

                <form action="index.php" method="get">

                	<input type="hidden" name="products"/>

                  <input type="text" value="" name="s" id="s" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />

                  <input type="submit" name="" value="" alt="Search" id="searchbutton" title="Search" class="sub_btn"  />

                </form>

        </div> 

    </div> 

<!----------------------------------------------  END OF MENU & SEARCH FORM ------------------------------------------> 

    <div id="templatemo_main">

    

    	<div id="sidebar" class="float_l">



            <?php include "layout/login_layout.php"; ?>

            

        	<?php include "layout/left_side_menu_layout.php"; ?>

            

            <?php include "layout/sidebar_box_layout.php"; ?>

            

        </div> <!-- END OF SIDE BAR -->

        

        <div id="content" class="float_r">
           <?php 

				if (isset($_GET['home'])) {

					//Jika ada

					include "layout/home_layout.php";

					

				}

				else if (isset($_GET['products'])) {

					include "layout/product_layout.php";

					

				}

				else if (isset($_GET["about"])) {

					include "layout/about_layout.php";	

				}

				else if (isset($_GET["regis_success"]))

				{

					include "layout/regis_success_layout.php";

					

				}
                
				else if (isset($_GET["regis_error"]))

				{

					include "layout/regis_error_layout.php";

					

				}
				  
				else if (isset($_GET["faqs"])) {

					include "layout/faqs_layout.php";

					

				}

				else if (isset($_GET["checkout"])) {

						include "layout/checkout_layout.php";

						
				}
				
				else if (isset($_GET["ordersuccess"]))

				{

					include "layout/ordersuccess_layout.php";

				}

                else if (isset($_GET["nologin"]))

				{

					include "layout/nologin_layout.php";

				}    
                  
				else if (isset($_GET["contact"])) {

					include "layout/contact_layout.php";

					
					

				}else if (isset($_GET["detail"])){

					include "layout/detail_product_layout.php";

					

					

				} else if (isset($_GET["shoppingcart"])) {
                    
				   include("layout/shoppingcart_layout.php");	 
					 
				}else if (isset($_GET["regis"])){

					/*if($_SESSION['username'] == "" || !isset($_SESSION['username']))

					{*/

						include "layout/regis_member_layout.php";

						

					//}

					/*else

					{

						header("location:index.php?customer_detail");

					}*/

					

				}else if (isset($_GET["customer_detail"])){

					

					//if($_SESSION['username'] != "" && isset($_SESSION['username']))

					//{

						//header("location:index.php?customer_detail");

						include "layout/detail_customer_layout.php";

						

					//}

					/*else

					{

						header("location:index.php?regis");

					}*/

					

				}else if(isset($_GET["getcustomer"])){
					include("getcustomer.php");
				} else {

					include "layout/home_layout.php";


				}

			

				

				?>
        	

            

            

    

        </div> <!--- END OF CONTENT FLOAT RIGHT -->

        

        <div class="cleaner"></div>

        

    </div> 

     <div class="cleaner"></div>

<!------------------------------------------------------------------ END OF MAIN -------------------------------------------------------------->

    

    <div id="templatemo_footer">

    	<?php include "layout/footer_layout.php"; ?>	

    </div> 

<!------------------------------------------------------------- End of footer -------------------------------------------------------------------->

</div> <!-- END of wrapper -->

</div> <!-- END of body_wrapper -->



</body>

</html>

<script type="text/javascript" language="javascript">
  
  function loginformvalidation(){
  	if($("#username").val()==""){
  		alert("Please, fill username");
  		$("#username").focus();
  		return false;
  	}

  	if($("#password").val()==""){
  		alert("Please, fill password");
  		$("#password").focus();
  		return false;
  	}

  	return true;
  }

  function showcart(){
  	  //alert("Test");
	 	$.ajax({
	 		type:"POST",
	 		url:"<?php echo $base_url; ?>serviceforajax/showcart.php",
	 		beforeSend: function() {
	 			$("#preloader").fadeIn(1500);
	 		},
	 		success: function(datares) {
	 			//alert("Ok");
	 			$("#preloader").fadeOut(1500);
	 			$("#shoppingcarttable tbody").html(datares);
	 			
	 			// start edit
	 			$(".editcart").click(function(){
	 				//alert($(this).attr("shoes-id"));
	 				var tmp="#qty" + $(this).attr("shoes-id");
	 				editcart($(this).attr("shoes-id"),$(tmp).val());
	 			});
	 			// end edit

	 			// start remove
	 			$(".removecart").click(function(){
	 				//alert($(this).attr("shoes-id"));
	 				var yesno;
	 				yesno = window.confirm("Are You sure to delete?");
	 				if(yesno==true){
	 					removecart($(this).attr("shoes-id"));
	 				}
	 			});
	 			// end remove
	 		}
	 	});
	}

	function editcart(shoes_id,qty){
		$.ajax({
			type:"POST",
			url:"<?php echo $base_url; ?>serviceforajax/editcart.php",
			data:"shoes_id=" + shoes_id + "&qty=" + qty,
			beforeSend: function(){
				$("#preloader").fadeIn(1000);
			},
			success:function(datares){
				$("#preloader").fadeOut(1000);
				$("#totalqty").html("<strong>" + datares + "&nbsp;items</strong>");
				showcart();
			}

		});
	}

	function removecart(shoes_id){
		$.ajax({
			type:"POST",
			url:"<?php echo $base_url; ?>serviceforajax/removecart.php",
			data:"shoes_id=" + shoes_id,
			beforeSend: function(){
				$("#preloader").fadeIn(800);
			},
			success:function(datares){
				// $("#preloader").fadeOut(800);
				$("#totalqty").html("<strong>" + datares + "&nbsp;items</strong>");
				showcart();
			}

		});
	}
  
  $(document).ready(function() {
	 ddsmoothmenu.init({

				mainmenuid: "top_nav", //menu DIV id

				orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"

				classname: 'ddsmoothmenu', //class added to menu's outer DIV

				//customtheme: ["#1c5a80", "#18374a"],

				contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]

			})

	 <?php if(isset($_SESSION["customer_name"])){ ?>
	 		$("#login_info").show();
	 		$("#login_box").hide();

	 <?php }else{ ?>
	 		$("#login_info").hide();
	 		$("#login_box").show();

	 <?php } ?>
	 $("#login_submit").click(function(){
	 	// alert("Login Submut was clicked...");

	 	if(loginformvalidation()==true){

	 		$.ajax({
	 			type:"POST",
	 			url:"<?php echo $base_url; ?>serviceforajax/ceklogin.php",
	 			data:"username=" + $("#username").val() + "&password=" + $("#password").val()+"&level=user",
	 			beforeSend: function(){
	 				$("#preloader").fadeIn(1500);
	 			},
	 			success: function(resdata){
	 				$("#preloader").fadeOut(1500);
	 				if(resdata!="failed"){
	 					$("#login_box").hide();
	 					$("#login_info").show();
	 					$("#customer_name_active").html(resdata);
	 				}else{
	 					$("#login_error").show();
	 				}

	 			}


	 		});
	 	}

	 });

	 // Start addtocart

	 $(".addtocart").click(function(){
	 	// alert($(this).attr("shoes-id"));
	 	var qty=1;
	 	if($("#qty").val()!="" && $("#qty").val()!=null && $("#qty").empty()){
	 		qty = $("#qty").val();
	 	}


	 	$.ajax({
	 		type:"POST",
	 		url:"<?php echo $base_url; ?>serviceforajax/addtocart.php",
	 		data:"shoes_id=" + $(this).attr("shoes-id") + "&qty=" + qty,
	 		beforeSend: function(){
	 			$("#preloader").fadeIn(1500);
	 		},
	 		success: function(resdata){
	 			$("#preloader").fadeOut(1500);
	 			$("#totalqty").html("<strong>" + resdata + "&nbsp;items</strong>");
	 		}
	 	});
	 });

	 // End addtocart

	 // clearcart
	 $("#clearcart").click(function(){
	 	$.ajax({
	 		type:"POST",
	 		url:"<?php echo $base_url; ?>serviceforajax/clearcart.php",
	 		beforeSend:function(){
	 			$("#preloader").fadeIn(1500);
	 		},
	 		success:function(datares){
	 			$("#preloader").fadeOut(1500);
	 			showcart();
	 			$("#totalqty").html("<strong>" + datares + "&nbsp;</strong>")
	 		}

	 	});
	 	
	 	
	 });
	 // endclearcart

	 // start showcart
	 showcart();
	 // end showcart

	 // start removecart
	 removecart($(this).attr("shoes-id"));
	 // end removecart
  });	
   	 
	
</script>