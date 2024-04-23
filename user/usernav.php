<!DOCTYPE html>
<html>
<?php include('../database/linklinkz.php'); ?>
<head>
    <link rel="stylesheet" type="text/css" href="../css/User/usernav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
<div class="upperbar">
<!--<span  class="as"><img src="../resource/logo.png" alt="" width="150" height="70"></span>!--></div>
<div class="navbar">
    
    <div class="dropdown">
    <a href="index.php">Home</a>
        <div class="dropdown-content">
            <?php
            // Assuming $conn is your database connection
            /*$sql = "SELECT * FROM Category";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<a href="index.php?id=' . $row["cat_id"] . '">' . $row["cat_name"] . '</a>';
                }
            } else {
                echo "0 results";
            }*/
            ?>
           
        </div>
       
    </div>
    <a href="cart.php" class="cart-icon"><i class="fa fa-shopping-cart" style="font-size:24px"></i></a>
    <?php 
					$count = '';
					 
					if(isset($_SESSION['cart'])){
					 $cart = $_SESSION['cart'];
					 $count = count($cart);//see website not showing the count
					}
					?>
                    <?php
                    // Loop to print &nbsp; 200 times
                    for ($i = 0; $i < 337; $i++) {
                        echo "&nbsp;";
                    }
                    ?>
    <span style="color:white;font-size:32px;" class="badge"><b> <?php echo $count?></b></span>
</div>


















<script>
    // JavaScript to toggle dropdown visibility
    document.addEventListener("DOMContentLoaded", function() {
    console.log("DOM Content Loaded");
    var dropdowns = document.getElementsByClassName("dropdown");
    for (var i = 0; i < dropdowns.length; i++) {
        dropdowns[i].addEventListener("mouseenter", function() {
            console.log("Mouse entered dropdown");
            this.getElementsByClassName("dropdown-content")[0].style.display = "block";
        });
        dropdowns[i].addEventListener("mouseleave", function() {
            console.log("Mouse left dropdown");
            this.getElementsByClassName("dropdown-content")[0].style.display = "none";
        });
    }
});

</script>

</body>
</html>
