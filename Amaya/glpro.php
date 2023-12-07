<!DOCTYPE html>
<html>
<head>
    <title>gl_profile
    </title>
    <link rel="stylesheet" href="pro_style.css">
    <link rel="stylesheet" href="../Lakshani/css/style.css">
</head>
<body>
<?php include("headerIn.php");?>
<br><br><br><br><br><br>
<div class="upper-section">
<h2><center>Welcome John!</center></h2>
<h3><center>Manager ID -  M10
</center></h3>
<div class="container">
    <div class="profile">
      <div class="container-image">
    <img src="images/pro_1.png" alt="profile pic" class="profile-picture" width="200px" height="200px">
    <button class="btn">
      <img src="images/edit.png" width="30px" height="30px"></button>
  </div>
  </div>
  
          <div class="profile-info">
            <table>
              <tr>
                <td>Name : John Fernando</td>
                <td>NIC no : 200036785469</td>
              </tr>
              <tr>
                <td>Business Name: Wild Glamping</td>
                <td>Email : johnfernando12@gmail.com</td>
              </tr>
              <tr>
                <td>Business Rgistration No: GL7008</td>
                <td>Phone no : 0715428778</td>
              </tr>
              <tr>
                <td></td>
                <td><button class="btn info">Edit Your Data</button></td>
              </tr>
            </table>
           
          </div>
  
</div>
</div>
<hr style="width: 100%; height: 2px;">
<div class="move-content">
<h2>Customer Reservations</h2>
[U-User reservation]
</div>
<!--Here starts the purchase table-->

<table class="purchases">
  
  <tr class="no-hover">
    <th>Purchase ID</th>
    <th>Date</th>
   <th></th>
  </tr>
  <tr>
    <td>U21</td>
    <td>2023/12/03</td>
     <td><button class="button button1">View</button></td>
  </tr>
  <tr>
    <td>U68</td>
    <td>2023/08/12</td>
     <td><button class="button button1">View</button></td>
  </tr>
  <tr>
    <td>U89</td>
    <td>2023/02/01</td>
     <td><button class="button button1">View</button></td>
  </tr>
  <tr>
    <td>U120</td>
    <td>2023/08/14</td>
     <td><button class="button button1">View</button></td>
  </tr>

</table>

<br><br>
<p><h2><div class="move-content">Your Cancellations</div></h2></p><p></p>
<!--cancellation table-->

  <table class="purchases table-container">
  <thead>
  <tr class="no-hover">
    <th>User ID</th>
    <th>Date</th>
   <th></th>
  </tr>
</thead>


<tbody>
  <tr>
    <td>U121</td>
    <td>2023/10/29</td>
     <td>YOU CANCELLED</td>
  </tr>
  <tr>
    <td>U151</td>
    <td>2023/09/15</td>
     <td>YOU CANCELLED</td>
  </tr>
  <tr>
    <td>U200</td>
    <td>2023/03/01</td>
     <td>CANCELLED BY CUSTOMER</td>
  </tr>
  <tr>
    <td>U43</td>
    <td>2023/04/02</td>
     <td>CANCELLED BY CUSTOMER</td>
  </tr>
  
  </tbody>
</table>
<br>
<div id="footer">
            <?php
            include("footer.php");
            ?>
        </div>

</body>
</html>