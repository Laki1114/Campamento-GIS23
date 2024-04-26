<?php

session_start();
include('../database/linklinkz.php');
 

//include('inc/header.php');  


//include('inc/nav.php'); 

 

 
 



?> 

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> show-wishkist.php </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="../css/User/order.css"/> 
</head>


<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
            <div class="navigation">
            
            <?php include 'userSidebar.php'; ?>
                    
            </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
        
        <div class="container text-white">
    <h2 class='text-center text-white'>My Wishlist</h2>

    <section id="content">
		<div class="content-blog content-account">
			<div class="container">
				<div class="row">
				 
					<div class="col-md-12">

		 
			<br>
			<table class="cart-table account-table table table-bordered bg-white text-dark">
				<thead>
					<tr>
						<th>Product Name</th>
						<th>Price</th>
					 
						<th>Date and Time</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$c_id = $_SESSION['customerid']; 
  
				$sql = "SELECT * FROM wishlist JOIN products on products.product_id=wishlist.pid";
				$result = mysqli_query($conn, $sql);
			  
				if (mysqli_num_rows($result) > 0) {
				 // output data of each row
				 while($row = mysqli_fetch_assoc($result)) {
 			?>
					<tr>
						<td>
                        <a href="single.php?id=<?php echo $row["product_id"] ?>">	<?php echo $row["product_name"] ?></a>
						
						</td>
						<td>
						<?php echo $row["price"] ?>
						</td>
					 
						<td>
						

						<?php echo date('M j g:i A', strtotime($row["timestamp"]));  ?>		
						</td>
						<td>
							<a href="delete-wishlist.php?pid=<?php echo $row["product_id"] ?>&cid=<?php echo $_SESSION['customerid'] ?>">Delete</a> 
							 
						</td>
					</tr>
				 
			
			<?php
				}
			   } else {
				 echo "0 results";
			   }
			 
			 
			 ?>




				
				</tbody>
			</table>		

		 
 



			</div>

					</div>
				</div>
			</div>
		</div>
	</section>
	
 
</div>


        </div>
    </div>



    <!-- ====== ionicons ======= -->
</body>

</html>