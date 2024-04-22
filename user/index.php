<?php
session_start();
//include('../home/header.php');  
include('../database/linklinkz.php'); 

 

?>


<head>
<link rel="stylesheet" type="text/css" href="../css/User/userindex.css"/>
    <link rel="stylesheet" type="text/css" href="../css/homestyle.css"/>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php 
include('../home/headerIn.php');

?>
<br><br><br><br><br>
<?php 

include('check.php');

?>
<br><br><br>
<br><br><br><br><br><br><br><br><br>
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
  <center>  <img src="../Supplier/<?php echo $row['thumb']; ?>" alt="" height='150' width='150'></center>
<?php endif; ?>     </a>

                    <h2 class="title"><?php echo  $row["product_name"] ?></h4>

                   <font size=2px> <p><?php echo implode(' ', array_slice(explode(' ', $row["product_description"]), 0, 10)); ?>...</p></font>

                  <div class="price">  <h2> <b>Rs <?php echo  $row["price"] ?>.00 </b></h2></div>
                    
                    <hr>
                  
                    <a   href='addToCart.php?id=<?php echo  $row["product_id"] ?>'><button class="buttonz">Add To Cart 
                        </button> </a>
                  
                        <a   href='single.php?id=<?php echo  $row["product_id"] ?>'><button class="buttonz">  Details
                        </button> </a>  
                  
                    
                
  </div>

                <?php
                  }  
                  ?>
               
          
             
       
                </body>








     <!-- <?php include('../home/footer.php');  ?>>


