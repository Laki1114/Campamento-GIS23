<?php
session_start();

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

<script>
// Function to validate email format
function validateEmail(email) {
    // Regular expression for email validation
    var regex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
    return regex.test(email);
}

// Function to handle form submission
function validateForm() {
    var emailInput = document.getElementById("email");
    var email = emailInput.value;

    // Check if email is empty
    if (email.trim() === "") {
        alert("Email is required");
        emailInput.focus();
        return false;
    }

    // Check if email format is valid
    if (!validateEmail(email)) {
        alert("Invalid email format. Please enter an email in the format youremail@gmail.com");
        emailInput.focus();
        return false;
    }

    // Form is valid, proceed with submission
    return true;
}
</script>

</head>
<body>


<div class="bg-img">
  <form action="loginConfirm.php" class="container" method="post" onsubmit="return validateForm()">
    <h1>Login to your Account</h1> <br>
 
    <label for="email"><b>Username</b></label>
    <input type="text" id="email" placeholder="Enter Username" name="email" required >

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
