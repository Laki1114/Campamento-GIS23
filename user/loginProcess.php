<?php //include('inc/header.php');
session_start();
include('../database/linklinkz.php');

if(isset($_POST['submit'])){
    var_dump($_POST);
    // Inspect the contents of the $_POST array
     $email = mysqli_real_escape_string($conn, $_POST['email']); 
     $password = $_POST['psw'];
    
     $sql = "SELECT * FROM user WHERE Email='$email' ";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Error: " . mysqli_error($conn);
}

$row = mysqli_fetch_assoc($result);
 $dbStoredPASSWORD = $row['Password'];

if (password_verify ($password, $dbStoredPASSWORD)) {
     $_SESSION['customer'] = $email;
     $_SESSION['customerid'] = $row['UserId'];
     header('location:index.php');
     exit(); // Exit the script after redirection
  } else {
    header('location:login.php?message=1');
    exit(); // Exit the script after redirection
//    $message =  'incorrect Credentials';
  }
  


   
    
}




?>