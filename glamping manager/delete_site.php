<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "campamento");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if site_id parameter is set
if (isset($_POST['site_id'])) {
    $site_id = $_POST['site_id'];
    
    // Prepare and execute SQL query to delete the record
    $sql = "DELETE FROM glmp_sites WHERE site_id = '$site_id'";
    if (mysqli_query($conn, $sql)) {
        // Redirect back to the profile page after deletion
        header("Location: D_U.php");
        exit();
    } else {
        echo "Error deleting site: " . mysqli_error($conn);
    }
} else {
    echo "No site ID provided.";
}

// Close database connection
mysqli_close($conn);
?>
