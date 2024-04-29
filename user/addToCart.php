
<?php
/* session_start();
if(isset($_GET['id'])){

    if(isset($_GET['quantity'])){
        $quantity = $_GET['quantity'];
    }else{
        $quantity = 1;
    }
     $id = $_GET['id'];

   $_SESSION['cart'][$id] = array('quantity' => $quantity);
    header('location:cart.php');

  // echo '<pre>';
  // print_r($_SESSION['cart']);
  // echo '</pre>';
 }*/


session_start();
include('../database/linklinkz.php'); 

if(isset($_GET['id'])) {
    $product_id = $_GET['id'];
    
    // Fetch the available quantity from the database
    $sql = "SELECT quantity FROM products WHERE product_id='$product_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $available_quantity = $row['quantity'];
    
    if(isset($_GET['quantity'])) {
        $requested_quantity = $_GET['quantity'];
        
        // Check if the requested quantity is less than or equal to the available quantity
        if($requested_quantity <= $available_quantity) {
            $_SESSION['cart'][$product_id] = array('quantity' => $requested_quantity);
            header('location:cart.php');
        } else {
            // If the requested quantity exceeds the available quantity, show an alert message
            echo "<script>alert('Requested quantity exceeds available quantity. Please reduce the quantity.');</script>";
            // Redirect the user back to the product page
            echo "<script>window.location.href = 'single.php?id=$product_id';</script>";
            exit(); // Stop further execution
        }
    } else {
        // If quantity is not set, default to 1
        $_SESSION['cart'][$product_id] = array('quantity' => 1);
        header('location:cart.php');
    }
}
?>

