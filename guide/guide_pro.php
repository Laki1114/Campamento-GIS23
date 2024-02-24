<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="../../Lakshani/css/style.css">
</head>
<body>

<header class="header">

   
<div class="flex">
<a href="../../Lakshani/home.php"><img src="../../Lakshani/images/logo.png" alt="" width="130" height="60"></a>

   <nav class="navbar">
      <a href="../../Lakshani/home.php">Home</a>
      <a href="../../Lakshani/home.php">About Us</a>
      <a href="../../Lakshani/home.php">Services</a>
      <a href="../../Roshana/blog.html">Blog</a>
      <a href="../../Lakshani/contactus.php">Contact Us</a>
   </nav>

   

   <div class="flex2">
      <a href="../../Lakshani/home.php" ><img src="../../Lakshani/images/search.png" alt="" width="25" height="25"></a>
      <a href="guide_pro.php">  <img src="../../Lakshani/images/profile.png" alt="" width="25" height="25"> </a>
      <a href="../../Faheema/cart.php">  <img src="../../Lakshani/images/cart.png" alt="" width="25" height="25"> </a>
      <a href="../../Lakshani/notification.php" ><img src="../../Lakshani/images/bell.png" alt="" width="25" height="25"></a>
   </div>
   
   
</div>


</header><br><br><br><br><br><br><br>
<div class="bgn"> <?php
        require 'config.php';
        $query  = "SELECT * FROM guide WHERE id= 8;";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($Row = mysqli_fetch_assoc($result)) {
        ?>
<h2><center>Welcome <?php echo $Row['firstname']; ?></center></h2>
<h3><center>User ID - GU<?php echo $Row['id']; ?></center></h3>

<div class="container">
    <div class="profile">
      <div class="container-image">
    <img src="gui.jpg" alt="profile pic" class="profile-picture" >
    <button class="btn">
      <img src="./assets/profile/edit.png" width="30px" height="30px"></button>
  </div>
  </div>
  
          <div class="profile-info">
            <table>

              <tr>
                <td><b>First Name</b> : <?php echo $Row['firstname']; ?></td>
                <td><b>NIC No.</b> :     <?php echo $Row['nic']; ?></td>
              </tr>
              <tr>
                <td><b>Last name </b>:  <?php echo $Row['lastname']; ?></td>
                <td><b>Email </b>:  <?php echo $Row['email']; ?></td>
              </tr>
              <tr>
                <td><b>Gender</b> :  <?php echo $Row['gender']; ?></td>
                <td><b>Phone no</b> :  <?php echo $Row['phone']; ?></td>
              </tr>
              <tr>
                <td><b>Address</b> :  <?php echo $Row['address']; ?></td>
                <td><b>Location </b>: <?php echo $Row['location']; ?></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td><button class="btn info"><a href="editgui.php">Edit Your Data</a></button></td>
              </tr>
              <?php
            }
        }
        ?>
            </table>
           
          </div>
  
</div></div>
<div class="down">
<hr style="width: 100%; height: 2px;">
<div class="move-content">
<h2>Bookings</h2>
[GU - Hiring a Guide]
</div>
<!--Here starts the purchase table-->

<table class="purchases">
  
  <tr class="no-hover">
    <th>Booking ID</th>
    <th>Date</th>
   <th></th>
   <th>Cancel</th>
  </tr>
  <tr>
    <td>GU21</td>
    <td>2023/10/03</td>
     <td><button class="button button1">View</button></td>
     <td> <a href='#' onclick='example()'><button class="button button2">Cancel</button></a>
      <div id="example">
        <div>
          <p>Confirm your cancellation?</p>
          <button class="button button2">Yes</button>
         <a href='#' onclick='example()'> <button class="button button1">No</button></a>
        </div>
        <script>
          function example() {
            el = document.getElementById("example");
            el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
          }
        </script>
      </div></td>
  </tr>
  <tr>
    <td>GU51</td>
    <td>2023/09/12</td>
     <td><button class="button button1">View</button></td>
     <td> <a href='#' onclick='example()'><button class="button button2">Cancel</button></a>
      <div id="example">
        <div>
          <p>Confirm your cancellation?</p>
          <button class="button button2">Yes</button>
         <a href='#' onclick='example()'> <button class="button button1">No</button></a>
        </div>
        <script>
          function example() {
            el = document.getElementById("example");
            el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
          }
        </script>
      </div></td>
  </tr>
  <tr>
    <td>GU63</td>
    <td>2023/09/01</td>
     <td><button class="button button1">View</button></td>
     <td> <a href='#' onclick='example()'><button class="button button2">Cancel</button></a>
      <div id="example">
        <div>
          <p>Confirm your cancellation?</p>
          <button class="button button2">Yes</button>
         <a href='#' onclick='example()'> <button class="button button1">No</button></a>
        </div>
        <script>
          function example() {
            el = document.getElementById("example");
            el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
          }
        </script>
      </div></td>
  </tr>


</table>

<br><br>
<p><h2><div class="move-content">Your Cancellations</div></h2></p><p></p>
<!--cancellation table-->

  <table class="purchases table-container">
  <thead>
  <tr class="no-hover">
    <th>Booking ID</th>
    <th>Date</th>
   <th></th>
  </tr>
</thead>


<tbody>
  <tr>
    <td>GU59</td>
    <td>2023/10/03</td>
     <td>YOU CANCELLED</td>
  </tr>
  <tr>
    <td>GU44</td>
    <td>2023/09/12</td>
     <td>YOU CANCELLED</td>
  </tr>
  <tr>

  
  </tbody>
</table>

<br><br>
<p><h2><div class="move-content">Customer Cancellations</div></h2></p><p></p>
<!--cancellation table-->

  <table class="purchases table-container">
  <thead>
  <tr class="no-hover">
    <th>Booking ID</th>
    <th>Date</th>
   <th></th>
  </tr>
</thead>


<tbody>
  <tr>
    <td>GU59</td>
    <td>2023/10/03</td>
     <td>YOU CANCELLED</td>
  </tr>
  <tr>
    <td>GU44</td>
    <td>2023/09/12</td>
     <td>YOU CANCELLED</td>
  </tr>
  <tr>

  
  </tbody>
</table>

<br><br>
<p><h2><div class="move-content">Qualifications<button class="edit">edit</button></div></h2></p><p></p>
<ul>
                <li>Qualified Tour guide - Licensed</li>
                <li>Certified Tour guide - Training program</li>
                <li>Language proficiency: English, Sinhala & Tamil</li>
                <li>Experience of 5 years </li>
                <li>Knowledge about destinations around Kandy and Familiarity with the routes and locations </li>
                <li>Knowledge of first-aid</li>
                <li>Effective time management</li>
            
            </ul>


<p><h2><div class="move-content">Experience<button class="exp">+image</button> <button class="edit">edit</button></div></h2></p><p></p>
<div class="experience">

  <p>Text about experience</p>
  <br>
  <div class="experience-grid">
      <div class="experience-item">
          <img src="exp 1.jpg" alt="Experience 1">
      </div>
      <div class="experience-item">
          <img src="exp 2.jpg" alt="Experience 2">
      </div>
      <div class="experience-item">
          <img src="exp 3.jpg" alt="Experience 3">
     </div>
  </div>
</div>
</div>
</body>
</html>
