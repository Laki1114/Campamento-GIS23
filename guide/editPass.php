<?php 
require 'config.php';

if(!isset($_SESSION['email'])){
    header('location: ../login/login.php');
}

$email = $_SESSION['email'] ;

if(isset($_POST['changePassword'])){

    $currentPassword = $_POST['psw'];
    $newPassword = $_POST['newPsw'];
    $confirmPassword = $_POST['psw-repeat'];

    // Fetch the current password from the database
    $query  = mysqli_query($con, "SELECT * FROM guide WHERE email= '$email' ");
    $row = mysqli_fetch_array($query);
    $currentPasswordDB = $row['password'];

    // Validate if the current password matches
    if($currentPassword != $currentPasswordDB){
        echo "<script>alert('Current password is incorrect!');</script>";
    }else if($newPassword != $confirmPassword){
        echo "<script>alert('New password and Confirm password do not match!');</script>";
    }else{
        // Validate the new password format
        if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $newPassword)){
            echo "<script>alert('Password must contain at least one number, one uppercase letter, one lowercase letter, and at least 8 or more characters!');</script>";
        }else{
            // Update the password in the database
            $updatePassword = mysqli_real_escape_string($con, $newPassword);
            mysqli_query($con, "UPDATE driver SET password = '$updatePassword' WHERE email = '$email'") or die('query failed');
            echo "<script>alert('Password updated successfully!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your HTML Head Content -->
    
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/Guide/registerUser.css">
<style>
        body{
    background-image: url("../resource/login.jpg");
  }
    .bg-img {
    /* The image used */
    background-image:  linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
    min-height: 620px;
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;

  }
  .container {
    position: absolute;
    border-radius: 10px;
    height: 340px;
    margin: 50px 300px;
    margin-top: 100px;
    max-width: 600px;
    padding: 16px;
    background-color: #BFCC7C;
  }
  table{
    margin-left: 20px; 
    margin-right: auto;
    width:600px;
    height:170px;
    
  }
  input[type=password] {
    width: 80%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border-radius: 5px;
    border: none;
    background: white;

  }
  button{
    margin-left: 400px;
  }
</style>
</head>
<body>
    
<div class="bg-img">
  
  <form class="container" name="user" method="post" action="">
    <h1>Change Password</h1> <br>
    <form method="post">
        <table>
            <tr> 
                <td width="300px" >
                    <label for="psw"><b>Current Password</b></label><br>
                    <input type="password" placeholder="Password" id="psw" name="psw" required><br>
                
                                 </td>  
                <td>
                <label for="newPsw"><b>New Password</b></label><br>
                    <input type="password" placeholder="Password" id="newPsw" name="newPsw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>
  
                    <label for="psw-repeat"><b>Repeat Password</b></label><br>
                    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required><br>
                </td>
            </tr>
        </table> 
        <button type="submit" name="changePassword">Change Password</button><br>
    </form>
</body>
</html>
