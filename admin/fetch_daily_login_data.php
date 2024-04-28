<?php
// Include database connection file
include('../database/linklinkz.php');

// Fetch daily login attempts data from the database
$sql = "SELECT DATE(login_time) AS login_date, COUNT(*) AS login_attempts FROM login_attempts GROUP BY login_date";
$result = mysqli_query($linkz, $sql);

// Initialize an array to store data
$data = array();

// Check if there are results
if ($result) {
    // Fetch rows and add them to the data array
    while ($row = mysqli_fetch_assoc($result)) {
        $data['labels'][] = $row['login_date'];
        $data['loginAttempts'][] = $row['login_attempts'];
    }
}

// Convert data array to JSON format
$jsonData = json_encode($data);

// Output JSON data
header('Content-Type: application/json');
echo $jsonData;
?>
