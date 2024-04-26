<!DOCTYPE html>
<html>
<head>
 <title>Cards</title>
</head>

<style type="text/css">


*{
 margin: 0px;
 padding: 0px;
}
body{
 font-family: arial;
}
.main{

 margin: 3%;
}

.grid{
     width: 20%;
     display: inline-block;
     box-shadow: 2px 2px 20px black;
     border-radius: 5px; 
     margin: 2.3%;
     height:500px;
    }

.image img{
  width: 100%;
  border-top-right-radius: 5px;
  border-top-left-radius: 5px;
 }

 .imaged img{
  width: 100%;
  height : 170px;
  border-top-right-radius: 5px;
  border-top-left-radius: 5px;
 }

.title{
 
  text-align: center;
  padding: 10px;
  
 }

h1{
  font-size: 20px;
  color:#327028;
 }

.des{
  padding: 3px;
  text-align: center;
  height:300px;
  padding-top: 10px;
  border-bottom-right-radius: 5px;
  border-bottom-left-radius: 5px;
  overflow:hidden;
}
button{
  margin-top: 5px;
  margin-bottom: 5px;
  margin-left: 5px;
  margin-right: 2px;
  background-color: #327028;
  color:#eef0b9d4;
  border: 1px #eef0b9d4;
  border-radius: 5px;
  padding:5px;
}
button:hover{
  background-color: #eef0b9d4;
  color: #327028;
  transition: .5s;
  cursor: pointer;
}

</style>
<body>



<div class="main">

<div class="w3-container">
    <h1>Glamping sites</h1>
    <h3>You can find our Camping sites anywhere in the Sri lanka:</h3>
  </div>


  <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "campamento";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to fetch data from the glmp_sites table
    $sql = "SELECT * FROM glmp_sites";
    $result = $conn->query($sql);

    // Display data
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="grid">
                <div class="imaged">
                    <img src="../glamping manager/uploads/<?php echo $row['site_image']; ?>">
                </div>
                <div class="title">
                    <h1><?php echo $row['site_name']; ?></h1>
                </div>
                <div class="des">
                    <p><?php echo $row['site_description']; ?></p>
                    <a href="../glamping manager/check_in.php"><button>Book Now...</button></a>
                    <a href="../glamping manager/trending_sites.php"><button>Read More...</button></a>
                </div>
            </div>
            <?php
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>


<a href="../glamping manager/trending_sites.php"><button class="button"> See More....</button></a>
</div>

</body>
</html>
