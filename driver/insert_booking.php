<?php
include 'config.php';

// Check if form data is received
if (
    isset($_POST['name']) && isset($_POST['contact']) && isset($_POST['email']) &&
    isset($_POST['pickup']) && isset($_POST['dropoff']) && isset($_POST['adult']) &&  
    isset($_POST['children'])  && isset($_POST['specificInterests'])&& isset($_POST['referenceNumber']) && isset($_POST['user_id']) && isset($_POST['guide_id']) &&
    isset($_POST['checkInDate']) && isset($_POST['time'])) {
    // Escape user inputs for security
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $date =  $_POST['checkInDate'];
    $pickup =  $_POST['pickup'];
    $dropoff =  $_POST['dropoff'];
    $adult = $_POST['adult'];
    $children = $_POST['children'];
    $info = $_POST['specificInterests'];
    $referenceNumber = $_POST['referenceNumber'];
    $user_id = $_POST['user_id'];
    $guide_id = $_POST['guide_id'];
    $time = $_POST['time'];
   
    // Insert user details into database
    $booking_status = 0; 

    $sql = "INSERT INTO bookings(name, contact, email, adults, children, info, reference_number, pickup_location, dropoff_location, booking_date, booking_time, userId, d_id, booking_status)
    VALUES ('$name', '$contact', '$email', '$adult', '$children',  '$info', '$referenceNumber', '$pickup', '$dropoff', '$date', '$time','$user_id', '$guide_id',' $booking_status')";

    if ($con->query($sql) === TRUE) {
        echo "Booking inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    // Close connection
    $con->close();
} else {
    echo "All fields are required";
}
?>
