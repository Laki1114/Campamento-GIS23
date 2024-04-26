<?php

session_start();
include('../database/linklinkz.php');
if(isset($_GET['email'])) {
    $email = $_GET['email']; // I added, later delete it 
    $_SESSION['email']='nihal@gmail.com';}
   //echo $_SESSION['email'];
if(!isset($_SESSION['email']) && empty($_SESSION['email']) ){
    
 //header('location:../login/login.php');
}
?>
<?php //include('inc/header.php') ?>
<?php //include('inc/nav.php') ?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> addCategory.php </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="../css/User/order.css"/> 
</head>


<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
            <div class="navigation">
            
            <?php include 'supplierSidebar.php'; ?>
                    
            </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
        <div>

<div class="card">
<div class="card-header">
<h1>All Orders</h1>
</div>
<div class="card-body">
<section id="content mt-5">
	<div class="content-blog  bg-white">
		<div class="container">
			<table class="table table-striped">
				<thead>
					<tr> 
						<th>Customer Name</th>
						<th>Total Price</th>
						<th>Order Status</th>
						<th>Payment Mode </th>
                        <th>Order Placed On</th>
                        <th>Operations</th> 
					</tr>
				</thead>
				<tbody>

                <?php
    $sql = "SELECT orders.totalprice, orders.orderstatus, orders.paymentmode, orders.timestamp, orders.id, user_data.firstname, user_data.lastname 
     FROM orders JOIN user_data ON orders.userid=user_data.userid ORDER BY `orders`.`id` DESC    ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {

            ?>
      
        <tr>
            <td><?php echo $row["firstname"] ." ".$row["lastname"] ?></td>
            <td><?php echo $row["totalprice"] ?></td>
            <td><?php echo $row["orderstatus"] ?></td>
            <td><?php echo $row["paymentmode"] ?></td>
            <td><?php echo date('M j g:i A', strtotime($row["timestamp"]));  ?>		</td>
            
            <td><a href='order-process.php?id=<?php echo $row["id"] ?>'>Change Status</a> 
            
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

</section>
</div>
</div>


</div>



        </div>
    </div>



    <!-- ====== ionicons ======= -->
</body>

</html>