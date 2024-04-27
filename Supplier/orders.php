<?php

session_start();
include('../database/linklinkz.php');

   //echo $_SESSION['email'];
if(!isset($_SESSION['email']) && empty($_SESSION['email']) ){
    
 header('location:../login/login.php');
}

$email =  $_SESSION['email'];
$sql = "SELECT SupplierID FROM supplier WHERE Email = '$email'";//change Email='email' or Email='$email'
$result = mysqli_query($linkz,$sql);
while ($row = mysqli_fetch_assoc($result)){
    $supID=$row["SupplierID"];}
?>
<?php //include('inc/header.php') ?>
<?php //include('inc/nav.php') ?>


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
						<th style="padding: 15px;">Customer Name</th>
						
						<th style="padding: 15px;">Order Status</th>
						<th style="padding: 15px;">Payment Mode </th>
                        <th style="padding: 15px;">Order Placed On</th>
                        <th style="padding: 15px;">Operations</th> 
					</tr>
				</thead>
				<tbody>

                <?php
    $sql = "SELECT 
                orders.totalprice, 
                orders.orderstatus, 
                orders.paymentmode, 
                orders.timestamp, 
                orders.id, 
                user_data.firstname, 
                user_data.lastname 
            FROM 
                orders 
            JOIN 
                user_data ON orders.userid = user_data.userid 
            JOIN 
                orderitems ON orders.id = orderitems.orderid 
            JOIN 
                products ON orderitems.productid = products.product_id 
            JOIN 
                supplier ON supplier.SupplierId = products.SupplierID
            WHERE 
                products.SupplierID = '$supID' 
            ORDER BY 
                orders.id DESC;
  ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {

            ?>
      
        <tr>
            <td><?php echo $row["firstname"] ." ".$row["lastname"] ?></td>
            
            <td><?php echo $row["orderstatus"] ?></td>
            <td><center><?php echo $row["paymentmode"] ?></center></td>
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