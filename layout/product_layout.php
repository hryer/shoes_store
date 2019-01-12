<h1> Products</h1>
 <?php 


    if( isset( $_GET['brand_id'] ) && !empty( $_GET['brand_id'] ) ){
    $brand_id = $_GET['brand_id'];
    $db = new database();
    $sql = "SELECT * FROM ms_shoes  WHERE brand_id = $brand_id ";   
    }else{
      $sql = "SELECT * FROM ms_shoes";
    }  
    $shoes = $db->db_queryresult($sql);       
?>
 <?php 
    if(count($shoes)>0){
  ?>
<?php 
        foreach ($shoes as $row) {
       
          $sqlimg="SELECT image_name FROM ms_shoes_image WHERE shoes_id =" . $row["shoes_id"] . " AND maskot=1 " ;
          $shoesimg=$db->db_getonerow($sqlimg);
                                 
?>
    
         <div class="product_box">

             <a href="<?php echo $base_url;?>index.php?detail&shoes_id=<?php echo $row["shoes_id"] ?>"> 

            <!-- echo $v, getimagesize($v) ? " = OK  \n" : " = Not valid \n";
              --> 

               <img src=<?php echo $display_image_url . $shoesimg["image_name"]; ?> alt="" width="200" height="150" />
            
              <!--  <img src="<?php echo $base_url ;?>images/no_product_image.jpg" width="200" height="150"> -->
             
             </a>

            <h3><?php echo $row["shoes_name"]; ?></h3>

            <p class="product_price">Rp.<?php echo $row["price"]; ?> </p>

            <p></p>

              <a href="javascript:" shoes-id="<?php echo $row["shoes_id"]; ?>" class="addtocart"></a>

            <a href="<?php echo $base_url;?>productsdetail/<?php echo $row["shoes_id"]; ?>" class="detail"></a>

                

            </div> 

<?php 
      }

  }
 ?>
 <input type="hidden" id="qty" name="qty" value="1">