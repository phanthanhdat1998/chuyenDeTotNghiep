<div class="container">
   <br />
   <h3 align="center">PHP Ajax Shopping Cart by using Bootstrap Popover</h3>
   <br />
   <nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
     <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Menu</span>
      <span class="glyphicon glyphicon-menu-hamburger"></span>
      </button>
      <a class="navbar-brand" href="/">Webslesson</a>
     </div>
     
     <div id="navbar-cart" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
       <li>
        <a id="cart-popover" class="btn" data-placement="bottom" title="Shopping Cart">
         <span class="glyphicon glyphicon-shopping-cart"></span>
         <span class="badge"></span>
         <span class="total_price">$ 0.00</span>
        </a>
       </li>
      </ul>
     </div>
     
    </div>
   </nav>
   <div id="popover_content_wrapper" style="display: none">
    <span id="cart_details"></span>
    <div align="right">
     <a href="#" class="btn btn-primary" id="check_out_cart">
     <span class="glyphicon glyphicon-shopping-cart"></span> Check out
     </a>
     <a href="#" class="btn btn-default" id="clear_cart">
     <span class="glyphicon glyphicon-trash"></span> Clear
     </a>
    </div>
   </div>

   <div id="display_item">


   </div>
   
  </div>

<?php
   //fetch_item.php
   
//    include('database_connection.php');
   
   $query = "SELECT * FROM tbl_product ORDER BY sanpham_id DESC limit 4";
   
   $result = $connect -> query($query);
   
	while($row = $result -> fetch_assoc())
   {
	   ?>	
	   	<div style="display:flex">
		   <div class="col-md-3" style="margin-top:12px;margin-bottom:100px">  
               <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; height:350px;" align="center">
					<img src="uploads/<?php echo $row["sanpham_image"] ?>" class="img-responsive" width="100%" /><br />
					<h4 class="text-info"><?php echo $row["sanpham_name"] ?></h4>
					<h4 class="text-danger"><?php echo $row["sanpham_giakm"] ?></h4>
					<input type="text" name="quantity" id="quantity<?php echo $row["sanpham_id"] ?>" class="form-control" value="1" />
					<input type="hidden" name="hidden_name" id="name<?php echo $row["sanpham_id"] ?>" value="<?php echo $row["sanpham_name"] ?>" />
					<input type="hidden" name="hidden_price" id="price<?php echo $row["sanpham_giakm"] ?>" value="<?php echo $row["sanpham_giakm"] ?>" />
					<input type="button" name="add_to_cart" id="<?php echo $row["sanpham_id"] ?>" style="margin-top:5px;" class="btn btn-success form-control add_to_cart" value="Add to Cart" />
               </div>
           </div>
		</div>
     		
	<?php
    }
   ?>