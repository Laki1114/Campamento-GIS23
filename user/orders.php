<?php

session_start();
include ('../database/linklinkz.php');
 

//include('inc/header.php');  


//include('inc/nav.php'); 

 

 
 



?> 

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> orders.php </title>
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
        

        <div class="qq">
    <h2 class='text-center text-white'>My Orders</h2>
	<div>
		<?php 
		if(isset($_SESSION['Payment_Success'])){
			echo $_SESSION['Payment_Success'];
		}
		
		?>
	</div>
    <section id="content">
		<div class="content-blog content-account">
			<div class="container">
				<div class="row">
				 
					<div class="col-md-12">

			<h3>Recent Orders</h3>
			<br>
			<table class="cart-table account-table table table-bordered bg-white text-dark">
				<thead>
					<tr>
						<th>Total Price</th>
						<th>Order Status</th>
						<th>Paymentmode</th>
						<th>Date and Time</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<?php
                //$_SESSION['customerid']='16';
				$c_id = $_SESSION['customerid'];

 
  
				$sql = "SELECT * FROM orders WHERE userid='$c_id'";
				$result = mysqli_query($conn, $sql);
			  
				if (mysqli_num_rows($result) > 0) {
				 // output data of each row
				 while($row = mysqli_fetch_assoc($result)) {
 			?>
					<tr>
						<td>
							<?php echo $row["totalprice"] ?>
						</td>
						<td>
						<?php echo $row["orderstatus"] ?>
						</td>
						<td>
						<?php echo $row["paymentmode"] ?>		
						</td>
						<td>
						

						<?php echo date('M j g:i A', strtotime($row["timestamp"]));  ?>		
						</td>
						<td>
							<a href="view-order.php?id=<?php echo $row["id"] ?>">View</a> 
							<?php if($row["orderstatus"] != 'Cancelled'){ ?>
								|  <a href="cancel-order.php?id=<?php echo $row["id"] ?>">cancel</a> 
							<?php }?>
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

		 

			<div class="ma-address">
						<h3>My Addresses</h3>
						<p>The following addresses will be used on the checkout page by default.</p>

						<div class="row  bg-white text-dark px-5 py-3">
				<div class="col-md-6">
								<h4>Billing Address <a href="update_address.php?id=<?php echo $c_id ?>">Edit</a></h4>
                                <?php  
                        $sql_add = "SELECT * FROM user_data  WHERE userid='$c_id'";
                        $result_add = mysqli_query($conn, $sql_add);
                      
                     $row_add = mysqli_fetch_assoc($result_add); 
                        echo $row_add['firstname'] ." ". $row_add['lastname'] . "<br>";
                        echo $row_add['company'] . "<br>";
                        echo $row_add['address1'] . "<br>";
                        echo $row_add['address2'] . "<br>";
                        echo $row_add['city'] . "<br>";
                        echo $row_add['zip'] . "<br>";
                        echo $row_add['country'] . "<br>";
                        echo $row_add['mobile'] . "<br>";

                        ?>

 
				</div>

			 
			</div>



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