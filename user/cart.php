<?php 
session_start();
//include('inc/header.php');

include('../database/linklinkz.php');
  ?>

<?php include('usernav.php');  

 
$cart =  $_SESSION['cart'];


//  print_r($cart);

?>
 <head>
 <link rel="stylesheet" type="text/css" href="../css/User/cart.css">
  	
</head>
 
<div class="container">
    <h2 class='text-center text-white'>Cart</h2>

   <table class="table table-bordered bg-white">
       <tr>
           <th>Image</th>
           <th>Product</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Total</th>
           <th>Action</th>
       </tr>

       <?php
       $total = 0;
       foreach($cart as $key => $value){
        // echo $key ." : ". $value['quantity'] . "<br>";
        
        $sql = "SELECT * FROM products where product_id = $key";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result)
        ?>


            <tr>
           <td><img src="../Supplier/<?php echo $row['thumb']?> " style='height:50px;width:50px;' alt=""></td>
           <td><a href="single.php?id=<?php echo $row['product_id']?>"><?php echo $row['product_name']?></a></td>
           <td>Rs<?php echo $row['price']?> </td>
           <td><?php echo $value['quantity']?></td>
           <td>Rs<?php echo $row['price'] * $value['quantity'] ?> </td>
            <td><a href='deleteCart.php?id=<?php echo $key; ?>'><button>Remove</button></a></td>
            </tr>

        <?php

$total = $total +  ($row['price'] * $value['quantity']);
    }
    
    ?>
      
   </table>

 
<br><br>
<div class="card">
<div class="card-header">Total</div>
<div class="card-body">
Total Amount: Rs <?php echo $total; ?>.00/-
</div>
<div class="">
    <!-- <button class="btn mr-3">Update Cart</button> -->

    <a class="btn" href='checkout.php?total=<?php echo $total; ?>'>Checkout</a>
</div>
</div>

</div>








<?php //include('inc/footer.php');  ?>


