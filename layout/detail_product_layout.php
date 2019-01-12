<?php 
    if(isset($_GET["shoes_id"])){
      IF($_GET["shoes_id"]!="" && is_numeric($_GET["shoes_id"])){
      $shoes_obj = new shoes($_GET["shoes_id"]);
      $utility_obj = new utility();
    

 ?>

      	<h2><?php echo $shoes_obj->shoes_name(); ?></h2>

            <div class="content_half float_l">

        

        	 <a title="Product Name"  rel='lightbox[roadtrip]' href='<?php echo $display_image_url . $shoes_obj->maskot_image($shoes_obj->shoes_id()); ?>' >
               <img width="300" height="225" src="<?php echo $display_image_url . $shoes_obj->maskot_image($shoes_obj->shoes_id());  ?>" />
             </a>
              
            
              <div class="img_box">

                <?php 
                  $shoes_img = $shoes_obj->get_image($shoes_obj->shoes_id());
                
                  if (!$utility_obj->isarrayempty($shoes_img)>0){
                    
                 ?> 

                   <?php foreach ($shoes_img as $rowimg) {
                     ?> 
                     <?php  
                            // buat ngambil string setelah titik
                            $fileext=strchr($rowimg["image_name"],".");
                            // rtrim ngambil sisa dari yang dicari
                            $filename=rtrim($rowimg["image_name"],$fileext);

                            $filetb=$filename . "_small" . $fileext;
                             ?>
                    <a title="Product Name"  rel='lightbox[roadtrip]' href='<?php echo $display_image_url . $rowimg["image_name"]; ?>' >
                       <img  rel="lightbox[roadtrip]" class="detail_img" src="<?php echo $display_image_url . $filetb; ?>"" alt="image" />
                     </a>
                    <?php } ?>
                  <?php } ?>

                </div>

               

            </div>

            <script type="text/javascript" src="js/plus_minus.js"></script>

            <div class="content_half float_r">

                <table>

                    <tr>

                        <td width="160">Price:</td>

                        <td>Rp.<?php echo number_format($shoes_obj->price(),2,",","."); ?></td>

                    </tr>

                    <tr>

                        <td>Availability:</td>

                        <td><?php echo $shoes_obj->stock(); ?></td>

                    </tr>

                    <tr>

                        <td>Manufacturer:</td>

                        <td><?php echo $shoes_obj->brand_name(); ?></td>

                    </tr>

                    <tr>

                    	<td>Quantity</td>

                        <td>

                        <input type="button" value=" - " onclick="minus()" id="plus" >

                       		<input type="text" value="1" style="width: 20px; text-align: right" name="qty" id="qty"/>

                        <input type="button" value=" + " onClick="plus()" id="minus">

                        </td>

                    </tr>

                </table>

                <div class="cleaner">

               
                </div>

                  <div class="desc_box">

                  	  <h5>Product Description</h5>

                        <p><?php echo $shoes_obj->description(); ?></p>	

                  </div>
                <a style="float:right; margin-right:90px;" href="javascript:" class="addtocart" id="aaxx" shoes-id="<?php echo $shoes_obj->shoes_id();  ?>"></a>

			</div>

            <div class="cleaner h30"></div>

            

          

            

          <div class="cleaner h50"></div>

             <?php 
                  $same_brand = $shoes_obj->get_all($shoes_obj->brand_id(),$shoes_obj->shoes_id());
                  if($same_brand!=NULL){


              ?>

            


            <?php foreach ($same_brand as $rowsame) {
               ?>
        	<div class="product_box">
              
             
            	<a href="#">
              <img src=" <?php echo $display_image_url . $shoes_obj->maskot_image($rowsame["shoes_id"]); ?>" alt="">
              </a>

                 <h3><?php echo $rowsame["shoes_name"]; ?></h3>

                <p class="product_price">Rp. <?php echo number_format($rowsame["price"],2,",","."); ?></p>

                <a href="javascript:" class="addtocart" 
                shoes-id="<?php echo $rowsame["shoes_id"]; ?>"></a>

                <a href="<?php echo $base_url;?>productsdetail/<?php echo $rowsame["shoes_id"]; ?>" class="detail"></a>

            </div>
            
          
          <?php 

            }
              }
                  }

            } ?>

