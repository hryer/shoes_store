<?php /*session_start(); 

include "config/authentification.php"; */ 



include("../config/config.php");
// include("../config/database_config.php");
include("../classes/utility.php");
include("../classes/database.php");
include("../classes/shoes.php");
include("../classes/brand.php"); 
  ob_start();
  session_start();
  ob_end_clean();
  if(empty($_SESSION["admin"])){
    header("location:index.php");
  }
?>

<!doctype html>

<html>

  <head>

    <meta charset="utf-8">

    <title>CMS</title>

    

    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/css/cmsstyle.css">

    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/css/ui-lightness/jquery-ui.css">

    
  </head>

    

  <body>
    <img src="../asset/loader.gif" id="theloading">
    <div id="cmswrapper">

      <div id="header">

        <!--- start header -->

         <div id="leftheader">

         <img src="<?php echo $base_url; ?>/images/templatemo_logo.png" width="166" height="24"> </div>

         <div id="rightheader">

           Welcome <span id="activeuser">Active User</span><br><a href="#">My Account</a>&nbsp;|&nbsp; <a href="config/logout_process.php">logout</a>

         </div>

        <!--- end header -->

      </div>

      <div id="headerseparator"></div>

      <div id="content">

       <!--- start content -->

        <div id="leftcontent">

         <!--- start Left Content -->

           <ul class="menuwrapper">

              <li class="menuitem">

                <a class="menuitemlink menuitemlinkiconoff" href="javascript:">Products</a>

                <ul class="submenuitem">
                    <li><a href="admin.php?p=brand">Brands</a></li>
                    <li><a href="admin.php?p=product">Products</a></li>

                </ul>

              </li>

              

              <li class="menuitem">

                <a class="menuitemlink menuitemlinkiconoff" href="javascript:">Customer</a>

                <ul class="submenuitem">

                    <li><a href="admin.php?p=customer">Customer</a></li>

                   

                </ul>

              </li>

              

              

              

              <li class="menuitem">

                <a class="menuitemlink menuitemlinkiconoff" href="javascript:">Transaction</a>

                <ul class="submenuitem">

                    <li><a href="admin.php?p=order">Order </a></li>

                </ul>

              </li>

              <li class="menuitem">

                <a class="menuitemlink menuitemlinkiconoff" href="javascript:">Admin</a>

                <ul class="submenuitem">

                    <li><a href="admin.php?p=user_group">Admin Group</a></li>

                    <li><a href="admin.php?p=user_admin">Admin List</a></li>

                </ul>

              </li>

              <li class="menuitem" hidden=true>

                <a class="menuitemlink menuitemlinkiconoff" href="javascript:">Item 5</a>

                <ul class="submenuitem">

                    <li><a href="">Submenuitem 1</a></li>

                    <li><a href="">Submenuitem 2</a></li>

                </ul>

              </li>

           </ul>

         <!--- end Left Content-->

        </div>

        <div id="rightcontent">

         <!--- start Right Content -->
           <?php
		    $admin_page="";
		    if (isset($_GET["p"])) {
			 if ($_GET["p"]!="") {	
			  $admin_page=$_GET["p"] . "_layout/" . $_GET["p"] . "_content.php";
			  include($adminlayoutmodule_url . $admin_page);
			 }
			}
		    
			
		    ?>
         <!--- end Right Content -->

        </div>

       <!--- end content --> 

      </div>

      <div id="footer">

        <!--- start footer -->

        

        <!--- end footer -->

      </div>

    </div> 
    <script type="text/javascript" language="javascript" src="<?php echo $base_url; ?>/js/jquery-1.9.1.js"></script>

    <script type="text/javascript" language="javascript" src="<?php echo $base_url; ?>/js/jquery-ui.js"></script> 
    <script type="text/javascript" language="javascript" src="<?php echo $base_url; ?>/js/dropdownmenu.js"></script>

    <script type="text/javascript" language="javascript">

      function showshoes(){
        $.ajax({
          type:"POST",
          url:"<?php echo $base_url; ?>serviceforajax/showshoesadmin.php",
          beforeSend:function(){
            $("#theloading").fadeIn(1000);
          },
          success:function(data){
            $("#theloading").fadeOut(1000);
            $("#datalisttable tbody").html(data);
            
            $(".linkedit").click(function(){
              $("#dataformplaceholder").fadeIn(1500);
              $("#editshoes").show();
              $("#addshoes").hide();
              $("#dataformplaceholder h2").html("Edit Product");

              var distance = Math.round($("#dataformplaceholder").offset().top-$("body").offset().top);
              
              filldatashoesedit($(this).attr("shoes-id"));
              
              $("html,body").animate({
                scrollTop:distance
              },2000);
            });

            $(".linkdelete").click(function(){
              alert($(this).attr("shoes-id"));
              var yesno;
              yesno = window.confirm("Are you sure to delete this shoes?");

              if(yesno==true){
                  deleteshoes($(this).attr("shoes-id"));
              }
             
            });
          }


        });
      }

      function filldatashoesedit(shoes_id){
        $.ajax({
          type:"POST",
          url:"<?php echo $base_url; ?>serviceforajax/showdatashoesedit.php",
          data:"shoes_id=" + shoes_id,
          dataType:"json",
          beforeSend:function(){
            $("#theloading").fadeIn(1000);
          },
          success:function(dataedit){
            $("#theloading").fadeOut(1000);
            $("#shoes_name").val(dataedit.seme);
            $("#shoes_id").val(dataedit.shoes_id);
            $("#brand_id").val(dataedit.brand_id);
            $("#price").val(dataedit.price);
            $("#stock").val(dataedit.stock);
            $("#desc").val(dataedit.description);

          }
        });
      }

      function deleteshoes(shoes_id){
        $.ajax({
          type:"POST",
          url:"<?php echo $base_url; ?>serviceforajax/deleteshoes.php",
          data:"shoes_id=" + shoes_id,
          beforeSend: function(){
            $("#theloading").fadeIn(1000);
          },
          success:function(data){
            showshoes();
          }

        });
      }

      function formvalidationshoes(){
        if($("#shoes_name").val()==""){
          alert("Please fill Shoes Name");
          $("#shoes_name").focus();
          return false;
        }

        if($("#brand_id").val()==""){
          alert("Please select Category / Brand");
          $("#brand_id").focus();
          return false;
        }


        if($("#price").val()==""){
          alert("Please fill price");
          $("#price").focus();
          return false;
        }


        if($("#stock").val()==""){
          alert("Please fill stock");
          $("#stock").focus();
          return false;
        }


        if($("#desc").val()==""){
          alert("Please fill description");
          $("#desc").focus();
          return false;
        }


        if($("#brand_id").val()==""){
          alert("Please select Category / Brand");
          $("#brand_id").focus();
          return false;
        }

        return true;

      }

      function clearformshoes(){
        $("#shoes_name").val("");
        $("#brand_id").val("");
        $("#price").val("");
        $("#stock").val("");
        $("#desc").val("");    
      }
      $(document).ready(function(){
        
        dropdownmenu();

        // nampilin data shoes
        showshoes();

        //hide dataformplaceholder
        $("#dataformplaceholder").hide();

        $(".add_data").click(function(){
            $("#addshoes").show();
            $("#editshoes").hide();
            $("#dataformplaceholder").fadeIn(1000);
            $("#dataformplaceholder h2").html("Add Product");

            var distance;
            distance = Math.round($('#dataformplaceholder').offset().top - $('body').offset().top);
            $('html,body').animate({scrollTop : distance},2000);

        });

        // tambah event untuk tag idshoes
        $("#addshoes").click(function(){

          if(formvalidationshoes() == true){
            $.ajax({
              type:"POST",
              url:"<?php echo $base_url ?>serviceforajax/addshoes.php",
              data:"shoes_name=" + $("#shoes_name").val() + "&brand_id=" + $("#brand_id").val() + "&price=" + $("#price").val() + "&stock=" + $("#stock").val() + "&description=" + $("#desc").val() ,
              beforeSend:function(){
                $("#theloading").fadeIn(1000);
              },
              success:function(){
                showshoes(); 
                clearformshoes();
                $("#dataformplaceholder").fadeOut(1000);
                $("html,body").animate({scrollTop : 0},2000);           
              }
            });
          }

        });

        $("#editshoes").click(function(){
          if(formvalidationshoes() == true){
              $.ajax({
                type:"POST",
                url:"<?php echo $base_url; ?>serviceforajax/editshoes.php",
                data:"shoes_id=" + $("#shoes_id").val() + "&shoes_name=" + $("#shoes_name").val() + "&brand_id=" + $("#brand_id").val() + "&price=" + $("#price").val() + "&stock=" + $("#stock").val() + "&description=" + $("#desc").val(),
                beforeSend:function(){
                  $("#theloading").fadeIn(1500);
                },
                success:function(){
                  $("#theloading").fadeOut(1500);
                  showshoes();
                  clearformshoes();
                  $("#dataformplaceholder").fadeOut(1000);
                  $("html,body").animate({scrollTop : 0},2000); 
                }
              });
          }
        });


      });

    </script>
	
  </body>

</html>