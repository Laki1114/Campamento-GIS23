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
        <h1>Tools</h1>
        <h3>You can find our Camping sites anywhere in the Sri Lanka:</h3>
    </div>

    <?php
    // Include database connection file
    include '../admin/db.php';

    // Query to fetch data from the products table
    $sql = "SELECT * FROM products LIMIT 4";
    $result = $conn->query($sql);

    // Check if there are any rows returned
    if ($result->num_rows > 0) {
        // Loop through each row of data
        while ($row = $result->fetch_assoc()) {
            echo '<div class="grid">';
            echo '<div class="imaged">';
            echo '<img src="../supplier/' . $row['thumb'] . '">';
            echo '</div>';
            echo '<div class="title">';
            echo '<h1>' . $row['product_name'] . '</h1>';
            echo '</div>';
            echo '<div class="des">';
            echo '<p>' . $row['product_description'] . '</p>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        // If no rows found
        echo '<p>No products found.</p>';
    }

    // Close database connection
    $conn->close();
    ?>

    <a href="../user/index.php"><button class="button">See More....</button></a>
</div>
  </body>
</html>
