<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "campamento");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    // Retrieve form data
    $customer_name = $_POST['customer_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $nic = $_POST['NIC'];
    

    // Insert new booking into the database
    $sql = "INSERT INTO customer_bookings (customer_name, email, phone, NIC) VALUES ('$customer_name', '$email', '$phone', '$nic')";

    if (mysqli_query($conn, $sql)) {
        // Redirect to payment page
        header("Location: glm_payment.php");
        exit(); // Ensure that no further code is executed after redirection
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
