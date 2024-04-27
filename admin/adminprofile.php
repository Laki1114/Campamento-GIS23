<?php
require("linklinkz.php");

$AID = 1;
$sql = "SELECT * FROM admin WHERE AdminId = '$AID'";
$result = mysqli_query($linkz, $sql);

// Check if the query executed successfully
if (!$result) {
    die("Database query failed: " . mysqli_error($linkz));
}

// Fetch admin details
$row = mysqli_fetch_assoc($result);

// Check if the fetched row is not null
if ($row) {
    $adminID = $row["AdminId"];
    $firstName = $row["FirstName"];
    $lastName = $row["LastName"];
    $gender = $row["Gender"];
    $phoneNo = $row["PhoneNo"];
    $nicNo = $row["NICNo"];
    $email = $row["Email"];
    $psw = $row["Password"];
} else {
    die("Admin details not found.");
}
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Profile </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/admin.css">
<style>
      .btn {
    border: 2px solid black;
    background-color: white;
    color: black;
    padding: 5px 10px;
    font-size: 16px;
    cursor: pointer;
    border-radius:10px;
    
  }
  /* Blue */
  .info {
    border-color: #327028;
    color: black;
    
  }
  
  .info:hover {
    background: #327028;
    color: white;
  }


h2,h3 {
    text-align:center;
    line-height:30px;
}

table {
  margin-top: 0px;
  width: 100%; 
  border: none;height
}

th, td {
    padding: 8px;
    
}

.move-content{
  margin-left:40px;
}

/* =========================wrapping profile pic and table=====================*/
.containerr {
  display: flex; /* Use flexbox to arrange elements horizontally */
  align-items: center; /* Vertically center-align elements */
  margin-left: 70px;
  margin-top:0px;

}

.profile {
  flex: 2; /* Let the profile picture take 1/4 of the available space */
  text-align: center;
}

.profile-info {
  flex: 2; 
  
  /* Let the profile information take 3/4 of the available space */
}
</style>

</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        
    <div class="navigation">
            
            <?php include 'adminsidebar.php'; ?>
                    
            </div>


        <!-- ========================= Main ==================== -->
        <div class="main">
            

            <!-- ======================= Cards ================== -->
            <div >
                <br><br>
                <h2>Welcome <?php  echo $firstName ?>!</h2>
                <h3>Admin ID - A01</h3>
                <br><br>

                <?php

$con = $linkz; 
// Check if the form was submitted
if(isset($_POST['change'])){
    // Check if a file was uploaded without errors
    if(isset($_FILES["new_image"]) && $_FILES["new_image"]["error"] == 0){
        $target_dir = "pic/";
        $target_file = $target_dir . basename($_FILES["new_image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["new_image"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG & PNG files are allowed.";
            $uploadOk = 0;
        }
    
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["new_image"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["new_image"]["name"])). " has been uploaded.";
                // Now update the database with the new image path
                $new_image_path = $target_dir . basename($_FILES["new_image"]["name"]);

                // SQL to update the picture path
                $sql = "UPDATE admin SET picture='$new_image_path' WHERE AdminId='$AID'";
                if ($con->query($sql) === TRUE) {
                  echo "<script>alert('Record updated successfully');</script>";
                  echo "<script>window.setTimeout(function() { window.location = 'adminprofile.php'; }, 2000);</script>";
                } else {
                    echo "Error updating record: " . $con->error;
                }

            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}
?>

                <div class="containerr" >
                    <div class="profile">
                        <div class="container-image">
                        <?php 
        // Check if $row['picture'] is set and not null
        if (isset($row['picture']) && !empty($row['picture'])) {
            $imagePath = $row['picture'];
            // Check if the image file exists
            if (file_exists($imagePath)) {
        ?>
                <img src="<?php echo $imagePath; ?>" alt="profile pic" class="profile-picture" width="300px" height="300px">
        <?php 
            } else {
                echo "Image not found.";
            }
        } else {
            echo "Image path not available.";
        }
        ?>
                        </div><br>
                        <form action="" method="post" enctype="multipart/form-data" class="change-image-form">
                            <input type="file" name="new_image" accept="image/*">
                            <button type="submit" name="change" class="btn info" style="width:150px;">Change image</button>
                        </form>
                    </div>
                
            
  
                    <div class="profile-info">
                        <table>
                        <tr>
                            <td>First Name : <?php  echo $firstName ?></td>
                        </tr>
                        <tr>
                            <td>Last name : <?php  echo $lastName ?></td>
                        </tr>
                        <tr>
                            <td>NIC no : <?php  echo $nicNo ?></td>
                        </tr>
                        <tr>
                            <td>Email : <?php  echo $email ?></td>
                        </tr>
                        <tr>
                            <td>Gender : <?php  echo $gender ?></td>
                        </tr>
                        <tr>
                            <td>Phone no : <?php  echo $phoneNo ?></td>
                        </tr>
                        <tr>
                            <td><a href='./editAdmin.php?id=1'><button class="btn info">Edit Your Data</button></a></td>
                        </tr>
                    </table>
                
                </div>
  
            </div>

            <br>

            </div>

                </div>
            </div>
        </div>
    </div>




    <!-- ====== ionicons ======= -->
</body>

</html>