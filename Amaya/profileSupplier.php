
<?php



require("linklinkz.php");


$SUID = 0;
$sql = "SELECT * FROM supplier WHERE SupplierId = '$SUID'";
$result = mysqli_query($linkz,$sql);

while ($row = mysqli_fetch_assoc($result)){
  $supplierID=$row["SupplierId"];
  $firstName=$row["FirstName"];
  $lastName=$row["LastName"];
  $gender=$row["Gender"];
  $phoneNo=$row["PhoneNo"];
  $nicNo=$row["NICNo"];
  $email=$row["Email"];
  $psw=$row["Password"];
}

?><!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="../Lakshani/css/style.css">
<style>
body{
  background-color: #BFCC7C;
}

  .btn {
    border: 2px solid black;
    background-color: white;
    color: black;
    padding: 5px 10px;
    font-size: 16px;
    cursor: pointer;
  }
  /* Blue */
  .info {
    border-color: #52f321;
    color: rgb(7, 83, 68);
  }
  
  .info:hover {
    background: #11b044;
    color: white;
  }




table {
  margin-top: 0px;
  width: 100%; 
  border: none;
}

.move-content{
  margin-left:40px;
}

/* =========================wrapping profile pic and table=====================*/
.container {
  display: flex; /* Use flexbox to arrange elements horizontally */
  align-items: center; /* Vertically center-align elements */
  margin-left: 70px;
  margin-top:0px;

}

.profile {
  flex: 1; /* Let the profile picture take 1/4 of the available space */
  text-align: center;
}

.profile-info {
  flex: 3; /* Let the profile information take 3/4 of the available space */
}


/* =========================edit button on pic=====================*/

.container-image {
  position: relative;
  width: 100%;
  max-width: 300px;
  border:white;
}

.container-image img {
  width: 100%;
  height: auto;
}

.container-image .btn {
  position: absolute;
  top: 90%;
  left: 90%;
  transform: translate(-90%, -90%);
  -ms-transform: translate(-90%, -90%);
  width: 30px; 
  height: 30px; 
  background: url(edit.jpg) no-repeat;
  background-size: cover; 
  padding: 0;
  border: none;
  cursor: pointer;
  border-radius: 5px;
 
}

.container-image .btn:hover {
  background-color: white;
}

/*here starts the styling for purchses table*/
table.purchases {
  border-collapse: collapse;
  width: 100%;
 margin-left:40px;
 margin-right:40px;
}

table.purchases th,
table.purchases td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

table.purchases tr.no-hover:hover {
  background-color: transparent !important;
}

table.purchases tr:hover {
  background-color: #12a22cc5;
}

table.purchases .button {
  background-color: #82c777c3;
  border: none;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 0px;
  cursor: pointer;
}

table.purchases .button1 {
  font-size: 12px;
}

table.purchases .button2 {
  font-size: 12px;
  background-color:red;
}
/*trying to put scroll bar*/
.table-container{
  max-height: 100px; 
 
}

table.purchases thead {
  position: sticky;
  top: 0;
  }


table.purchases tbody {
  
  overflow-y: scroll; 
  overflow-x: hidden; 
}


    </style>
</head>
<body>

<header class="header">

   
<div class="flex">
<a href="home.php"><img src="../Lakshani/images/logo.png" alt="" width="130" height="60"></a>

   <nav class="navbar">
      <a href="../Lakshani/home.php">Home</a>
      <a href="../Lakshani/home.php">About Us</a>
      <a href="../Lakshani/home.php">Services</a>
      <a href="../Roshana/blog.html">blog</a>
      <a href="../Lakshani/contactus.php">Contact Us</a>
   </nav>

   

   <div class="flex2">
      <a href="../Lakshani/home.php" ><img src="../Lakshani/images/search.png" alt="" width="25" height="25"></a>
      <a href="profileSupplier.php">  <img src="../Lakshani/images/profile.png" alt="" width="25" height="25"> </a>
      <a href="Faheema/cart.php">  <img src="../Lakshani/images/cart.png" alt="" width="25" height="25"> </a>
      <a href="../Lakshani/notification.php" ><img src="../Lakshani/images/bell.png" alt="" width="25" height="25"></a>
   </div>
   
   
</div>


</header>
                    <br><br><br><br><br><br><br>

<h2><center>Welcome John!</center></h2>
<h3><center>User ID - T102</center></h3>
<div class="container">
    <div class="profile">
      <div class="container-image">
    <img src="../Lakshani/images/customer02.jpg" alt="profile pic" class="profile-picture" width="200px" height="200px">
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
                <td><a href="editSupplier.php"><button class="btn info">Edit Your Data</button></a></td>
              </tr>
            </table>
           
          </div>
  
</div>
<hr style="width: 100%; height: 2px;">

<!--Here starts the purchase table-->
<div class="move-content">
  <h2>Recieved Orders </h2>
  
  </div>
  <!--Here starts the purchase table-->
  
  <table class="purchases">
    
    <tr class="no-hover">
      <th>Recieved ID</th>
      <th>Date</th>
     <th>Status</th>
    </tr>
    <tr>
      <td>RO121</td>
      <td>2023/10/03</td>
      <td>Completed</td>
       <td><button class="button button1">View</button></td>
       <td><button class="button button1">Accept</button></td>
       <td><button class="button button2">Reject</button></td>
    </tr>
    <tr>
      <td>RO121</td>
      <td>2023/10/03</td>
      <td>Completed</td>
       <td><button class="button button1">View</button></td>
       <td><button class="button button1">Accept</button></td>
       <td><button class="button button2">Reject</button></td>
    </tr>
    <tr>
      <td>RO121</td>
      <td>2023/10/03</td>
      <td>Completed</td>
       <td><button class="button button1">View</button></td>
       <td><button class="button button1">Accept</button></td>
       <td><button class="button button2">Reject</button></td>
    </tr>
    <tr>
      <td>RO121</td>
      <td>2023/10/03</td>
      <td>Completed</td>
       <td><button class="button button1">View</button></td>
       <td><button class="button button1">Accept</button></td>
       <td><button class="button button2">Reject</button></td>
    </tr>
    
  </table>


<div id="footer">
            <?php
            include("footer.php");
            ?>
        </div>

</body>
</html>
