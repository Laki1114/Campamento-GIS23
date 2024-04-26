<?php
session_start();
include('../database/linklinkz.php'); 
$_SESSION['customerid']='16';
?>

<?php

$message =  '';


?>





<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="../css/User/single.css">
  	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="bg-info">
<?php //include('inc/header.php');  ?>

<?php include('usernav.php');  
unset($_SESSION['Payment_Success']);
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
                        <form action='addToCart.php' method="get">  
                            <input type="hidden" name='id' value='<?php echo  $product_id ?>'>
                            <input type="number" class='form-control' name='quantity' value="1">
                            <input type="submit" value="Add to Cart" class="btn"> 
                        </form>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-12 category">
                        <?php
                        $sql2 = "SELECT * FROM category where cat_id = '$cat_id'";
                        $result2 = mysqli_query($conn, $sql2); 
                        $row2 = mysqli_fetch_assoc($result2);
                        ?> 
                        Categories - <a href="index.php?id=<?php echo $cat_id ?>"><?php echo $row2["cat_name"] ?></a>   
                    </div>
                </div>
                <a href='wishlist.php?id=<?php echo $product_id ?>'>
    <input type="button" value="Add To WishList" class="btn">
</a>

                <!--<button type='submit' class="btn">
                  <i class="fa fa-cart-arrow-down"></i> Wish list
                </button></a> -->
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
<!--change comes here-->
<div class="card">
<div class="card-header">
Reviews

</div>



<div id="Paris" class="tabcontent bg-white">
 
   
    
							
							 
									<h3> Reviews for</h3>
									<ul class="comment-list">

<?php
$sql_allReview = "SELECT * FROM reviews JOIN user_data ON user_data.userid = reviews.uid WHERE pid='$product_id'";

                                    $result_allReview = mysqli_query($conn, $sql_allReview);
                                
                                 if (mysqli_num_rows($result_allReview) > 0) {
                                     
                                    while($row_nameEmail = mysqli_fetch_assoc($result_allReview)) {
?>
	<li> 
											<div class="comment-meta">
											    	<a href="#">   <?php echo $row_nameEmail['firstname'] ?></a>
												<span>
												    <em><?php echo $row_nameEmail['timestamp'] ?></em>
                                                </span>
<p><?php echo $row_nameEmail['review'] ?></p>
                                            </div> 
                                        </li>
  

<?php
}
                                    }
?>


								 
									
                                  
								 
									</ul>
								 
                                   
                                    

<?php
 $proid = $_GET['id'];
 if(isset($_SESSION['customerid'])){
     $c_id = $_SESSION['customerid']; 
$sql_count = "SELECT * FROM reviews where pid='$proid' AND uid='$c_id '";
$result_count = mysqli_query($conn, $sql_count);
if (mysqli_num_rows($result_count) > 0) { 

echo '<h3 class="text-center">You Already Submitted Review for this product</h3>' ;
}else{
?>


<h3>Add a review</h3>
									<form id="form" class="review-form" action="submit-review.php" method="post">
                                 <?php
                                    
                                    $name  ='' ;
                                    $email  ='' ;

                                 if(isset($_SESSION['customerid'])){
                                    $c_id = $_SESSION['customerid']; 
                                    $sql_nameEmail = "SELECT user.Email, user_data.firstname, user_data.lastname FROM user JOIN user_data ON user.UserID=user_data.userid AND user_data.userid = '$c_id'";
                                    $result_nameEmail = mysqli_query($conn, $sql_nameEmail);
                                
                                 if (mysqli_num_rows($result_nameEmail) > 0) { 
                                     $row_nameEmail = mysqli_fetch_assoc($result_nameEmail);
                                      $name = $row_nameEmail['firstname'] ." ". $row_nameEmail['lastname']  ;
                                      $email = $row_nameEmail['Email'];
                                    }
                                }
                                 
                                 ?>
										<div class="row">
											<div class="col-md-6 space20">
												<input name="name" value='<?php echo  $name ?>' class="form-control" placeholder="Name *"  required="" type="text" <?php if($name != ''){echo 'disabled';} else{echo " ";}    ?> >
											</div>
											<div class="col-md-6 space20">
												<input name="email" value='<?php echo  $email ?>' class="form-control" placeholder="Email *" required="" type="text"  <?php if($email != ''){echo 'disabled';} else{echo " ";}  ?> >
											</div>
										</div>
								 
										<div class="space20 mt-2">
											<textarea name="review" id="text" class="input-md form-control" rows="6" placeholder="Add review.." maxlength="400"></textarea>
										</div>
                                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
    <!-- Add a hidden input field to pass the product ID -->
    <button type="submit" name="submit" class="btn btn-primary mt-2">
        Submit Review
    </button>
                                        <?php echo $message  ?>
                                    </form>
                                    <?php
                                    }
                                }
                                    
                                    ?>
								 
								</div>
							 
						 
</div>
                            </div>