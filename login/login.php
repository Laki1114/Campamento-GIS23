<?php
session_start();
$error_message = "";

// Check if error message is set in session
if (isset($_SESSION['error'])) {
    switch ($_SESSION['error']) {
        case 'deactivated':
            $error_message = "Your account is deactivated. Please contact support.";
            break;
        case 'password':
            $error_message = "Invalid password.";
            break;
        case 'not_registered':
            $error_message = "Email is not registered.";
            break;
        default:
            $error_message = "An unknown error occurred.";
            break;
    }
    // Unset the error session variable after reading it
    //unset($_SESSION['error']);
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/login.css">
<style>
  .error-message {
  color: red;
  font-size: 17px;
  margin-top: 5px;
}
</style>
</head>
<body>


<div class="bg-img">
  <form action="loginConfirm.php" class="container" method="post">
    <h1>Login to your Account</h1> <br>
    <?php
    // Display the error message in the HTML
    echo "<div class='error-message'>" . $error_message . "</div>";
?>
    <label for="email"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <input type="submit" name="submit" value="Login"> <br>

    <label style="align:center;">
     <input type="checkbox" checked="checked" name="remember"> Remember me
     </label>
<br><br><br>
     <div >
        <button type="button" class="cancelbtn" onclick="document.location='../home/home.php'"> Cancel</button>
        <span class="psw">Forgot <a href="fogotpw.php">password?</a></span>
        </div>

        <br><br>
        <center>
        <span >New Here?<a href="../home/register.php">Sign up</a></span>
        </center>
        <br><br>
      

       

  </form>
</div>

</body>
</html>
