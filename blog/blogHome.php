<?php
session_start();
include('../database/linklinkz.php');?>
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
    <a href="#cs">Camping site </a>
    <a href="#gs">Glamping site</a>
    <a href="#ts">travel sites</a>
    
  </div>

<div class="header">
  <h2><span class="as"><img src="../resource/logo.png" alt="" width="150" height="70"></span>Campamento Blog </h2>
</div>


  <div class="topbar">
      <div class="toggle">
          <ion-icon name="menu-outline"></ion-icon>
      </div>

      <!--<div class="search">
          <label>
              <input type="text" placeholder="Search here">
              <ion-icon name="search-outline"></ion-icon>
          </label>
      </div>-->

      
  </div>

  <div class="leftcolumn">
    <div class="card-row"  id="cs">
      <h1 style="color:white;">Camping Sites</h1>&nbsp;
     
        <?php   
         
        
        
         $sql_related = "SELECT b.*, u.firstName, u.lastName 
        FROM blog b 
        INNER JOIN user u ON b.UserID = u.UserID 
        WHERE b.cat_id = '1'
        order by rand() limit 3";
         
         $result_related = mysqli_query($conn, $sql_related);
          
           while($row = mysqli_fetch_assoc($result_related)) {

         ?>
           <div class="card">
        <h2><?php echo  $row["shortTitle"] ?></h2>
        <div class="user-info">
            By: <?php echo $row['firstName'] . ' ' . $row['lastName']; ?>
        </div>
        <h5><?php echo  $row["postDate"] ?></h5>
        <div> <img src="uploads/<?php echo $row['Image1']; ?>" class="pic1"  style="height:200px;"></div>
        <br>   <a   href='single.php?id=<?php echo  $row["blogID"] ?>'><button class="btn">Read More</button></a><br>
        <p><?php echo  $row["subjectShort"] ?></p>
      </div>
      
    
          <?php
           }
          ?>
      
     <!-- <div class="card clear-card">
          <h2>SIGIRIYA</h2>
          <h5>Ridmi Prabodi, Sep 2, 2023</h5>
          <div><img src="../resource/assets/blog/sigiriya.jpg" class="pic1"  style="height:200px;"></div>
          <p><button class="btn">Read More</button></p>
          <p>short description goes here.short description goes here.short description goes here.short description goes here.</p>
      </div>-->

    </div>
   <a href="campingSites.php"> <p class="text-center">View More New Posts.</p></a>
   <!-- <div class="pagination">
      <a href="#">&laquo;</a>
      <a href="#">1</a>
      <a class="active" href="#">2</a>
      <a href="#">3</a>
      <a href="#">4</a>
      <a href="#">5</a>
      <a href="#">6</a>
      <a href="#">&raquo;</a>
    </div>-->
    <p></p>
    <!-- second row atarts here-->
    <div class="card-row" id="gs">
      <h1 style="color:white;">Glamping Sites</h1>&nbsp;
      <?php   
         
         
         $sql_related = "SELECT b.*, u.firstName, u.lastName 
        FROM blog b 
        INNER JOIN user u ON b.UserID = u.UserID 
        WHERE b.cat_id = '2'
        order by rand() limit 3";
        
         
         
         $result_related = mysqli_query($conn, $sql_related);
          
           while($row = mysqli_fetch_assoc($result_related)) {

         ?>
           <div class="card">
        <h2><?php echo  $row["shortTitle"] ?></h2>
        <div class="user-info">
            By: <?php echo $row['firstName'] . ' ' . $row['lastName']; ?>
        </div>
        <h5><?php echo  $row["postDate"] ?></h5>
        <div> <img src="uploads/<?php echo $row['Image1']; ?>" class="pic1"  style="height:200px;"></div>
        <br>  <a   href='single.php?id=<?php echo  $row["blogID"] ?>'><button class="btn">Read More</button></a><br>
        <p><?php echo  $row["subjectShort"] ?></p>
      </div>
      
    
          <?php
           }
          ?>

    </div>
    <a href="glampingSites.php"><p class="text-center">View More New Posts.</p></a>
   
    <p></p>
    <!--third row starts here-->
    <div class="card-row" id="ts">
      <h1 style="color:white;">Travel  Sites   </h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php   
         
         $sql_related = "SELECT b.*, u.firstName, u.lastName 
         FROM blog b 
         INNER JOIN user u ON b.UserID = u.UserID 
         WHERE b.cat_id = '3'
         order by rand() limit 3";
         
        
         
         
         $result_related = mysqli_query($conn, $sql_related);
          
           while($row = mysqli_fetch_assoc($result_related)) {

         ?>
           <div class="card">
        <h2><?php echo  $row["shortTitle"] ?></h2>
        <div class="user-info">
            By: <?php echo $row['firstName'] . ' ' . $row['lastName']; ?>
        </div>
        <h5><?php echo  $row["postDate"] ?></h5>
        <div> <img src="uploads/<?php echo $row['Image1']; ?>" class="pic1"  style="height:200px;"></div>
        <br>  <a   href='single.php?id=<?php echo  $row["blogID"] ?>'><button class="btn">Read More</button></a><br>
        <p><?php echo  $row["subjectShort"] ?></p>
      </div>
      
    
          <?php
           }
          ?>

    </div>
   <a href="travelSites.php"> <p class="text-center">View More New Posts.</p></a>


</div>
</div>




  <!--right column starts here-->

  <div class="rightcolumn">
    <div class="card2">
      <h2>Post the feeling you got with nature...</h2>
      <div>
       <a href="../user/registerUser.php"> <img src="../resource/assets/blog/post.png" height="100px" width="100px"></a></div>
      <p>Click the icon to create and account to post blogs...</p>
    </div>
    <div class="card">
      <h3>Recent Posts</h3>
      <?php   
         
         $sql_related = "SELECT * FROM blog ORDER BY postDate DESC LIMIT 10";

        
         
         
         $result_related = mysqli_query($conn, $sql_related);
          
           while($row = mysqli_fetch_assoc($result_related)) {
         echo "<table>";
         ?>
          
          <div >
    <tr><td >
        <img class="recent" src="uploads/<?php echo $row['Image1']; ?>" style="height:70px;width:70px;"></td>
     <td class="pic"><a href='single.php?id=<?php echo $row["blogID"] ?>'>   <?php echo $row["shortTitle"] ?></a></td>
    </div>
</div>

       
      
      
    
          <?php
          echo"</table>"; }
          ?>
      
      
    </div>
    <br><br>
    <div class="card2">
      <h3>Advertisments Goes Here</h3>
      <p>Some text..</p>
    </div>
  </div>
</div>


</body>
</html>
