<h1 class="rightcontenttitle">User Admin</h1>

               <table border="1" cellpadding="5" cellspacing="0" width="80%" id="datalisttable">

                <thead>

                  <tr>

                    <th width="">&nbsp;</th>

                    <th width="">No</th>

                    <th width="">Admin Name</th>

                    <th width="">Group Name</th>

                    <th width="">Admin Address</th>

                    <th width="">Admin Email</th>

                    <th width="">username</th>

                    <th width="">Gender</th>

                    <th> <a href="javascript:" id="" class="add_data"> Add Admin </a></th>

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

                    <td><a class="linkedit" data-id="1"><img src="images/b_edit.png"></a>&nbsp;&nbsp;<a class="linkdelete" data-id=""><img src="images/b_drop.png"></a></td>

                  </tr>

                  

                </tbody>

              </table>

              <br>

              <div id="pagingplaceholder"> </div>

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

                <h2>Add User Admin</h2>

                <span id="updatestatus"></span>

                <br>

        

                <form action="" method="post" enctype="multipart/form-data" name="thedataform" id="thedataform">

                  <table border="0" width="500" cellpadding="10" cellspacing="0">

                    <tr>

                      <td>Admin Name</td>

                      <td>:</td>

                      <td>

                        <input type="text" id="admin_name" name="admin_name" class="membertextfield" value="">

                        <input type="hidden" id="admin_id" name="admin_id" value="">

                        <span id="brand_name_warning" class="warning"></span>

                      </td>

                    </tr>

                    <tr>

                    	 <td>Group Id</td>

                      <td>:</td>

                      <td>

                      	<select name="group_id">

                        <?php

							

							$sql = "select * from ms_user_group ";

							$q = mysql_query($sql);

							

							while($f = mysql_fetch_array($q))

							{

						?>

                        		<option value="<?php echo $f['group_id']?>"><?php echo $f['group_name']?></option>

						<?php	

							}

						

						?>

                      </td>

                    </tr>

                    <tr hidden=true>

                      <td>Upload new Image</td>

                      <td>:</td>

                      <td>

                      <input type="file" name="image" id="image"></td>

                    </tr>

                    <tr>

                      <td>Admin Address </td>

                      <td>:</td>

                      <td><textarea id="admin_address" name="admin_address"></textarea></td>

                    </tr>

                    <tr>

                      <td>Admin Email </td>

                      <td>:</td>

                      <td><input type="email" id="admin_email" name="admin_email"></td>

                    </tr>

                    <tr>

                      <td>gender </td>

                      <td>:</td>

                      <td><input type="radio" name="gender" value="male" checked="checked" /> Male 

                      <input type="radio" name="gender" value="female"/> Female

                      </td>

                    </tr>

                    <tr>

                      <td>Username </td>

                      <td>:</td>

                      <td><input type="text" id="username" name="username"></td>

                    </tr>

                    <tr>

                      <td>Password </td>

                      <td>:</td>

                      <td><input type="password" id="password" name="password"></td>

                    </tr>

                    <tr>

                      <td>&nbsp;</td>

                      <td>&nbsp;</td>

                      <td>

                        <input type="button" id="addadmin" name="addadmin" value="Add Admin">

                        <input type="button" id="editadmin" name="editadmin" value="Update Admin">

                      </td>

                    </tr>

                  </table>

                </form>

              </div>  

              

              

              

             

                

                