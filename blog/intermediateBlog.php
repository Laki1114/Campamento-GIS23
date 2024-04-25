<?php
session_start();
include('../database/linklinkz.php');

if(isset($_POST['submit'])) {
    $shortTitle = mysqli_real_escape_string($conn, $_POST["shortTitle"]);
    $postDate = mysqli_real_escape_string($conn, $_POST["postDate"]);
    $subjectShort = mysqli_real_escape_string($conn, $_POST["subjectShort"]);
    $productcategory = $_POST['productcategory'];
    $LongDescription1 = mysqli_real_escape_string($conn, $_POST["LongDescription1"]);
    $LongDescription2 = mysqli_real_escape_string($conn, $_POST["LongDescription2"]);
    $LongDescription3 = mysqli_real_escape_string($conn, $_POST["LongDescription3"]);
    $LongDescription4 = mysqli_real_escape_string($conn, $_POST["LongDescription4"]);
   
    
//echo $shortTitle;
    // Array to store image file names
    $imageNames = array();
   
    // Loop through each image file input
    for ($i = 1; $i <= 6; $i++) {
        if(isset($_FILES["image$i"]) && !empty($_FILES["image$i"]["name"])) {
            
            $file_name = $_FILES["image$i"]["name"];
            $file_tmp = $_FILES["image$i"]["tmp_name"];
            $file_size = $_FILES["image$i"]["size"];
            $file_type = $_FILES["image$i"]["type"];
           

            $upload_dir = "uploads/";

            // Check if the directory doesn't exist, then create it
            if (!is_dir($upload_dir)) {
              
                mkdir($upload_dir, 0777, true); // Creates the directory recursively
            }

            // Generate a unique file name to avoid conflicts
            $new_file_name = uniqid() . '_' . basename($file_name);
            $destination = $upload_dir . $new_file_name;
         

            // Move the uploaded file to the destination directory
            if(move_uploaded_file($file_tmp, $destination)) {
                // Add the file name to the array
                $imageNames[] = $new_file_name;
               
            }
        }
    }

    // Convert the array of image names into a comma-separated string
    $imageNamesString = implode(',', $imageNames);


    // Prepare and execute the SQL query to insert data into the database
    $sql = "INSERT INTO blog (shortTitle, postDate, subjectShort, LongDescription1, LongDescription2, LongDescription3, LongDescription4, Image1, Image2, Image3, Image4, Image5, Image6)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
     
        mysqli_stmt_bind_param($stmt, "sssssssssssss", $shortTitle, $postDate, $subjectShort, $LongDescription1, $LongDescription2, $LongDescription3, $LongDescription4, $imageNames[0], $imageNames[1], $imageNames[2], $imageNames[3], $imageNames[4], $imageNames[5]);
        
        if(mysqli_stmt_execute($stmt)) {
           
            $message = 'Blog post added successfully.';
            echo "<script>alert('Blog added successfully');</script>";
            header("Location:dataBlog.php");
        } else {
            $message = 'Error adding blog post: ' . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        $message = 'Error preparing statement: ' . mysqli_error($conn);
    }
}
?>
