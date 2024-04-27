<?php
// update_booking.php
include('../database/linklinkz.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id']) && isset($_POST['status'])) {
        $id = $_POST['id'];
        $status = $_POST['status'];

    $sql = "UPDATE bookings SET booking_status = '$status' WHERE booking_id = '$id'";
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
