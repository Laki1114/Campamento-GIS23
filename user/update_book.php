<?php
// update_booking.php
include('../database/linklinkz.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id']) && isset($_POST['status'])) {
        $id = $_POST['id'];
        $status = $_POST['status'];
    $id = $_POST['id'];
    $status = $_POST['status'];

    error_log("ID: $id, Status: $status"); // Log received data

    $sql = "UPDATE booking_guide SET booking_status = '$status' WHERE id = '$id'";
    $result = mysqli_query($linkz, $sql);

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
}
}
?>
