<?php

session_start();
/*include ('../database/linklinkz.php');
if(!isset($_SESSION['email']) && empty($_SESSION['email']) ){
 header('location:login.php');
}*/
?>

<?php 
//include('nav.php');
include ('../database/linklinkz.php');

$email =  $_SESSION['email'];
$sql = "SELECT SupplierID FROM supplier WHERE Email = '$email'";//change Email='email' or Email='$email'
$result = mysqli_query($linkz,$sql);
while ($row = mysqli_fetch_assoc($result)){
    $supID=$row["SupplierID"];}
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Product  </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="../css/Supplier/product.css"/>


</head>
<body>

<div class="container">
        
    <div class="navigation">
            
        <?php include 'supplierSidebar.php'; ?>
                    
    </div>

    <div class="main">
            
    <div><br><br><br>

<div class="card">
<div class="card-header">
All Products
</div>
<div class="card-body">
<section id="content mt-5">
	<div class="content-blog  bg-white">
		<div class="container">
			<table class="table table-striped">
				<thead>
					<tr> 
						<th>Product Name</th>
						<th>Category Name</th>
						<th>Thumbnail</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>

                <?php
    $sql = "SELECT * FROM products WHERE Status='1' AND SupplierID='$supID'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
?>
            <tr>
                <td><?php echo $row["product_name"] ?></td>
                <td><?php echo $row["cat_id"] ?></td>
                <td><?php echo isset($row["thumb"]) ? 'Yes' : 'No'; ?></td> 
                <td>
                    <a href='editProducts.php?id=<?php echo $row["product_id"] ?>'>Edit</a> 
                    | 
                    <a href='delProducts.php?id=<?php echo $row["product_id"] ?>'>Delete</a>
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

</section>
</div>
</div>


</div>
                    
    </div>
</div>
        


</body>
</html>