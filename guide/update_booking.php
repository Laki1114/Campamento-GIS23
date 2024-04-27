<?php
// Assuming you have already established a database connection
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the necessary data is received
    if (isset($_POST['id']) && isset($_POST['status'])) {
        $id = $_POST['id'];
        $status = $_POST['status'];

        // Update the status in the database
        $sql = "UPDATE booking_guide SET booking_status = '$status' WHERE id = '$id'";
        $result = mysqli_query($con, $sql);

        if ($result) {
            // Status updated successfully
            $response = array("success" => true);
            echo json_encode($response);
            exit();
        } else {
            // Error updating status
            $response = array("success" => false);
            echo json_encode($response);
            exit();
        }
    } else {
        // Invalid request parameters
        $response = array("success" => false, "error" => "Invalid parameters");
        echo json_encode($response);
        exit();
    }
} else {
    // Invalid request method
    $response = array("success" => false, "error" => "Invalid request method");
    echo json_encode($response);
    exit();
}
?>
