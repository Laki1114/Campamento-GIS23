<?php
require 'config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["new_image"]) && isset($_POST["image_id"])) {
    $image_id = $_POST["image_id"];

    // Get the file details
    $file_name = $_FILES["new_image"]["name"];
    $file_tmp = $_FILES["new_image"]["tmp_name"];

    // Check if file is uploaded successfully
    if (move_uploaded_file($file_tmp, "vehicle/" . $file_name)) {
        // Update the image in the database
        $update_query = "UPDATE v_images SET file_name = '$file_name' WHERE id = $image_id";
        if (mysqli_query($con, $update_query)) {
            // Image updated successfully
            header("Location: d_profile.php"); // Redirect to the profile page or any other page
            exit();
        } else {
            // Error updating image in database
            echo "Error updating image in database";
        }
    } else {
        // Error uploading file
        echo "Error uploading file";
    }
} else {
    // Form not submitted or invalid request
    echo "Invalid request";
}
?>
