<?php
include('../home/headerIn.php');
include('../database/linklinkz.php');
session_start();
?>
<?php include('nav2.php'); ?>

<div class="content mt-5">
    <ul class="rig columns-4">

        <?php

        $sql = "SELECT * FROM products";
        if (isset($_GET['id'])) {
            $catID = $_GET['id'];
            $sql .= " WHERE catId = '$catID'";
        }

        $result = mysqli_query($conn, $sql);

        // Check if there are any results
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>

                <!-- HTML structure for card -->
                <div class="card">
                    <div class="image">
                        <a href="#"><img src="<?php echo $row["thumb"] ?>"></a>
                    </div>
                    <div class="title">
                        <h1><?php echo $row["productName"] ?></h1>
                    </div>
                    <div class="des">
                        <p><?php echo $row["productDescription"] ?></p>
                        <div class="price"><b>Rs <?php echo $row["price"] ?>.00 </b></div>
                        <a href='addToCart.php?id=<?php echo $row["productId"] ?>'>
                            <button>View Details</button>
                        </a>
                        <a href='single.php?id=<?php echo $row["productId"] ?>'>
                            <button>Add to cart</button>
                        </a>
                    </div>
                </div>

            <?php
            }
        } else {
            echo "No products found";
        }
        ?>
    </ul>
</div>

<!DOCTYPE html>
<html>

<head>
    <title>Cards</title>
    <link rel="stylesheet" href="../css/homecards.css">
</head>

<body>
    <div class="main">
        <!--cards -->
    </div>
</body>

</html>
