<?php
require 'config.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the required data is provided in the POST request
    if (isset($_POST['date']) && isset($_POST['availabilityInput'])) {
        // Get date and availability values
        $date = $_POST['date'];
        $availability = $_POST['availabilityInput'];

        // Rest of your code to update availability goes here
        // ...
        $em = $_SESSION['email']; // Adjust this to retrieve the username from your session variable
        
        // Query to fetch driver_id based on username
        $sql = "SELECT id FROM guide WHERE email = '$em'";
        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            // Fetch the driver_id
            $row = mysqli_fetch_assoc($result);
            $guideId = $row['id'];

            // Perform your database update here
            // Example: Update the availability status in the database for the given date and driver_id
            $sq = "insert into guide_availability (guide_id, date, status) VALUES ('$guideId', '$date', '$availability')";

            if (mysqli_query($con, $sq)) {
                // Set status message for success
                $status = "success";
            } else {
                // Set status message for error
                $status = "error";
            }
        } else {
            // Set status message for driver not found
            $status = "driver_not_found";
        }

        // Close database connection
        mysqli_close($con);
    } else {
        // Set status message for data not provided
        $status = "data_not_provided";
    }
} else {
    // Set status message for invalid request method
    $status = "invalid_request_method";
}

// Check if the status is success
if ($status === "success") {
    // Append success parameter to the current URL
    header('Location: ' . $_SERVER['PHP_SELF'] . '?status=success');
    exit;
}
?>