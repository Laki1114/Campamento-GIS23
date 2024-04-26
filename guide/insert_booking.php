<?php
include 'config.php';

// Check if form data is received
if (
    isset($_POST['name']) && isset($_POST['contact']) && isset($_POST['email']) && isset($_POST['adult']) &&
    isset($_POST['children']) && isset($_POST['languagePreference']) && isset($_POST['specificInterests']) &&
    isset($_POST['referenceNumber']) && isset($_POST['user_id']) && isset($_POST['guide_id']) &&
    isset($_POST['bookingType']) && isset($_POST['checkInDate']) && isset($_POST['checkOutDate']) &&
    isset($_POST['time']) && isset($_POST['endTime']) && isset($_POST['totalPayment']) && isset($_POST['advancePayment'])
) {
    // Escape user inputs for security
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $adult = $_POST['adult'];
    $children = $_POST['children'];
    $languagePreference = $_POST['languagePreference'];
    $specificInterests = $_POST['specificInterests'];
    $referenceNumber = $_POST['referenceNumber'];
    $user_id = $_POST['user_id'];
    $guide_id = $_POST['guide_id'];
    $bookingType = $_POST['bookingType'];
    $checkInDate = $_POST['checkInDate'];
    $checkOutDate = $_POST['checkOutDate'];
    $time = $_POST['time'];
    $endTime = $_POST['endTime'];
    $totalPayment = $_POST['totalPayment'];
    $advancePayment = $_POST['advancePayment'];

    // Insert user details into database
    $booking_status = 0; 

    $sql = "INSERT INTO booking_guide (name, contact, email, adults, children, langPref, specInt, reference_number, userId, guide_id, bookingType, checkIn, checkOut, startTime, endTime, amount, advancePayment, booking_status)
    VALUES ('$name', '$contact', '$email', '$adult', '$children', '$languagePreference', '$specificInterests', '$referenceNumber', '$user_id', '$guide_id', '$bookingType', '$checkInDate', '$checkOutDate', '$time', '$endTime', '$totalPayment', '$advancePayment',' $booking_status')";

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
