

  <h1 class="rightcontenttitle"> Admin Group </h1>

   <table border="1" cellpadding="5" cellspacing="0" width="80%" id="datalisttable">

                <thead>

                  <tr>

                    <th width="2%">&nbsp;</th>

                    <th width="4%">No</th>

                    <th width="19%">Group Name </th>

                    <th width="62%">Description </th>

                    <th width="13%"><a href="javascript:" id="add_data">Add Group </a></th>

                  </tr>

                </thead>

                <tbody>
                 <tr>

                    <td>&nbsp;</td>
                    <td>&nbsp;</td>

                    <td>&nbsp;</td>

                    <td>&nbsp;</td>

                    <td><a class="linkedit" data-id="2"><img src="<?php echo $base_url; ?>asset/cms/b_edit.png"></a>&nbsp;&nbsp;<a class="linkdelete" data-id=""><img src="<?php echo $base_url; ?>asset/cms/b_drop.png"></a></td>

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

    <h2>Add Admin Group</h2>

    <span id="updatestatus"></span>

    <br>

  

    <form action="" method="post" enctype="multipart/form-data" name="thedataform" id="thedataform" >

       <table border="0" width="500" cellpadding="10" cellspacing="0" >

          <tr>

            <td>Group Name</td>

            <td>:</td>

            <td>

              <input type="text" id="group_name" name="group_name" class="membertextfield" value="" required>

              <input type="hidden" id="group_id" name="group_id" class="membertextfield" value="" required>

              <span id="group_name_warning" class="warning"></span>

            </td>

          </tr>

          <tr hidden=true>

            <td>Upload new Image</td>

            <td>&nbsp;</td>

            <td>

            <input type="file" name="image" id="image"></td>

          </tr>

          <tr>

            <td>Description</td>

            <td>&nbsp;</td>

            <td><textarea name="description" id="description" required></textarea></td>

          </tr>

          <tr>

            <td>&nbsp;</td>

            <td>&nbsp;</td>

            <td>

              <input type="button" id="addgroup" name="addgroup" value="Add group">

              <input type="button" id="editgroup_btn" name="editgroup_btn" value="Update group">

            </td>

          </tr>

        </table>

    </form>

  </div>  

 

