	<div class="sidebar_box"><span class="bottom"></span>

            	<h3>Categories</h3>   

                <div class="content"> 

                	<ul class="sidebar_list">
                    <?php 
                            $db = new database();
                            $sql = "SELECT * FROM ms_brand ORDER BY brand_name ASC";
                            $brand = $db->db_queryresult($sql);
                     ?>
                    
                    <?php 
                            if(count($brand)>0){
                     ?>
                    <?php 
                                foreach ($brand as $row) {
                                 
                     ?>
                    	<li class="first"><a href="<?php echo $base_url;?>index.php?products&brand_id=<?php echo $row['brand_id']; ?>
"><?php echo $row["brand_name"]; ?></a></li>
                
                    <?php       
                                }  
                            }

                    ?>
                    </ul>

                </div>

    </div>

