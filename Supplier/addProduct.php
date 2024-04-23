<?php
include ('../database/linklinkz.php');

//include ('nav.php');
//include('sidebar.php');

// Initialize the $message variable
$message = '';

if(isset($_POST['submit'])) {
    $productname = $_POST['productname'];
    $productdescription = $_POST['productdescription'];
    $productcategory = $_POST['productcategory'];
    $productprice = $_POST['productprice'];

    // File upload handling
    if(isset($_FILES['productimage']) && !empty($_FILES['productimage']['name'])) {
        $file_name = $_FILES['productimage']['name'];
        $file_tmp = $_FILES['productimage']['tmp_name'];
        $file_size = $_FILES['productimage']['size'];
        $file_type = $_FILES['productimage']['type'];

        $upload_dir = "uploads/";
        // Check if the directory doesn't exist, then create it
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true); // Creates the directory recursively
        }
        $max_file_size = 10 * 1024 * 1024; // 10MB
        $allowed_extensions = array('jpg', 'jpeg', 'png');

        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

        if(in_array($file_extension, $allowed_extensions) && $file_size <= $max_file_size) {
            $new_file_name = uniqid().'.'.$file_extension;
            $destination = $upload_dir . $new_file_name;

            if(move_uploaded_file($file_tmp, $destination)) {
                $sql2 = "INSERT INTO products (product_name, cat_id, price, product_description, thumb,Status) VALUES ('$productname', '$productcategory', '$productprice', '$productdescription', '$destination','1')";

                if(mysqli_query($conn, $sql2)) {
                    $message = 'Product added successfully with image.';
                } else {
                    $message = 'Error adding product: ' . mysqli_error($conn);
                }
            } else {
                $message = 'Failed to move uploaded file.';
            }
        } else {
            $message = 'Invalid file or file size too large.';
        }
    } else {
        $sql = "INSERT INTO products (product_name, cat_id, price, product_description,Status) VALUES ('$productname', '$productcategory', '$productprice', '$productdescription','1')";

        if(mysqli_query($conn, $sql)) {
            $message = 'Product added successfully.';
        } else {
            $message = 'Error adding product: ' . mysqli_error($conn);
        }
    }
}
?> 

<head>
    <link rel="stylesheet" type="text/css" href="../css/user/form.css"/>
</head>
<div class="container">
    <div class="card">
        <div class="card-header">
            Add Products
        </div>
        <div class="card-body">
            <section id="content">
                <div class="content-blog bg-white py-3">
                    <div class="container">
                        <?php if(!empty($message)): ?>
                            <div class="alert alert-success"><?php echo $message; ?></div>
                        <?php endif; ?>

                        <form method="post" enctype="multipart/form-data" action='addProduct.php'>
                            <div class="form-group">
                                <label for="Productname">Product Name</label>
                                <input type="text" class="form-control" name="productname" id="Productname" placeholder="Product Name">
                            </div>
                            <div class="form-group">
                                <label for="productdescription">Product Description</label>
                                <textarea class="form-control" name="productdescription" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="productcategory">Product Category</label>
                                <select class="form-control" id="productcategory" name="productcategory">
                                    <option value="" selected disabled>---SELECT CATEGORY---</option>
                                    <?php
                                    $sql = "SELECT * FROM Category";
                                    $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="productprice">Product Price</label>
                                <input type="text" class="form-control" name="productprice" id="productprice" placeholder="Product Price">
                            </div>
                            <div class="form-group">
                                <label for="productimage">Product Image</label>
                                <input type="file" name="productimage" id="productimage">
                                <p class="help-block">Only jpg/png are allowed.</p>
                            </div>
                            <button type="submit" name='submit' class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
