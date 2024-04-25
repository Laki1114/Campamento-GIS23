<?php


session_start();
include('../database/linklinkz.php');

if(isset($_SESSION['customerid'])){
 $UID= $_SESSION['customerid']; }

 
  
  // $email = $_GET['user']; // Retrieve the supplier email from the URL parameter
  $email =$_SESSION['customer'] ;
  $UserID = $_SESSION['customerid'];
 // echo $_SESSION['customer']."<br>";
  //echo $_SESSION['customerid']."<br>";


$sql = "SELECT * FROM user WHERE Email = '$email'";//change Email='email' or Email='$email'
$result = mysqli_query($linkz,$sql);

while ($row = mysqli_fetch_assoc($result)){
  $userID=$row["UserId"];
  $firstName=$row["FirstName"];
  $lastName=$row["LastName"];
  $gender=$row["Gender"];
  $phoneNo=$row["PhoneNo"];
  $nicNo=$row["NICNo"];
  $email=$row["Email"];
  $psw=$row["Password"];
  $thumb=$row["thumb"];
}

?>





<!DOCTYPE html>
<html>
<head>

    

<link rel="stylesheet" type="text/css" href="../css/user/profileUser.css">

</head>
<body>



</header><br><br><br><br><br><br>
<div class="upper-section"><center>
<h2>Welcome <?php  echo $firstName ?>!</h2>
<br><br>
<h3>User ID - <?php  echo $userID ?></h3><br><br>
<div class="container">
    <div class="profile">
      <div><!--class="container-image"-->
      <img src="<?php echo $thumb; ?>" alt="" height='150' width='150'>

      <a href='editUser.php'>
    <button class="btn">
      <img src="../resource/assets/profile/edit.png" width="30px" height="30px"></button></a>
  </div></center>
  </div>
  <br><br><br><br>
          <div class="profile-info">
            <table>
              <tr>
                <td>First Name : <?php  echo $firstName ?></td>
              </tr>
              <tr>
                <td>NIC no : <?php  echo $nicNo ?></td>
                </tr>
                <tr>
              
                <td>Last name : <?php  echo $lastName ?></td>
                </tr>
                <tr>
                <td>Email : <?php  echo $email ?></td>
              </tr>
              <tr>
                <td>Gender : <?php  echo $gender ?></td>
              </tr>
              <tr>
                <td>Phone no : <?php  echo $phoneNo ?></td>
              </tr>

              <tr>
                <td></td>
                <td><a href='#'><button class="btn info">change password</button></a></td>
                <td><a href="deleteUser.php.?id=<?php echo $userID; ?>"><button class="btn info">Delete Account</button></a></td>
              </tr>
            </table>
            
          </div>
        </div>
</div>

<script>
  function openForm() {
    document.getElementById("myForm").style.display = "block";
  }
  
  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }
  </script>

 
</body>
</html>
