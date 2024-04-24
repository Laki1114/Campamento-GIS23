






<?php

session_start();
//include('../database/linklinkz.php');
//if(!isset($_SESSION['email']) && empty($_SESSION['email']) ){
 //header('location:login.php');
//}

include ('../database/linklinkz.php');


if(isset($_POST['submit'])){
$catName = $_POST['catName'];

$sql = "INSERT INTO Category (cat_name) VALUES ('$catName')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
  header('location:categories.php');
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}


?> 

<!DOCTYPE html>
<html>
<head> 
        <title>addCategory.php</title> 
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/user/form.css"/> 
    </head>



    <body>
        <div class="container2">
            <div class="navigation">
            
                <?php include 'sidebar.php'; ?>
                    
            </div>

            <div class="main">
           
    
                <div class="container">

                <div class="card">
                    <div class="card-header">
                        Add Category
                    </div>
                    <div class="card-body">

                    <form action="addCategory.php" method='post'>
                            <div class="form-group">
                            <label for="catName"> Name:</label>
                            <input type="text" class="form-control" id="catName" name='catName'>
                            </div> 
                            <button type="submit" name='submit' class="btn btn-primary">Submit</button>
                    </form>

                    </div>
                </div>
                </div>



<!--next container-->

                <div class="container">

                <div class="card">
                    <div class="card-header">
                        Added Category
                    </div>
                    <div class="card-body">
                    <?php 
                    
                    $sql2 = "SELECT cat_name FROM Category";
                    $result2 = mysqli_query($conn, $sql2);
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                    echo "<li>" . $row2['cat_name'] . "</li><br>"; 
                    }

                    ?>

                                
                    </div>
                </div>
                </div>
            </div>
        </div>

</body>
</html>





