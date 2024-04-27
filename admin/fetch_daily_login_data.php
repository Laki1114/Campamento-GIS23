
<?php
// Include database connection file
include('../database/linklinkz.php');

// Initialize variables for start date and end date
$startDate = isset($_GET['startDate']) ? $_GET['startDate'] : null;
$endDate = isset($_GET['endDate']) ? $_GET['endDate'] : null;

// Construct SQL query with optional date range filter
$sql = "SELECT DATE(login_time) AS login_date, COUNT(*) AS login_attempts FROM login_attempts";
if ($startDate && $endDate) {
    // Add date range filter if both start date and end date are provided
    $sql .= " WHERE DATE(login_time) BETWEEN '$startDate' AND '$endDate'";
}
$sql .= " GROUP BY login_date";

// Execute SQL query
$result = mysqli_query($linkz, $sql);

// Initialize an array to store filtered data
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
