<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="../css/User/single.css">
  	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="bg-info">
<?php //include('inc/header.php');  ?>

<?php include('usernav.php');  

include('../database/linklinkz.php');

if(isset($_GET['id'])){
    $product_id = $_GET['id'];
   $sql = "SELECT * FROM products  WHERE product_id='$product_id'";
   $result = mysqli_query($conn, $sql);
 
$row = mysqli_fetch_assoc($result);

$product_name  = $row['product_name'];
$cat_id  = $row['cat_id']; 
$price  = $row['price'];
$product_description  = $row['product_description'];
$thumb  = $row['thumb'];
}




?>

<div class="container">
    <div class="row text-white">
        <div class="left">
            <!-- Main product image goes here -->
            <img src="../Supplier/<?php echo $thumb ?>" alt="" class='img-fluid' style='height:500px;width:500px;'>
        </div>
        <div id="rightside">
            <div class="right-content">
                <h3><b><?php echo $product_name ?></b></h3>
                <h2><b>Rs <?php echo  $price ?>.00 </b></h2>
                <p><?php echo $product_description ?></p>
                <div class="row">
                    <div class="col-md-2">Quantity:</div>
                    <div class="col-md-2">
                        <form action='addToCart.php'>  
                            <input type="hidden" name='id' value='<?php echo  $product_id ?>'>
                            <input type="number" class='form-control' name='quantity' value='1'> 
                        </form>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-12 category">
                        <?php
                        $sql2 = "SELECT * FROM Category where cat_id = '$cat_id'";
                        $result2 = mysqli_query($conn, $sql2); 
                        $row2 = mysqli_fetch_assoc($result2)
                        ?> 
                        Categories - <a href="index.php?id=<?php echo $cat_id ?>"><?php echo $row2["cat_name"] ?></a>   
                    </div>
                </div>
                <button type='submit' class="btn">
                    <i class="fa fa-cart-arrow-down"></i> Add To Cart
                </button>
            </div>
        </div>
    </div>
    <br><br><br>
    <!--RELATED PRODUCTS STARTS HERE-->
    <div class="card">
<div class="card-header">
Related Products

</div>
<div class="card-body">
    
<div class="mt-5">
<ul class="rig columns-4">

 <?php
 $sql_related = "SELECT * FROM products where cat_id = $cat_id  order by rand() limit 3";
//  if(isset($_GET['id'])){
//      $catID = $_GET['id'];
//      $sql .= " WHERE cat_id = '$catID'";
//  }
 
 
 $result_related = mysqli_query($conn, $sql_related);
  
   while($row_related = mysqli_fetch_assoc($result_related)) {
     // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
 
 
 ?>

                <li>
                    <a href="#"><img style='height:200px;width:200px;' class="product-image"  src="../Supplier/<?php echo $row_related['thumb']; ?>    "></a>
                    <h4><?php echo $row_related['product_name']; ?></h4>

                    <p>     <?php echo $row_related['product_description']; ?>             </p>
                    <div class="price"> <b><?php echo $row_related['price']; ?> </b></div>
                    
                    <hr>
                    <!-- <button class="btn btn-default btn-xs pull-right" type="button">
                        <i class="fa fa-cart-arrow-down"></i> Add To Cart
                    </button> -->
                    <div class="text-center"> 
                    <a href="single.php?id=<?php echo $row_related['product_id']; ?>" class="btn btn-default btn-xs pull-left">
                        <i class="fa fa-eye"></i> Details
                    </a>
                    </div>
                   
                </li>

<?php

}

?>