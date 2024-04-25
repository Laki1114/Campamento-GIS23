<?php
session_start();
include('../database/linklinkz.php');

if(isset($_POST['submit'])) {
    $id = $_POST["id"]; // Assuming you have an input field named 'id' in your form to pass the ID of the record to be updated

   
   
    $subjectShort = mysqli_real_escape_string($conn, $_POST["subjectShort"]);
    $productcategory = $_POST['productcategory'];
    $LongDescription1 = mysqli_real_escape_string($conn, $_POST["LongDescription1"]);
    $LongDescription2 = mysqli_real_escape_string($conn, $_POST["LongDescription2"]);
    $LongDescription3 = mysqli_real_escape_string($conn, $_POST["LongDescription3"]);
    $LongDescription4 = mysqli_real_escape_string($conn, $_POST["LongDescription4"]);
    
    // Function to delete previous images
    function deletePreviousImages($conn, $id) {
        $sql = "SELECT Image1, Image2, Image3, Image4, Image5, Image6 FROM blog WHERE id =  $id";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $image1, $image2, $image3, $image4, $image5, $image6);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        // Delete previous images from directory
        $upload_dir = "uploads/";
        $images = array($image1, $image2, $image3, $image4, $image5, $image6);
        foreach ($images as $image) {
            if (!empty($image)) {
                $file_path = $upload_dir . $image;
                if (file_exists($file_path)) {
                    unlink($file_path); // Delete the file
                }
            }
        }
    }

    // Call the function to delete previous images
    deletePreviousImages($conn, $id);
    
    // Array to store image file names
    $imageNames = array();
   
    // Loop through each image file input
    for ($i = 1; $i <= 6; $i++) {
        if(isset($_FILES["image$i"]) && !empty($_FILES["image$i"]["name"])) {
            $file_name = $_FILES["image$i"]["name"];
            $file_tmp = $_FILES["image$i"]["tmp_name"];

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

    // Prepare and execute the SQL query to update data in the database
    $sql = "UPDATE blog SET  subjectShort=?, LongDescription1=?, LongDescription2=?, LongDescription3=?, LongDescription4=?, Image1=?, Image2=?, Image3=?, Image4=?, Image5=?, Image6=?, cat_id=? WHERE blogID=$id";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssssssssi",  $subjectShort, $LongDescription1, $LongDescription2, $LongDescription3, $LongDescription4, $imageNames[0], $imageNames[1], $imageNames[2], $imageNames[3], $imageNames[4], $imageNames[5], $productcategory);
        
        if(mysqli_stmt_execute($stmt)) {
            $message = 'Blog post updated successfully.';
            echo "<script>alert('Blog updated successfully');</script>";
            header("Location:dataBlog.php");
        } else {
            $message = 'Error updating blog post: ' . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        $message = 'Error preparing statement: ' . mysqli_error($conn);
    }
}
?>
