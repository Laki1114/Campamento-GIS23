<!DOCTYPE html>
<html>
<head>
    <title>Review Count</title>
    <!-- Add your CSS styling here if needed -->
</head>
<body>

<h2>Review Count</h2>

<?php
// Include database connection file
include 'db.php';

// Query to fetch data from the reviews table
$sql = "SELECT * FROM reviews";
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    echo '<table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product ID</th>
                    <th>User ID</th>
                    <th>Review</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>';

    // Loop through each row of data
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['pid'] . '</td>
                <td>' . $row['uid'] . '</td>
                <td>' . $row['review'] . '</td>
                <td>' . $row['timestamp'] . '</td>
              </tr>';
    }

    echo '</tbody></table>';
} else {
    // If no rows found
    echo '<p>No reviews found.</p>';
}

// Close database connection
$conn->close();
?>

</body>
</html>
