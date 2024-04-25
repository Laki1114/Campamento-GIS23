<?php
require 'config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if files are selected
    if (isset($_FILES['image']) && !empty($_FILES['image']['name'][0])) {
        // Loop through each file
        $numFiles = count($_FILES['image']['name']);
        for ($i = 0; $i < $numFiles; $i++) {
            // Get file details
            $fileName = $_FILES['image']['name'][$i];
            $fileTmpName = $_FILES['image']['tmp_name'][$i];
            $fileSize = $_FILES['image']['size'][$i];
            $fileType = $_FILES['image']['type'][$i];

            // Check file type
            $allowedTypes = array('image/jpeg', 'image/png');
            if (!in_array($fileType, $allowedTypes)) {
                // File type not allowed
                echo "Only JPG, JPEG & PNG  files are allowed.";
                exit;
            }

            // Upload directory
            $uploadDirectory = 'experience/';
            $targetPath = $uploadDirectory . $fileName;

            // Get guide ID from session
            $em = $_SESSION['email'];
            $sqlGuideId = "SELECT id FROM guide WHERE email = '$em'";
            $resultGuideId = mysqli_query($con, $sqlGuideId);
            $rowGuideId = mysqli_fetch_assoc($resultGuideId);
            $guideId = $rowGuideId['id'];

            // Move uploaded file to upload directory
            if (move_uploaded_file($fileTmpName, $targetPath)) {
                // Insert image path and file name into database
                $sql = "INSERT INTO exp_images (guide_id, path, file_name, uploaded_on) VALUES ('$guideId', '$targetPath', '$fileName', NOW())";
                if (mysqli_query($con, $sql)) {
                    // Image uploaded and inserted successfully
                    continue;
                } else {
                    // Error inserting image path into database
                    echo "Error inserting image into database: " . mysqli_error($con);
                    exit;
                }
            } else {
                // Error moving uploaded file
                echo "Error uploading file.";
                exit;
            }
        }
        // All images uploaded successfully
        header("Location: d_profile.php");
        exit;
    } else {
        // No file selected
        echo "Please select at least one file to upload.";
    }
} else {
    // Invalid request method
    echo "Invalid request method.";
}
?>
