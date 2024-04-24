<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "campamento");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form submitted and all required fields are set
if (isset($_POST['site_id'])) {
    // Retrieve form data and sanitize if necessary
    $site_id = $_POST['site_id'];
    $site_name = $_POST['site_name'];
    $site_description = $_POST['site_description'];
    $site_category = $_POST['site_category'];
    $room1_type = $_POST['room1_type'];
    $room1_price = $_POST['room1_price'];
    $room2_type = $_POST['room2_type'];
    $room2_price = $_POST['room2_price'];

    // Prepare and execute SQL query to update the site details
    $sql = "UPDATE glmp_sites SET site_name = '$site_name', site_description = '$site_description', site_category = '$site_category', room1_type = '$room1_type', room1_price = '$room1_price', room2_type = '$room2_type', room2_price = '$room2_price' WHERE site_id = '$site_id'";
    if (mysqli_query($conn, $sql)) {
        // Redirect back to the profile page after successful update
        header("Location: D_U.php");
        exit();
    } else {
        echo "Error updating site: " . mysqli_error($conn);
    }
} else {
    echo "No site ID provided.";
}

// Close database connection
mysqli_close($conn);
?>
