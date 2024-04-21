<?php include('../database/linklinkz.php'); ?>



<div class="dropdown">
				    <button type="button" class="btn btn-info" data-toggle="dropdown">
					<?php 
					$count = '';
					 
					if(isset($_SESSION['cart'])){
					 $cart = $_SESSION['cart'];
					 $count = count($cart);//see website not showing the count
					}
					?>
				    <button type="button" class="btn btn-info" data-toggle="dropdown">
				     <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger"> <?php echo $count?></span>
				    </button>

					<div class="dropdown-menu">

					<?php
					if(isset($_SESSION['cart'])){
       $total = 0;
       foreach($cart as $key => $value){
        // echo $key ." : ". $value['quantity'] . "<br>";
        
        $sql = "SELECT * FROM products where product_id = $key";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);


        ?>

<div class="row cart-detail">
    <br><br><br><br>
		    				<div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
		    					<img src="../Supplier/<?php echo $row['thumb']?> " height='50' width='50'>
		    				</div>
		    				<div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
		    					<p><a href="single.php?id=<?php echo $row['product_id']?>"><?php echo $row['product_name']?></a></p>
		    					<span class="price text-info"> INR <?php echo $row['price']?>.00</span> 
								<span class="count"> Quantity:<?php echo $value['quantity']?></span>
		    				</div>
				    	</div>

						<?php
						$total = $total +  ($row['price'] * $value['quantity']);
					}
						?>

						<div class="row total-header-section">
							<div class="col-lg-6 col-sm-6 col-6 total-section text-right">
			      				<p>Total: <span class="text-info">INR <?php echo $total ?>.00</span></p>
			      			</div>
				    	</div>

						<div class="row">
				    		<div class="col-lg-12 col-sm-12 col-12 text-center checkout">
				    			 
								<a href='checkout.php' class="btn btn-primary btn-block">Checkout</a>
								<a href='cart.php' class="btn btn-primary btn-block">Cart</a>
				    		</div>
				    	</div>

						<?php   }?>

