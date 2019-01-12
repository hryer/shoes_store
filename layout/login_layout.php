<div id="login_info" class="sidebar_box">
   <div style="padding:8px;">
     <div>Halo selamat Datang , </div> 
     <div><span id="customer_name_active">
          <?php if(isset($_SESSION["customer_name"])){?>
            <?php echo $_SESSION["customer_name"]; ?>
          <?php } ?></span></div>
     <div>
       <a href="process/logout.php" style="margin-right:10px;">Log Out</a>
       <a href="index.php?customer_detail"> Profile User </a>
     </div>
   </div>
</div>

<div id="login_box" class="sidebar_box" >
            	<span class="bottom"></span>

                <h3>Login</h3>

         	

                <div id="login_form" class="content" style="width:222px;">

                <form action="process/submit_login.php" method="post" name="contact">

                  <input type="hidden" value="<?php echo $_SERVER['REQUEST_URI'] ?>" name="this_location"  />

                  <label> Username : </label>

                  <input type="text" name="username" id="username" value="" required class="required input_field" />

                  <div class="cleaner h10"></div>

                  <label> Password : </label>

                  <input type="password" name="password" required id="password" value="" class="required input_field" />

                  <div class="cleaner h10"></div>

                  <input class="submit_btn login" name="submit" id="login_submit" value="Login" type="button" style="float:left; margin-right:10px;">

                   <input class="submit_btn sign_up " id="submit" onClick="location.href='<?php echo $base_url;?>index.php?regis'" value="Sign Up" type="button" style="float:left; margin-right:10px;">

           

                </form>

                 <div class="cleaner h10"></div>

                 
                <span id="login_error" class="error" style="color:#F00" >

                Email/Password error!<br />please log in again..

                </span>

          

               </div>      

           

</div> 

