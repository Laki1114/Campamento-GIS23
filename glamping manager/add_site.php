<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "campamento");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    // Retrieve form data
    $sitename = $_POST['site_name'];
    $sitedescription = $_POST['site_description'];
    $sitecategory = $_POST['site_category'];
    $price = $_POST['price'];

    // File upload handling
    if(isset($_FILES['site_image']) && !empty($_FILES['site_image']['name'])) {
        $file_name = $_FILES['site_image']['name'];
        $file_tmp = $_FILES['site_image']['tmp_name'];
        $file_size = $_FILES['site_image']['size'];
        $file_type = $_FILES['site_image']['type'];

        $upload_dir = "uploads/images";

        // Check if the directory doesn't exist, then create it
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true); // Creates the directory recursively
        }

        $max_file_size = 10 * 1024 * 1024; // 10MB
        $allowed_extensions = array('jpg', 'jpeg', 'png');

        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

        // Check if the uploaded file meets the requirements
        if(in_array($file_extension, $allowed_extensions) && $file_size <= $max_file_size) {
            // Generate a unique filename
            $new_file_name = uniqid().'.'.$file_extension;
            $siteimage = $upload_dir . $new_file_name;

            // Move the uploaded file to the destination directory
            if(move_uploaded_file($file_tmp, $siteimage)) {
                // File uploaded successfully
                echo "File uploaded successfully.";

                // Insert image path into the database
                $sql = "INSERT INTO glmp_sites (site_name, site_description, site_category, price, site_image) 
                        VALUES ('$sitename', '$sitedescription', '$sitecategory', '$price', '$siteimage')";

                // Execute the SQL query
                if (mysqli_query($conn, $sql)) {
                    echo "New record inserted successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else {
                // Failed to move uploaded file
                echo "Error uploading file.";
            }
        } else {
            // Invalid file or file size too large
            echo "Invalid file or file size too large. Only JPG, JPEG, and PNG files up to 10MB are allowed.";
        }
    } else {
        // No file uploaded
        echo "No image selected.";
    }
}

mysqli_close($conn);
?>
