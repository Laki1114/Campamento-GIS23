<!DOCTYPE html>
<html>
<?php include('../database/linklinkz.php'); ?>
<head>
    <link rel="stylesheet" type="text/css" href="../css/User/usernav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="navbar">
    <a href="#home">Home</a>
    <div class="dropdown">
    <a href="#">Categories</a>
        <div class="dropdown-content">
            <?php
            // Assuming $conn is your database connection
            $sql = "SELECT * FROM Category";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<a href="index.php?id=' . $row["cat_id"] . '">' . $row["cat_name"] . '</a>';
                }
            } else {
                echo "0 results";
            }
            ?>
           
        </div>
       
    </div>
    <a href="#cart" class="cart-icon"><i class="fa fa-shopping-cart" style="font-size:24px"></i></a>
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