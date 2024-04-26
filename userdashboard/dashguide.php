<!DOCTYPE html>
<html>
<head>
 <title>Cards</title>
</head>

<style >


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
     
    }

.image img{
  width: 100%;
  border-top-right-radius: 5px;
  border-top-left-radius: 5px;
 }

 .imaged img{
  width: 100%;
  height : 250px;
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
 
  padding-top: 10px;
  border-bottom-right-radius: 5px;
  border-bottom-left-radius: 5px;
  overflow:hidden;
}

.info{
  text-align: center;
  margin-top:0px;
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
    <h1>Guide</h1>
    <h3>You can find our Camping sites anywhere in the Sri lanka:</h3>
  </div>

  <?php
    // Establishing a connection to the MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "campamento";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetching data from the driver table
    $sql = "SELECT * FROM guide";
    $result = $conn->query($sql);

    // Counter variable
    $counter = 0;
    // Displaying data in cards
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

          if ($counter < 4) {
            echo "<div class='grid'>";
            echo "<div class='imaged'><img src='../guide/" . $row['picture'] . "'></div>";
            echo "<div class='title'><h1>" . $row['firstname'] . " " . $row['lastname'] . "</h1></div>";
            echo "<div class='des'>";
            echo "<p>"  . $row['expertise'] . "<br>" . $row['district'] . "</p>";


            echo "<a href='../guide/guide_infor.php?id=" . $row['id'] . "'><button class='button'>Read More</button></a>";
            echo "</div>";
            echo "</div>";
               
            $counter++;
          } else {
            break; // Exit the loop after displaying four grids
          }}
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
<br>
    <!-- See More button -->
    <a href="../guide/guide_.php">
        <button class="button">See More....</button>
    </a>


</div>
</body>
</html>
