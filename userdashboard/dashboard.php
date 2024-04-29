<!DOCTYPE html>
<html>
<head>
<title>dashboard</title>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/homestyle.css">
<link rel="stylesheet" href="../css/userdashboard.css">


</head>


<body style="background-color: ;">

<!-- Navigation Bar -->



<?php include '../home/headerIn.php'; ?>
      


<!-- Header -->


<!-- Page content 
<div class="content" style="max-width:1532px;">
<br><br><br><br>

  <div class="container" id="rooms">
    <h1>Rooms</h1>
    <p>Make yourself at home is our slogan. We offer the best beds in the industry. Sleep well and rest well.</p>
  </div>
  
  <div class="w3-row-padding">
    <div class="w3-col m3">
      <label>Check In</label>
      <input class="w3-input w3-border" type="text" placeholder="DD MM YYYY">
    </div>
    <div class="w3-col m3">
      <label>Check Out</label>
      <input class="w3-input w3-border" type="text" placeholder="DD MM YYYY">
    </div>
    <div class="w3-col m2">
      <label> Adults</label>
      <input class="w3-input w3-border" type="number" placeholder="1">
    </div>
    <div class="w3-col m2">
      <label> Kids</label>
      <input class="w3-input w3-border" type="number" placeholder="0">
    </div>
    <div class="w3-col m2">
      <label> Search</label>
      <button class="w3-button">Search</button>
    </div>
  </div>
-->
<br><br><br><br><br>
<section><?php include 'dashadbar.php'; ?></section>

  <seciton>
  <?php include 'cardsindashboard.php'; ?>
  </seciton>
  <div>
    <h1>Camping sites</h1>
    <h3>You can find our Camping sites anywhere in the Sri lanka:</h3>
  </div>
  
  <div class="row"> 
  <div class="column" >
  <img src="../resource/madolsima.jpg" style="width:100%">
  <div class="text-block">
    <h2>Madolsima</h2>
  </div>
</div>
  
   
  <div class="column2"> 
  <div class="row" >
  <img src="../resource/narangala.jpg" style="width:100%">
  <div class="text-block">
    <h2>Narangala</h2>
  </div>
</div>
  <div class="row" >
  <img src="../resource/home.png" style="width:100%">
  <div class="text-block">
    <h2>Nature</h2>
  </div>
  </div></div>

  <div class="column2"> 
  <div class="row" >
  <img src="../resource/namunukula.jpg" style="width:100%">
  <div class="text-block">
    <h2>Namunukula</h2>
  </div>
</div>
  <div class="row" >
  <img src="../resource/home.png" style="width:100%">
  <div class="text-block">
    <h2>Nature</h2>
  </div>
  </div></div>
  
  </div> 
  
    <a href="../camping sites/camping_sites.php"><button class="button" > See More....</button></a>
  </div>
  </section>
  <!--
<hr>

<div class="row"> 
  
    <?php
   /*
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "campamento";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM camping_sites";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Output data of each row
      while($row = $result->fetch_assoc()) {
          echo '<div class="column">';
          echo '<img src="../glamping manager/uploads/'. $row["camp_site_image"] .'" style="width:100%">';
          echo '<div class="text-block">';
          echo '<h2>' . $row["camp_site_name"] . '</h2>';
          echo '</div>';
          echo '</div>';
      }
  } else {
      echo "0 results";
  }
  $conn->close();*/
    ?>
  </div> 
  <a href="../camping sites/camping_sites.php"><button class="button" >See More....</button></a>
</section>
-->
<hr>

  <seciton>
  

  <?php include 'dashboardglamping.php'; ?>
  
  </section>
 
  
  <hr>

  <seciton>
  

  <?php include 'dashguide.php'; ?>
  
  </section>
 
  
  <hr>
  <seciton>
  

  <?php include 'dashtool.php'; ?>
  
  </section>
 
  
  <hr>

  <seciton>
  

  <?php include 'dashdriver.php'; ?>
  
  </section>
 
  
  <hr>

<div> <?php include 'footer.php'; ?></div>
</div>


</body>
</html>