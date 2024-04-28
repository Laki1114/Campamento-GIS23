<?php
// Your database connection code here
$servername = "localhost";
$username = "root";
$password = "";
$database = "campamento";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if there are unread messages for the user
$userId = $_GET['user_id']; // Assuming user ID is sent via GET request
$sql = "SELECT COUNT(*) AS unreadCount FROM messages WHERE ReceiverUserId = $userId AND IsRead = 0";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$unreadCount = $row['unreadCount'];

// Close connection
$conn->close();

// Return true if there are unread messages, false otherwise
echo json_encode($unreadCount > 0);
?>
