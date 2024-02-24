<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/login.css">
</head>
<body>


<div class="bg-img">
  <form action="loginConfirm.php" class="container" method="post">
    <h1>Login to your Account</h1> <br>

    <label for="email"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <input type="submit" value="Login"> <br>

    <label style="align:center;">
     <input type="checkbox" checked="checked" name="remember"> Remember me
     </label>
<br><br><br>
     <div >
        <button type="button" class="cancelbtn"><a href="../home/home.php" style="color:#B7CC7C;">Cancel</a></button>
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
