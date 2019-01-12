       <div class="">

                <h1>Customer Detail</h1>


                <div id="contact_form" style="width:600px;">

                   <form method="post" name="contact" action="process/submit_edit_customer.php">

                        

                        <div style="float:left;"> 

                        <label><font color="#FF0000">*</font> Full Name : </label> <input required type="text" id="name" name="fullname" class="required input_field" value="<?php echo $fc['customer_name']; ?>" />

                        <div class="cleaner h10"></div>

                        

                        <label><font color="#FF0000">*</font> Email : </label> <input required type="email" id="email" name="email" class="validate-email required input_field" value="<?php echo $fc['customer_email']; ?>" />

                        <div class="cleaner h10"></div>

                        

                        <label><font color="#FF0000">*</font> Phone : </label> <input required type="text" name="phone" id="phone" class="input_field" value="<?php echo $fc['phone_no']; ?>"/>

                        <div class="cleaner h10"></div>

                         

                        <label><font color="#FF0000">*</font> Gender : </label><input required type="radio" name="sex" value="male" checked=<?php if($fc['gender'] == "Male"){echo "checked='checked'";}else{echo "false";}?>>Male

<input type="radio" name="sex" value="female">Female

                        <div class="cleaner h10"></div>

                        

                        <label><font color="#FF0000">*</font> Address : </label> <input required type="text" name="address" id="address" class="input_field" value="<?php echo $fc['customer_address']; ?>"/>

                        <div class="cleaner h10"></div>

                        

                         <label><font color="#FF0000">*</font> Post Code : </label> <input required type="text" name="post_code" id="address" class="input_field" value="<?php echo $fc['post_code']; ?>"/>

                        <div class="cleaner h10"></div>

                        </div><!-- left field -->

                        

                        <div style="float:right;" > 

                        <label><font color="#FF0000">*</font> Country : </label> <input required type="text" name="country" id="country" class="input_field" value="<?php echo $fc['country']; ?>"/>

                        <div class="cleaner h10"></div>

                        

                         <label><font color="#FF0000">*</font> Province : </label> <input required type="text" name="province" id="province" class="input_field" value="<?php echo $fc['province']; ?>"/>

                        <div class="cleaner h10"></div>

                        

                        <label><font color="#FF0000">*</font> City : </label> <input required type="text" name="city" id="city" class="input_field" value="<?php echo $fc['city']; ?>"/>

                        <div class="cleaner h10"></div>                        

        			

                        <label for="author"><font color="#FF0000">*</font> Username : </label> <input required type="text" id="username" name="username" class="required input_field" value="<?php echo $fc['username']; ?>"/>

                        <div class="cleaner h10"></div>

                        

                        <label for="author">Password : </label> <input type="password" id="password" name="password" class="input_field" value=""/>

                        <div class="cleaner h10"></div>

                        

                        <label for="author">Confirm Password : </label> <input type="password" id="cpassword" name="cpassword" class="input_field" value=""/>

                        <div class="cleaner h10"></div>

                        

                        </div><!-- right -->

                        <div style="clear:both;"></div>

                         <div class="cleaner h10"></div>

                        <input type="submit" class="submit_btn" name="submit" id="submit" value="Submit" />

                        

                    </form>

                </div>

            </div>
