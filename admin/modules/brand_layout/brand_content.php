<h1 class="rightcontenttitle">Brands </h1>

               <table border="1" cellpadding="5" cellspacing="0" width="80%" id="datalisttable">

                <thead>

                  <tr>

                    <th width="5%">&nbsp;</th>

                    <th width="5%">No</th>

                    <th width="73%">Brands Name</th>

                    <th>&nbsp;</th>

                  </tr>

                </thead>

                <tbody>

                 <tr>

                    <td>&nbsp;</td> 

                   <td>&nbsp;</td>

                    <td>&nbsp;</td>

                    <td><a class="linkedit" data-id="1"><img src="<?php echo $base_url; ?>asset/cms/b_edit.png"></a>&nbsp;&nbsp;<a class="linkdelete" data-id=""><img src="<?php echo $base_url; ?>asset/cms/b_drop.png"></a></td>

                  </tr>

                  <tr>

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

              <a href="javascript:" id="addbutton">+&nbsp;Add</a>

              &nbsp;&nbsp;&nbsp;

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

                <h2>Add Brands</h2>

                <span id="updatestatus"></span>

                <br>

        

                <form action="" method="post" enctype="multipart/form-data" name="thedataform" id="thedataform">

                  <table border="0" width="500" cellpadding="10" cellspacing="0">

                    <tr>

                      <td>Brands Name</td>

                      <td>:</td>

                      <td>

                        <input type="text" id="brand_name" name="brand_name" class="membertextfield" value="" onkeypress="clearwarning('#brand_name_warning')" >

                        <input type="hidden" id="brand_id" name="brand_id" value="">

                        <span id="brand_name_warning" class="warning"></span>

                      </td>

                    </tr>
                    <tr>
                     <td valign="top">Brand Desc.</td>
                     <td valign="top">:</td>
                     <td valign="top">
                       <textarea id="brand_desc" name="brand_desc" style="height:150px;" onkeypress="clearwarning('#brand_desc_warning')"></textarea>
                       <span id="brand_desc_warning" class="warning"></span>
                     </td>
                    </tr>   
                    <tr>

                      <td>&nbsp;</td>

                      <td>&nbsp;</td>

                      <td>&nbsp;</td>

                    </tr>

                    <tr>

                      <td>&nbsp;</td>

                      <td>&nbsp;</td>

                      <td>

                        <input type="button" id="addbrand" name="addbrand" value="Add Brand">

                        <input type="button" id="editbrand" name="editbrand" value="Update Brand">

                      </td>

                    </tr>

                  </table>

                </form>

              </div>  

              