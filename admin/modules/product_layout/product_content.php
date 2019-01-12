



  <h1 class="rightcontenttitle"> Products </h1>



   <table border="1" cellpadding="30" cellspacing="0" width="90%" id="datalisttable">



    <thead>



      <tr>



        <th width="6%">&nbsp;</th>



        <th width="8%">No</th>



        <th width="30%">Product Name</th>



        <th width="10%">Categories Name</th>



        <th width="10%">Stock </th>



        <th width="11%">Harga</th>



        <th width="25%"><a href="#" class="add_data"> + Add Data </a></th>



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



  &nbsp;&nbsp;&nbsp;-->



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



    </div> -->



    <h2>Add Products</h2>



    <span id="updatestatus">  </span>



    <br><br>



  	


    <!--
    <div id="dialog_add_stock" title="" action="" >



    	<form id="add_stock_form" method="post" action=""> 



          <input type="text" name="shoes_stock" id="shoes_stock" />



          <input type="hidden" name="shoes_id_ax" id="shoes_id_ax" value="">



          <input type="button" value="add" id="add_stock_btnxx" onClick="#">



        </form>



    </div>
    -->



    <form action="" method="post" enctype="multipart/form-data" name="thedataform" id="thedataform" >



      <table border="0" width="500" cellpadding="10" cellspacing="0">



        <tr>



          <td>Product Name</td>



          <td>:</td>



          <td>



            <input type="text" id="shoes_name" name="shoes_name" class="membertextfield" value="">



            <input type="hidden" id="shoes_id" name="shoes_id" value="">



            <span id="shoes_name_warning" class="warning"></span>



          </td>



        </tr>



        <tr>



          <td>Select Brand</td>



          <td>:</td>



          <td>



          	<select name="brand_id" id="brand_id">
            	<option value="">select brand name</option>
              <?php 
                $brand_obj = new brand(true);
                echo $brand_obj->createoptionbrand(0);
               ?>
            </select>



          </td>



        </tr>



        <tr>



          <td>Price</td>



          <td>:</td>



          <td>



          	<input type="text" value="" name="price" id="price"  />



          </td>



        </tr>



        <tr>



          <td>Stock</td>



          <td>:</td>



          <td>



          	<input type="text" value="" name="stock" id="stock"  />



          </td>



        </tr>



         <tr>



          <td>Description </td>



          <td>:</td>



          <td>



          	<textarea id="desc" name="desc"></textarea>



          </td>



        </tr>



        



        <tr id="field_upload">



          <td>Upload new Image</td>



          <td>:</td>



          <td><a id="id_pti" href=""> Upload Image </a></td>



        </tr>



        <tr>



          <td>&nbsp;</td>



          <td>&nbsp;</td>



          <td>



            <input type="button" id="addshoes" name="addshoes" value="Add Products">



            <input type="button" id="editshoes" name="editshoes" value="Update Products">



          </td>



        </tr>



      </table>



    </form>



  </div>  



  


