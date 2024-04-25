<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "campamento");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    // Retrieve form data
    $site_name = $_POST['site_name'];
    $site_description = $_POST['site_description'];
    $site_category = $_POST['site_category'];
    $site_image = $_FILES['site_image']['name']; // Handle file upload
    $room1_type = $_POST['room1_type'];
    $room1_price = $_POST['room1_price'];
    $room2_type = $_POST['room2_type'];
    $room2_price = $_POST['room2_price'];

    $sql = "INSERT INTO glmp_sites (site_name, site_description, site_category, site_image,room1_type,room1_price,room2_type,room2_price) 
    VALUES ('$site_name', '$site_description', '$site_category', '$site_image','$room1_type','$room1_price','$room2_type','$room2_price')";


    if (mysqli_query($conn, $sql)) {
        // Handle file upload if needed
        move_uploaded_file($_FILES['site_image']['tmp_name'], 'uploads/' . $_FILES['site_image']['name']);
        echo "Glamping site added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
