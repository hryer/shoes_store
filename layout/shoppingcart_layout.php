<style>
        
 #contact_form form label { width: 150px; }
        
</style>

<div class="">
   <h1>Shopping Cart</h1>
   <div id="contact_form" style="width:600px;">
           <form name="form1" method="post">

                <input type="hidden" name="pid" />

                <input type="hidden" name="command" />

             <table width="700px" cellspacing="0" cellpadding="5" id="shoppingcarttable">

                        

                        <thead>

                          <tr bgcolor="#ddd">

                            <th width="170" align="left">Image </th> 

                            <th width="125" align="left">Shoes Name </th> 

                            <th width="80" align="center">Quantity </th> 

                            <th width="90" align="right">Price </th> 

                            <th width="89" align="right">Total </th> 

                            <th width="84"> </th>

                            

                          </tr>

                        </thead>

                        <tbody>
                         </tbody>

                </table>

                </form>



                <div style="float:right; margin-top: 20px;">

                  <p><a href="javascript:" id="clearcart">Clear the Cart </a></p>
                    
                  <p><a href="javascript:" id="updateallcart">Update All the Cart</a></p>
                 
                  <p><a href="javascript:location.href = 'index.php?products' ">Continue shopping</a></p>

                  <p><a href="index.php?checkout">Proceed to checkout</a></p>

                </div>

                   
                </div>

</div>