<?php

//session_start();
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


<head> 
        <title>addCategory.php</title> 
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/form.css"/> 
    </head>
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







