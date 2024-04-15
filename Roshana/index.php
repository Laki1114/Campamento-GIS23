<?php

//include('../home/header.php');  
include('../database/linklinkz.php'); 

 

?>


<head>
    <link rel="stylesheet" type="text/css" href="../css/User/userindex.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<br><br><br>
<?php 
include('usernav.php');

?>
<?php 


$sql = "SELECT * FROM products";
if(isset($_GET['id'])){
    $catID = $_GET['id'];
    $sql .= " WHERE cat_id = '$catID'";
}


$result = mysqli_query($conn, $sql);
 
  while($row = mysqli_fetch_assoc($result)) {
    // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

    ?> 
 

      

                <div class="card">
               
                <a href="#"> 
 <?php if(isset($row['thumb']) && !empty($row['thumb'])): ?>
    <img src="../Supplier/<?php echo $row['thumb']; ?>" alt="" height='150' width='150'>
<?php endif; ?>     </a>

                    <h4 class="title"><?php echo  $row["product_name"] ?></h4>

                    <p><?php echo  $row["product_description"] ?></p>
                    <div class="price"> <b>Rs <?php echo  $row["price"] ?>.00 </b></div>
                    
                    <hr>
                  
                    <a   href='addToCart.php?id=<?php echo  $row["product_id"] ?>'><button class="buttonz">Add To Cart 
                        </button> </a>
                  
                        <a   href='single.php?id=<?php echo  $row["product_id"] ?>'><button class="buttonz">  Details
                        </button> </a>  
                  
                    
                
  </div>

                <?php
                  }  
                  ?>
               
          
             
       









     <!-- <?php include('../home/footer.php');  ?>>


