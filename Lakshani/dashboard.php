<!DOCTYPE html>
<html>
<head>
<title>dashboard</title>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/dashboard.css">
<link />/rel="stylesheet" href="css/grid.css">

<style>

hr {
        color: #000; /* Line color (black in this example) */
        border: none; /* Remove the default border */
        height: 2px; /* Line thickness */
        background-color: #000; /* Line color (for browsers that don't support 'color') */
        margin: 10px 0; /* Margin above and below the line */
    }

    * {
  box-sizing: border-box;
}


/* Create 3 equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
  position: relative;
  font-family: Arial;
}
.column2 {
  float: left;
  width: 25%;
  padding: 10px;
  position: relative;
  font-family: Arial;
}

.row {
  position: relative;
  font-family: Arial;
}

 img {
  margin-top: 12px;
  flex:1 1 40rem;
 }

.text-block {
  position: absolute;
  bottom: 20px;
  right: 20px;
  background-color: transparent;
  color: white;
  padding-left: 20px;
  padding-right: 20px;
}

</style>
</head>

<body style="background-color: #f1f1f1;">

<!-- Navigation Bar -->

<header class="header">

   
      <div class="flex">
      <a href="home.php"><img src="images/logo.png" alt="" width="130" height="60"></a>

         <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="home.php">About Us</a>
            <a href="home.php">Services</a>
            <a href="../Roshana/blog.html">blog</a>
            <a href="contactus.php">Contact Us</a>
         </nav>

         

         <div class="flex2">
            <a href="searchpage.php" ><img src="images/search.png" alt="" width="25" height="25"></a>
            <a href="../Roshana/profileUser.php">  <img src="images/profile.png" alt="" width="25" height="25"> </a>
            <a href="cart.php">  <img src="images/cart.png" alt="" width="25" height="25"> </a>
            <a href="notification.php" ><img src="images/bell.png" alt="" width="25" height="25"></a>
         </div>
         
         
      </div>
  

</header>


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

<hr>
  <section>
  <div>
    <h1>Camping sites</h1>
    <h3>You can find our Camping sites anywhere in the Sri lanka:</h3>
  </div>
  
  <div class="row"> 
  <div class="column" >
  <img src="images/home.png" style="width:100%">
  <div class="text-block">
    <h2>Nature</h2>
  </div>
</div>
  
   
  <div class="column2"> 
  <div class="row" >
  <img src="images/home.png" style="width:100%">
  <div class="text-block">
    <h2>Nature</h2>
  </div>
</div>
  <div class="row" >
  <img src="images/home.png" style="width:100%">
  <div class="text-block">
    <h2>Nature</h2>
  </div>
  </div></div>

  <div class="column2"> 
  <div class="row" >
  <img src="images/home.png" style="width:100%">
  <div class="text-block">
    <h2>Nature</h2>
  </div>
</div>
  <div class="row" >
  <img src="images/home.png" style="width:100%">
  <div class="text-block">
    <h2>Nature</h2>
  </div>
  </div></div>
  
  </div> 
  
    <a href="../Amaya/campingsite.php"><button class="button" > See More....</button></a>
  </div>
  </section>
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