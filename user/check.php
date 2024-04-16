<!DOCTYPE html>
<html>
<?php include('../database/linklinkz.php'); ?>
<head>
    <link rel="stylesheet" type="text/css" href="../css/User/check.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="navbar">
    <a href="#home">Home</a>
    <div class="dropdown">
    <a href="#">Categories</a>
        <div class="dropdown-content">
            <?php
            // Assuming $conn is your database connection
            $sql = "SELECT * FROM Category";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<a href="index.php?id=' . $row["cat_id"] . '">' . $row["cat_name"] . '</a>';
                }
            } else {
                echo "0 results";
            }
            ?>
           
        </div>
       
  <!-- Dropdown -->

  <div class='text-right ml-5'>
    <li class="nav-item dropdown">
      
              <div class="dropdown">
				    <button type="button" class="btn btn-info" data-toggle="dropdown">
					<?php 
					$count = '';
					 
					if(isset($_SESSION['cart'])){
					 $cart = $_SESSION['cart'];
					 $count = count($cart);
					}
					?>
				     <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">
					 <?php echo $count?>
					 </span>
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
		    				<div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
		    					<img src="admin/<?php echo $row['thumb']?> " >
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
			      			<div class="col-lg-6 col-sm-6 col-6">
			      				<i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">
								  <?php echo $count?>
								  </span>
			      			</div>
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
				    </div>
				</div> 
    </li>
	<?php   }?>
    </div> 

















<script>
    // JavaScript to toggle dropdown visibility
    document.addEventListener("DOMContentLoaded", function() {
    console.log("DOM Content Loaded");
    var dropdowns = document.getElementsByClassName("dropdown");
    for (var i = 0; i < dropdowns.length; i++) {
        dropdowns[i].addEventListener("mouseenter", function() {
            console.log("Mouse entered dropdown");
            this.getElementsByClassName("dropdown-content")[0].style.display = "block";
        });
        dropdowns[i].addEventListener("mouseleave", function() {
            console.log("Mouse left dropdown");
            this.getElementsByClassName("dropdown-content")[0].style.display = "none";
        });
    }
});

</script>

</body>
</html>
