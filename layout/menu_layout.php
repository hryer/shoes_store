<div id="top_nav" class="ddsmoothmenu">

            <ul>

                <li><a href="<?php echo $base_url; ?>home" class="<?php if(isset($_GET['home'])){echo "selected";} ?>">Home</a></li>

                <li><a href="<?php echo $base_url; ?>products" class="<?php if(isset($_GET['products'])){echo "selected";} ?>">Products</a>

                    <ul>

                    

                        <li><a href="">brand 1</a></li>
                        <li><a href="">brand 2</a></li> 
                        <li><a href="">brand 3</a></li>

                  </ul>

                </li>

                <li><a href="<?php echo $base_url; ?>about" class="<?php if(isset($_GET['about'])){echo "selected";} ?>">About</a>

                </li>

                <li><a href="<?php echo $base_url; ?>faqs" class="<?php if(isset($_GET['faqs'])){echo "selected";} ?>">FAQs</a></li>

                <li><a href="<?php echo $base_url; ?>contact" class="<?php if(isset($_GET['contact'])){echo "selected";} ?>">Contact Us</a></li>

            </ul>

            <br style="clear: left" />

     </div>

