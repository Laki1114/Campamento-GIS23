<?php
// Connect to your database
require 'config.php';

// Initialize an empty array to store unavailable dates
$unavailableDates = [];

// Assuming you have a table named 'unavailable_dates' with a column 'date'
$sql = "SELECT date FROM driver_availability";

$result = mysqli_query($con, $sql);

if ($result) {
    // Fetch each row and add the date to the array
    while ($row = mysqli_fetch_assoc($result)) {
        $unavailableDates[] = $row['date'];
    }
}

// Return the array of unavailable dates as JSON
echo json_encode(['unavailableDates' => $unavailableDates]);

// Close database connection
mysqli_close($con);
?>
