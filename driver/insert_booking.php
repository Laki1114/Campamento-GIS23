<?php
include 'config.php';

// Check if form data is received
if (
    isset($_POST['name']) && isset($_POST['contact']) && isset($_POST['email']) 
    && isset($_POST['pickup']) && isset($_POST['dropoff']) && isset($_POST['time']) && isset($_POST['adult']) && isset($_POST['children']) 
    && isset($_POST['specificInterests']) && isset($_POST['referenceNumber']) && isset($_POST['user_id']) && isset($_POST['driver_id']) 
    && isset($_POST['date']) && isset($_POST['advance']) && isset($_POST['amount'])
) {
    // Escape user inputs for security
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $pickup = $_POST['pickup'];
    $dropoff = $_POST['dropoff'];
    $adult = $_POST['adult'];
    $children = $_POST['children'];
    $info = $_POST['specificInterests'];
    $referenceNumber = $_POST['referenceNumber'];
    $user_id = $_POST['user_id'];
    $driver_id = $_POST['driver_id'];
    $time = $_POST['time'];
    $amount = $_POST['amount'];
    $advance = $_POST['advance'];
    // Insert user details into database
    $booking_status = 0; 

    $sql = "INSERT INTO bookings(name, contact, email, adults, children, info, reference_number, pickup_location, dropoff_location, booking_date, booking_time, userId, d_id, advancepay, amount, booking_status)
    VALUES ('$name', '$contact', '$email', '$adult', '$children',  '$info', '$referenceNumber', '$pickup', '$dropoff', '$date', '$time','$user_id', '$driver_id','$advance', '$amount', '$booking_status')";

    if ($con->query($sql) === TRUE) {
        echo "Booking inserted successfully";
        header("Location: ")
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    // Close connection
    $con->close();
} else {
    echo "All fields are required";
}
?>
