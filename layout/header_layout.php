	

	<div id="site_title"><h1><a href="#">Kuy Shoes Store</a></h1></div>

        <div id="header_right">

        	<p>

	        <a href="<?php echo $base_url; ?>index.php?customer_detail">My Account</a> | <a href="<?php echo $base_url; ?>">My Wishlist</a> | <a href="<?php echo $base_url; ?>index.php?shoppingcart">My Cart</a> | <a href="<?php echo $base_url; ?>index.php?checkout">Checkout</a></p>

            <p>

            	Shopping Cart: <span id="totalqty"><strong>
            	<?php //session_destroy();
            		if(isset($_SESSION["cart"])){  ?>
            		<?php $cart = new shoppingcart(); 
            		//print_r($_SESSION["cart"]);
            		echo $cart->gettotalqty()?>
            	<?php } ?> items</strong></span> ( <a href="<?php echo $base_url; ?>index.php?shoppingcart">Show Cart</a> )

			</p>

		</div>

        <div class="cleaner"><div id="lala"></div></div>

        