<?php
// Include your database connection script or establish connection here
$conn = new mysqli("localhost", "root", "", "campamento");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch comments for the current page
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['page'])) {
    $page = $_GET['page'];
    // Fetch comments based on the page
    $sql = "SELECT * FROM comments WHERE page = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $page);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    // Fetch all comments if page is not specified
    $sql = "SELECT * FROM comments";
    $result = $conn->query($sql);
}

// Display comments
while ($row = $result->fetch_assoc()) {
    echo "<div><strong>" . $row['username']. "</strong>: " . $row['comment'] . "</div>";
}

// Close the database connection
$conn->close();
?>
