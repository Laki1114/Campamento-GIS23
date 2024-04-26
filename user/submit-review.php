<?php
session_start();
include('../database/linklinkz.php');
//$_SESSION['customerid']='16';
$message = '';

if(isset($_POST['submit'])){
    $product_id = $_POST['product_id']; // Assuming you pass the product ID as a URL parameter
    $c_id = $_SESSION['customerid']; 

    $review = $_POST['review']; 

    $insertReview = "INSERT INTO reviews (pid, uid, review)
                    VALUES ('$product_id','$c_id' ,'$review' )";  

    if(mysqli_query($conn, $insertReview)){
        
        // Redirect back to single.php after form submission
        header("Location: single.php?id=$product_id"); // Make sure $product_id is set
        exit();
    }
}
?>
