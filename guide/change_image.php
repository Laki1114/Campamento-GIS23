<?php


// Include database connection file
include('config.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get image id from the form
    $image_id = $_POST['image_id'];

    // File upload path
    $targetDir = "experience/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('jpg', 'png', 'jpeg');

    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            // Update image file name in the database
            $update = $con->query("UPDATE exp_images SET file_name = '$fileName' WHERE id = '$image_id'");
            if ($update) {
                // Image uploaded successfully, redirect to previous page
                header("Location: {$_SERVER["HTTP_REFERER"]}");
                exit;
            } else {
                echo "File upload failed, please try again.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, only JPG, JPEG, PNG, GIF files are allowed to upload.";
    }
}
?>
