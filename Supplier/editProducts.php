<?php
session_start();
include ('../database/linklinkz.php');

// Check if form is submitted
if(isset($_POST['submit'])) {
    $productname = $_POST['productname'];
    $productdescription = $_POST['productdescription'];
    $productcategory = $_POST['productcategory'];
    $productprice = $_POST['productprice'];
    $product_id = $_POST['hiddenID']; 

    // Check if file is uploaded
    if(isset($_FILES['productimage']) && !empty($_FILES['productimage']['name'])) {
        $name = $_FILES['productimage']['name'];
        $size = $_FILES['productimage']['size'];
        $type = $_FILES['productimage']['type'];
        $tmp_name = $_FILES['productimage']['tmp_name']; 
        $max_size = 10000000;
        $extension = pathinfo($name, PATHINFO_EXTENSION); 

        // Check file extension and size
        if(($extension == "jpg" || $extension == "jpeg") && $type == "image/jpeg" && $size <= $max_size) {
            $location = "uploads/";
            $filePath = $location . $name;

            // Move uploaded file to destination
            if(move_uploaded_file($tmp_name, $filePath)) {
                $sql2 = "UPDATE products SET product_name='$productname', product_description='$productdescription', cat_id='$productcategory', price='$productprice', thumb='$filePath' WHERE product_id='$product_id'";
                $res = mysqli_query($conn, $sql2);
                if($res) {
                    $message = 'Saved Successfully with image';
                } else {
                    $message = "Failed to Create Product";
                    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                }
            } else {
                $message = "Failed to Upload File";
            }
        } else {
            $message = "Only JPG files are allowed and should be less than 10MB";
        }
    } else {
        // If no image uploaded, update other product details
        $sql_update = "UPDATE products SET product_name='$productname', product_description='$productdescription', cat_id='$productcategory', price='$productprice' WHERE product_id='$product_id'";
        if (mysqli_query($conn, $sql_update)) {
            $message = 'Saved Successfully';
        } else {
            echo "Error: " . $sql_update . "<br>" . mysqli_error($conn);
        }
    }
}

// Retrieve product details for editing
if(isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE product_id='$product_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Edit Products </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="../css/User/form.css"/>

</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            
            <?php include 'supplierSidebar.php'; ?>
                    
        </div>
        <!-- ========================= Main ==================== -->
        <div class="main">
        <div ><br><br><br>
    <div class="card">
        <div class="card-header">
            Edit Products
        </div>
        <div class="card-body">
            <section id="content ">
                <div class="content-blog bg-white py-3">
                    <div class="container"> 
                        <form method="post" enctype="multipart/form-data">
                            <input type="hidden" name='hiddenID' value='<?php echo $product_id?>'>
                            <div class="form-group">
                                <label for="Productname">Product Name</label>
                               <?php echo $row['product_name']; ?>
                            </div>
                            <div class="form-group">
                                <label for="productdescription">Product Description</label>
                                <textarea class="form-control" name="productdescription" rows="3"><?php echo $row['product_description']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="productcategory">Product Category</label>
                                <select class="form-control" id="productcategory" name="productcategory">
                                    <?php
                                    $sql2 = "SELECT * FROM Category";
                                    $result2 = mysqli_query($conn, $sql2);
                                    while($row2 = mysqli_fetch_assoc($result2)) {
                                        $selected = ($row2['cat_id'] == $row['cat_id']) ? 'selected' : '';
                                        echo "<option value='".$row2['cat_id']."' $selected>".$row2['cat_name']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="productprice">Product Price</label>
                                <input type="text" class="form-control" value='<?php echo $row['price']; ?>'  name="productprice" id="productprice" placeholder="Product Price">
                            </div>
                            <?php if(isset($row['thumb']) && !empty($row['thumb'])): ?>
                                <img src="<?php echo $row['thumb']; ?>" alt="" height='150' width='150'><br>
                                <a href="delproduImg.php?id=<?php echo $row['product_id'];?>">Delete Image</a><br>
                            <?php else: ?>
                                <div class="form-group">
                                    <label for="productimage">Product Image</label>
                                    <input type="file" name="productimage" id="productimage">
                                    <p class="help-block">Only jpg/png are allowed.</p>
                                </div>
                            <?php endif; ?>
                            <br><br>
                            <button type="submit" name='submit' style="background-color: #04AA6D;font-size: 18px; border: none; color: white; cursor: pointer;">Submit</button>
                        </form>
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