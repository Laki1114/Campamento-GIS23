<?php
// Include your database connection script or establish connection here
$conn = new mysqli("localhost", "root", "", "campamento");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch comments from the database
$sql = "SELECT * FROM comments ORDER BY created_at DESC";
$result = $conn->query($sql);

// Display comments
while ($row = $result->fetch_assoc()) {
    echo "<div><strong>" . $row['username'] . "</strong>: " . $row['comment'] . "</div>";
}

// Close the database connection
$conn->close();
?>
