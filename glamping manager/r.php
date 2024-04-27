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

    // Insert data into glmp_sites table
    $sql_site = "INSERT INTO glmp_sites (site_name, site_description, site_category, site_image, room1_type, room1_price, room2_type, room2_price) 
                 VALUES ('$site_name', '$site_description', '$site_category', '$site_image', '$room1_type', '$room1_price', '$room2_type', '$room2_price')";

    if (mysqli_query($conn, $sql_site)) {
        // Handle file upload if needed
        move_uploaded_file($_FILES['site_image']['tmp_name'], 'uploads/' . $_FILES['site_image']['name']);

        // Retrieve the auto-generated site_id
        $site_id = mysqli_insert_id($conn);

        // Insert room details into rooms table
        $sql_room1 = "INSERT INTO rooms (site_id, room1_type, room1_price) 
                      VALUES ('$site_id', '$room1_type', '$room1_price')";
        $sql_room2 = "INSERT INTO rooms (site_id, room2_type, room2_price) 
                      VALUES ('$site_id', '$room2_type', '$room2_price')";

        if (mysqli_query($conn, $sql_room1) && mysqli_query($conn, $sql_room2)) {
            echo "Glamping site and room details added successfully!";
        } else {
            echo "Error: " . $sql_room1 . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Error: " . $sql_site . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
