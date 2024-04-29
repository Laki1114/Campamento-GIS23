<?php
session_start();
//include('../home/header.php');  
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
<br><br><br><br><br><br><br><br><br><br><br><br>

  <div class="topbar">
      <div class="toggle">
          <ion-icon name="menu-outline"></ion-icon>
      </div>

     <!-- here starts cards-->
  
<head>
    <link rel="stylesheet" type="text/css" href="../css/blog/card.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<?php 

$catID = 3;
$sql = "SELECT b.*, u.firstName, u.lastName 
        FROM blog b 
        INNER JOIN user u ON b.UserID = u.UserID 
        WHERE b.cat_id = '$catID'";
//if(isset($_GET['id'])){
    //$catID = $_GET['id'];
   // $sql .= " WHERE cat_id = '$catID'";
//}


$result = mysqli_query($conn, $sql);
 
  while($row = mysqli_fetch_assoc($result)) {
    // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

   



    ?> 
 

      

         <div class="card">

                <h3 class="title"><?php echo  $row["shortTitle"] ?></h3>
<!-- Display user first name and last name -->
<div class="user-info">
            <p>By: <?php echo $row['firstName'] . ' ' . $row['lastName']; ?></p>
        </div>
                <div class="price"> <b> <?php echo  $row["postDate"] ?></b></div>
                 <!--   <div class="price"> <b> <?php //echo  $row["price"] ?></b></div> Add name profile later-->

                <a href="#"> 
                <?php if(isset($row['Image1']) && !empty($row['Image1'])): ?>
                <center>  <img src="uploads/<?php echo $row['Image1']; ?>" alt="" height='150' width='150'></center>
                <?php endif; ?>     </a>


                

                    

                   <font size=2px> <p><?php echo $row["subjectShort"]?>...</p></font>

                    
                  
                
                        <a   href='single.php?id=<?php echo  $row["blogID"] ?>'><button class="buttonz">  Read More
                        </button> </a>  
                  
                    
                
  </div>

                <?php
                  }  
                  ?>
               
              
         