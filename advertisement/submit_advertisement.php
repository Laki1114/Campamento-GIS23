<?php
include 'db.php';

// Check if form fields are set and not empty
if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['category']) && isset($_FILES['images'])) {
    // Assign form data to variables
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];

    // Handle image uploads
    $targetDirectory = "uploads/";

    // Create the target directory if it doesn't exist
    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0777, true); // Create directory recursively with full permissions
    }

    $uploadedFiles = [];

    // Loop through each uploaded file
    foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
        $fileName = basename($_FILES['images']['name'][$key]);
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); // Get the lowercase file extension

        // Check if the file has a valid extension
        if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
            $targetFilePath = $targetDirectory . $fileName;

            // Move uploaded file to target directory
            if (move_uploaded_file($tmpName, $targetFilePath)) {
                $uploadedFiles[] = $targetFilePath;
            } else {
                echo "Failed to upload file: $fileName";
            }
        } else {
            echo "Invalid file extension: $fileName";
        }
    }

    // Insert the advertisement details and file paths into the database
    $sql = "INSERT INTO advertisements (title, description, category, images) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters and execute the statement
    $stmt->bind_param("ssss", $title, $description, $category, $uploadedFilesImploded); // Concatenate uploaded file paths into a comma-separated string

    $stmt->execute();

    // Check if insertion was successful
    if ($stmt->affected_rows > 0) {
        echo "Advertisement submitted successfully!";
    } else {
        echo "Failed to submit advertisement!";
    }

    $stmt->close();
} else {
    echo "Form fields are not set or empty.";
}

$conn->close();
?>

