 <div id="sliderFrame">

     <div id="slider">

     <img src="images/slider/CAPA.jpg" />

     <img src="images/slider/puma-ronda1.jpg" />

     <img src="images/slider/skora6.jpg" />

     </div>

 </div>



 <h1>New Products</h1>
  
  <?php 
      $db = new database();
      $sql = "SELECT * FROM ms_shoes ORDER BY create_date DESC LIMIT 3";
      $product = $db->db_queryresult($sql);
   ?>  
  

  <?php if(count($product)>0){ ?>
        <?php foreach ($product as $row){ ?>
          <div class="product_box">

	            <h3><?php echo $row["shoes_name"];  ?></h3>
                <a href="<?php echo $base_url;?>productsdetail/<?php echo $row["shoes_id"]; ?>">
                <?php 
                  $sqlimg="SELECT image_name FROM ms_shoes_image WHERE shoes_id =" . $row["shoes_id"] . " AND maskot=1 " ;
               
                  $shoesimg=$db->db_getonerow($sqlimg);
                 ?>
                <img src="<?php echo $display_image_url . $shoesimg["image_name"]; ?>" width="200" height="150"/></a>
               <p class="product_price">Rp. <?php echo number_format($row["price"],2,",","."); ?></p>

                <p></p>
  

                <a href="javascript:" shoes-id="<?php echo $row["shoes_id"]; ?>" class="addtocart"></a>

                <a href="<?php echo $base_url;?>productsdetail/<?php echo $row["shoes_id"]; ?>" class="detail"></a>

            </div>
          <?php } ?>
   
   <?php } ?>
   <input type="hidden" id="qty" name="qty" value="1">