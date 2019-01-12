

  <h1 class="rightcontenttitle">Customer </h1>

   <table border="1" cellpadding="30" cellspacing="0" width="90%" id="datalisttable">

    <thead>

      <tr>

        <th width="">&nbsp;</th>

        <th width="">No</th>

        <th width="">customer Name</th>

        <th width="">Username </th>

        <th width="">Email </th>

        <th width="">gender</th>

        <th width="">No Telp</th>

        <th width="">Bank Account</th>

        <th width="">&nbsp;</th>

      </tr>

    </thead>

    <tbody>

     <tr>

       <td>&nbsp;</td>

       <td>&nbsp;</td>

       <td>&nbsp;</td>

       <td>&nbsp;</td>

       <td>&nbsp;</td>

       <td>&nbsp;</td>

       <td>&nbsp;</td>

       <td>&nbsp;</td>

       <td>&nbsp;</td>

        <td>

        <a class="linkedit" data-id="1"><img src="<?php echo $base_url; ?>asset/cms/b_edit.png"></a>&nbsp;&nbsp;

        <a class="linkdelete" data-id=""><img src="<?php echo $base_url; ?>asset/cms/b_drop.png"></a>

       	</td>

      </tr>

     

    </tbody>

  </table>

  

  <br>

  

  <div id="pagingplaceholder"></div>

  

  <br><br><br>

  

  <!---<a href="javascript:" id="addmemberbutton">+&nbsp;Add</a>

  &nbsp;&nbsp;&nbsp;--->

  <a href="javascript:" id="selectall">

  Select All

  </a>

  &nbsp;&nbsp;&nbsp;

  <a href="javascript:" id="deleteall">

  Delete All

  </a>

  <br>

  <br>

  <div id="dataformplaceholder">

   <!--- <div id="memberformclose">

      <a href="javascript:">X&nbsp;Close</a>

    </div> --->

    <h2>Add customer</h2>

    <span id="updatestatus"></span>

    <br>

  

    <form action="" method="post" enctype="multipart/form-data" name="thedataform" id="thedataform" >

      <table border="0" width="500" cellpadding="10" cellspacing="0">

        <tr>

          <td>customer Name</td>

          <td>:</td>

          <td>

            <input type="text" id="customer_name" name="customer_name" class="membertextfield" value="">

            <input type="hidden" id="customer_id" name="customer_id" value="">

            <span id="customer_name_warning" class="warning"></span>

          </td>

        </tr>

        

        <tr>

          <td>Username</td>

          <td>:</td>

          <td>

          	<input type="text" value="" name="username" id="username"  />

          </td>

        </tr>

        

        <tr>

          <td> Gender</td>

          <td>:</td>

          <td>

          	<input type="radio" name="gender" value="male" />&nbsp; Man

            <input type="radio" name="gender" value="female" /> &nbsp; Woman

          </td>

        </tr>

        

        <tr>

          <td> Province </td>

          <td>:</td>

          <td>

          	<input type="text" name="province" id="province" value="" />

            

          </td>

        </tr>

        

        <tr>

          <td> City </td>

          <td>:</td>

          <td>

          	<input type="text" name="city" id="city" value="" />

            

          </td>

        </tr>

        

        <tr>

          <td> Postal Code  </td>

          <td>:</td>

          <td>

          	<input type="text" name="postal_code" id="postal_code" value="" />

            

          </td>

        </tr>

        

        <tr>

          <td> Phone Number  </td>

          <td>:</td>

          <td>

          	<input type="text" name="phone_number" id="phone_number" value="" />

            

          </td>

        </tr>

        

        <tr>

          <td> Bank Account  </td>

          <td>:</td>

          <td>

          	<input type="text" name="bank_account" id="bank_account" value="" />

            

          </td>

        </tr>

        

         <tr>

          <td> Customer Address  </td>

          <td>:</td>

          <td>

          	<textarea name="address" id="address"></textarea>

            

          </td>

        </tr>

        

       

        <tr>

          <td>&nbsp;</td>

          <td>&nbsp;</td>

          <td>

            <input type="button" id="addcustomer" name="addcustomer" value="Add customer">

            <input type="button" id="editcustomer" name="editcustomer" value="Update customer">

          </td>

        </tr>

      </table>

    </form>

  </div>  

  

