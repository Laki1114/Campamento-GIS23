<?php
 session_start();
 include ('../database/linklinkz.php');
 /*if(!isset($_SESSION['email']) && empty($_SESSION['email']) ){
  header('location:login.php');
 }*/
 

if(isset($_GET['id'])){
    $product_id = $_GET['id'];
   $sql = "UPDATE products
   SET Status = '0'
   WHERE Status='1' AND product_id='$product_id'";
   $result = mysqli_query($conn, $sql);
   header('location:product.php');


}


?>