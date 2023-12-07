<?php



require("linklinkz.php");


$UID = 1;
$sql = "SELECT * FROM user WHERE UserId = '$UID'";
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
}

?>





<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="profileUser.css">
    <link rel="stylesheet" href="view.css">
    
    <link rel="stylesheet" href="../Lakshani/css/style.css">
</head>
<body>
<header class="header">

   
<div class="flex">
<a href="home.php"><img src="../Lakshani/images/logo.png" alt="" width="130" height="60"></a>

   <nav class="navbar">
      <a href="../Lakshani/home.php">Home</a>
      <a href="../Lakshani/home.php">About Us</a>
      <a href="../Lakshani/home.php">Services</a>
      <a href="blog.html">Blog</a>
      <a href="../Lakshani/contactus.php">Contact Us</a>
   </nav>

   

   <div class="flex2">
      <a href="../Lakshani/home.php" ><img src="../Lakshani/images/search.png" alt="" width="25" height="25"></a>
      <a href="profileUser.php">  <img src="../Lakshani/images/profile.png" alt="" width="25" height="25"> </a>
      <a href="../Faheema/cart.php">  <img src="../Lakshani/images/cart.png" alt="" width="25" height="25"> </a>
      <a href="../Lakshani/notification.php" ><img src="../Lakshani/images/bell.png" alt="" width="25" height="25"></a>
   </div>
   
   
</div>


</header><br><br><br><br><br><br>
<div class="upper-section">
<h2><center>Welcome <?php  echo $firstName ?>!</center></h2>
<h3><center>User ID - U102</center></h3>
<div class="container">
    <div class="profile">
      <div class="container-image">
    <img src="./assets/profile/photo.jpg" alt="profile pic" class="profile-picture" width="200px" height="200px">
    <button class="btn">
      <img src="./assets/profile/edit.png" width="30px" height="30px"></button>
  </div>
  </div>
  
          <div class="profile-info">
            <table>
              <tr>
                <td>First Name : <?php  echo $firstName ?></td>
                <td>NIC no : <?php  echo $nicNo ?></td>
              </tr>
              <tr>
                <td>Last name : <?php  echo $lastName ?></td>
                <td>Email : <?php  echo $email ?></td>
              </tr>
              <tr>
                <td>Gender : <?php  echo $gender ?></td>
                <td>Phone no : <?php  echo $phoneNo ?></td>
              </tr>
              <tr>
                <td></td>
                <td><a href='./editUser.php?id=1'><button class="btn info">Edit Your Data</button></a></td>
              </tr>
            </table>
           
          </div>
        </div>
</div>
<hr style="width: 100%; height: 2px;">
<div class="move-content">
<h2>Your Purchases and Orders</h2>
[E-Purchase of equipment, Gl-Booking of Glampingsite, D- Hiring of Driver , GU - Hiring a Guide]
</div>
<!--Here starts the purchase table-->

<table class="purchases">
  
  <tr class="no-hover">
    <th>Purchase ID</th>
    <th>Date</th>
   <th></th>
  </tr>
  <tr>
    <td>E121</td>
    <td>2023/10/03</td>
     <td><button class="button button1"  onclick="openForm()">View</button>
      <div class="chat-popup" id="myForm">
        <form action="/action_page.php" class="form-container">
          <h3>Transaction ID : E121</h3>
          <h3>Tod Name : Tent</h3>
          <h3>Color : Green</h3>
          <h3>Quantity : 01</h3>
          <h3>Amount : $--</h3>
          
          
          <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
      </div></td>
  </tr>
  <tr>
    <td>GL151</td>
    <td>2023/09/12</td>
     <td><button class="button button1">View</button></td>
  </tr>
  <tr>
    <td>D200</td>
    <td>2023/09/01</td>
     <td><button class="button button1">View</button></td>
  </tr>
  <tr>
    <td>GU43</td>
    <td>2023/08/02</td>
     <td><button class="button button1">View</button></td>
  </tr>

</table>

<br><br>
<p><h2><div class="move-content">Your Cancellations</div></h2></p><p></p>
<!--cancellation table-->

  <table class="purchases table-container">
  <thead>
  <tr class="no-hover">
    <th>Purchase ID</th>
    <th>Date</th>
   <th></th>
  </tr>
</thead>


<tbody>
  <tr>
    <td>E121</td>
    <td>2023/10/03</td>
     <td>YOU CANCELLED</td>
  </tr>
  <tr>
    <td>GL151</td>
    <td>2023/09/12</td>
     <td>YOU CANCELLED</td>
  </tr>
  <tr>
    <td>D200</td>
    <td>2023/09/01</td>
     <td>CANCELLED BY DRIVER</td>
  </tr>
  <tr>
    <td>GU43</td>
    <td>2023/08/02</td>
     <td>CANCELLED BY GUIDE</td>
  </tr>
  
  </tbody>
</table>
<?php
require("dataBlog.php");



?>
<script>
  function openForm() {
    document.getElementById("myForm").style.display = "block";
  }
  
  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }
  </script>

  <div >
  <section class="footer">

<div class="box-container">

   <div class="box">
      <h3>quick links</h3>
      
         <a href="home.php">Home</a>
         <a href="home.php">About Us</a>
         <a href="home.php">Services</a>
         <a href="contactus.php">Contact Us</a>
         

   </div>

   <div class="box">
      <br><br><br><br>
         <a href="../Lakshani/home.php">Camping Sites</a>
         <a href="../Lakshani/home.php">Glamping Sites</a>
         <a href="../Lakshani/home.php">Rent Tools</a>
         <a href="../Lakshani/contactus.php">Hire a Guide</a>

   </div>

   <div class="box">
      <h3>extra links</h3>
      <a href="../Lakshani/login.php">login</a>
      <a href="../Lakshani/register.php">register</a>
      <a href="../Lakshani/cart.php">cart</a>
      <a href="../Lakshani/search.php">search</a>
   </div>

   <div class="box">
      <h3>contact info</h3>
      <p> <img src="../Lakshani/images/call.png" alt="" width="20" height="20"> +123-456-7890 </p>
      <p> <img src="../Lakshani/images/call.png" alt="" width="20" height="20"> +111-222-3333 </p>
      <p> <img src="../Lakshani/images/email.png" alt="" width="20" height="20"> campamento@gmail.com </p>
      <p> <img src="../Lakshani/images/location.png" alt="" width="20" height="20"> Colombo, Sri Lanka - 81290 </p>
   </div>

</div>

</section>
        </div>
</body>
</html>
