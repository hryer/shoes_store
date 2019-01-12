<?php
 $utilityobj = new utility();

 if(!isset($_SESSION["customer_id"])){
      $utilityobj->gotopage("index.php?nologin");
 }
 
?>
	<h2>Checkout</h2>

            <h3>SHIPPING INFORMATION</h3>

           

           	<div id="contact_form" style="width:650px;">

            <form id="" action="process/save_order.php" method="post">

            <div class="content_half float_l checkout">

				Full Name (must be same as on your credit card):  

                  <input type="text"  style="width:300px;" value="<?php echo $_SESSION["customer_name"]; ?>" class="input_field" name="fullname" readonly required/>

                <br />

                <br />

              Address:

				<input type="text"  style="width:300px;"  value="" class="input_field" name="address" id="address" required/>

                <br />

                <br />

              City:

                <input type="text"  style="width:300px;"  value="" class="input_field" name="city" id="city" required/>

                <br />

                <br />

                Country:

                <input type="text"  style="width:300px;"  value="" class="input_field" name="country" id="country" required/>

            </div>

            

            <div class="content_half float_r checkout">

            	E-MAIL

				<input type="text"  style="width:300px;"  value="" class="input_field" name="email" id="email" required/>

                <br />

                <br />

          PHONE<br />

				<span style="font-size:10px">Please, specify your reachable phone number. YOU MAY BE GIVEN A CALL TO VERIFY AND COMPLETE THE ORDER.</span>

                <input type="text"  style="width:300px;"  value="" class="input_field" name="phone" id="phone"/>

            </div>

            

            <div class="cleaner h20"></div>             

            <?php if (isset($_SESSION["cart"])) { ?> 
             <?php if (!$utilityobj->isarrayempty($_SESSION["cart"])) { ?>
            <h3>CHECK YOUR ORDER</h3>

            

            <p> Here it is the list of shoes you were order, check it. If you want to update the cart go to <a href="shoppingcart.php"> Cart </a> .. </p>

            

            <table width="600" border="1" cellpadding="10" style="border-collapse:collapse">

              

              <tr>

                <td>No. </td>

                <td>Shoes </td>

                <td>Price</td>

                <td>Qty</td>

                <td>total</td>

              </tr>

             
              <?php 
			     $no=1;
				 $total=0;
			     for ($i=0;$i<=count($_SESSION["cart"])-1;$i++) {
			       $shoesobj=new shoes($_SESSION["cart"][$i]["shoes_id"]);
			   ?>  
              <tr>

                <td><?php echo $no; ?></td>

                <td><a href="index.php?detail&shoes_id=<?php echo $shoesobj->shoes_id(); ?>"><img width="80" src="<?php echo $display_image_url . $shoesobj->maskot_image($shoesobj->shoes_id()); ?>"></a></td>

                <td><strong><?php echo "Rp.&nbsp;" . number_format($shoesobj->price(),2,",","."); ?></strong></td>

                <td><?php echo $_SESSION["cart"][$i]["qty"]; ?></td>
                <?php
				  $subtotal=$shoesobj->price() * $_SESSION["cart"][$i]["qty"];
				?>  
                <td>Rp. <span id="total" ><?php echo number_format($subtotal,2,",","."); ?></span></td>

              </tr>
               <?php
			      $no=$no+1;
				  $total=$total+$subtotal;
			    ?>
              <?php } ?>
              

            </table>

			

             <div class="cleaner h10"></div>

            

            <h4>TOTAL AMOUNT: <strong>Rp. <?php echo number_format($total,2,",","."); ?><input type="hidden" name="total_price" id="total_price" value="<?php echo $total; ?>" /></strong></h4>
             <?php } ?>
			<?php } ?>

            <div class="cleaner h30"></div>

            

             <table style="border:1px solid #CCCCCC; border-collapse:collapse;" width="100%" cellpadding="5" border="1">

                <tr>

                    <td height="80" width="100"> <img src="images/bank-bca.png" alt="bca" width="150" height="100"/></td>

                    <td width="300" style="padding: 0px 20px;">Recommended if you have a BCA account. Fastest delivery time.

                    </td>

                    <td><a href="#" class="more">BCA</a></td>

                </tr>

                <tr>

                    <td  height="80"><img src="images/bank-mandiri.jpg" alt="mandiri" width="150" height="100"/>

                    </td>

                    <td  width="300" style="padding: 0px 20px;">Recommended if you have a Mandiri account. Fastest delivery time.</td>

                    <td><a href="#" class="more">MANDIRI</a></td>

                </tr>

            </table>

            

            <div class="cleaner h30"></div>

            

            <p><input type="checkbox" value="commit" name="commit" required/>

            

            

			I accept the <a href="#">terms of use</a> of this website.</p>

            

            <div class="cleaner h30"></div>

            

            <input type="submit" value="Order Now .. " class="submit_btn"/>       

           

            

            </form>

             </div>

            

            

