<?php
session_start();
include('../database/linklinkz.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="blog.css">


<style>
  .main {
  position: absolute;
  width: calc(100% - 300px);
  left: 300px;
  min-height: 100vh;
  
  transition: 0.5s;
}
.main.active {
  width: calc(100% - 80px);
  left: 80px;
}

.topbar {
  width: 100%;
  height: 60px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 10px;
}

.toggle {
  position: relative;
  width: 60px;
  height: 60px;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 2.5rem;
  cursor: pointer;
}

.search {
  position: relative;
  width: 400px;
  margin: 0 10px;
}

.search label {
  position: relative;
  width: 100%;
}

.search label input {
  width: 100%;
  height: 40px;
  border-radius: 40px;
  padding: 5px 20px;
  padding-left: 35px;
  font-size: 18px;
  outline: none;
  border: 1px solid black;
}

.search label ion-icon {
  position: absolute;
  top: 0;
  left: 10px;
  font-size: 1.2rem;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #eef0b9d4;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #003D25;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
</style>
<link rel="stylesheet" href="ella.css">
</head>
<body>
  
  <div class="topnav" id="myTopnav">
    <a href="../home/home.php" class="active">Home</a>
    <a href="blogHome.php">Blog</a>
    <a href="campingSites.php">Camping site </a>
    <a href="glampingSites.php">Glamping site</a>
    <a href="travelSites.php">travel sites</a>
    
  </div>

<div class="header">
  <h2><span class="as"><img src="../resource/logo.png" alt="" width="150" height="70"></span>Campamento Blog </h2>
</div>
<br><br><br>

   
  
    <?php
    if(isset($_GET['id'])){
        $blogID = $_GET['id'];
       $sql = "SELECT * FROM blog  WHERE blogID='$blogID'";
       $result = mysqli_query($conn, $sql);
     
    $row = mysqli_fetch_assoc($result);}
    ?>
<table><tr><td>
<div class="para">
    <p><h1><?php echo  $row["shortTitle"] ?></h1></p><br>
    <b> <?php echo  $row["postDate"] ?></b>
    
  <p> <?php echo  $row["LongDescription1"] ?> </p>
   
    
    <p><?php echo  $row["LongDescription2"] ?></p>
    
    
   <p> <?php echo  $row["LongDescription3"] ?></p>

    
    <p>  <?php echo  $row["LongDescription4"] ?></p>
    
    
    

</div>
</td>
<!--2coulmn starts here-->
<td>
<!--image gallary starts here-->
<h2 style="text-align:center">Image Gallery</h2>

<div class="container-gallery">
  <div class="mySlides">
    <div class="numbertext">1 / 6</div>
    <img src="uploads/<?php echo $row['Image1']; ?>" style="width:100%">

  </div>

  <div class="mySlides">
    <div class="numbertext">2 / 6</div>
    <img src="uploads/<?php echo $row['Image2']; ?>" style="width:100%">

  </div>

  <div class="mySlides">
    <div class="numbertext">3 / 6</div>
    <img src="uploads/<?php echo $row['Image3']; ?>" style="width:100%">

  </div>
    
  <div class="mySlides">
    <div class="numbertext">4 / 6</div>
    <img src="uploads/<?php echo $row['Image4']; ?>" style="width:100%">

  </div>

  <div class="mySlides">
    <div class="numbertext">5 / 6</div>
    <img src="uploads/<?php echo $row['Image5']; ?>" style="width:100%">

  </div>
    
  <div class="mySlides">
    <div class="numbertext">6 / 6</div>
    <img src="uploads/<?php echo $row['Image6']; ?>" style="width:100%">

  </div>
    
  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>

  <div class="caption-container">
    <p id="caption"></p>
  </div>

  <div class="row">
    <div class="column">
      <img class="demo cursor" src="uploads/<?php echo $row['Image1']; ?>" style="width:100%;height:60px;" onclick="currentSlide(1)" alt="1pic">
    </div>
    <div class="column">
      <img class="demo cursor" src="uploads/<?php echo $row['Image2']; ?>" style="width:100%;height:60px;" onclick="currentSlide(2)" alt="2pic">
    </div>
    <div class="column">
      <img class="demo cursor" src="uploads/<?php echo $row['Image3']; ?>" style="width:100%;height:60px;" onclick="currentSlide(3)" alt="3pic">
    </div>
    <div class="column">
      <img class="demo cursor" src="uploads/<?php echo $row['Image4']; ?>" style="width:100%;height:60px;" onclick="currentSlide(4)" alt="4pic">
    </div>
    <div class="column">
      <img class="demo cursor" src="uploads/<?php echo $row['Image5']; ?>" style="width:100%;height:60px;" onclick="currentSlide(5)" alt="5pic">
    </div>    
    <div class="column">
      <img class="demo cursor" src="uploads/<?php echo $row['Image6']; ?>" style="width:100%;height:60px;" onclick="currentSlide(6)" alt="6pic">
    </div>
  </div>
  
</div>
<?php  
  //require("comment.php"); 
  ?>
<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("demo");
  let captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
</td>

</tr>
</table>
</body>
</html>