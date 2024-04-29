<?php
session_start();

// Check if admin is logged in, otherwise return an error response
if (!isset($_SESSION['AdminId'])) {
    http_response_code(403); // Forbidden
    exit();
}

// Your database connection code here
$servername = "localhost";
$username = "root";
$password = "";
$database = "campamento";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    http_response_code(500); // Internal Server Error
    exit();
}

// Get the user ID from the AJAX request
$userId = $_GET['userId'];

// Query to check if there are unread messages for the specified user
$sql = "SELECT COUNT(*) AS UnreadMessagesCount FROM messages WHERE ReceiverUserId = $userId AND IsRead = 0";
$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();
    $unreadMessagesCount = $row['UnreadMessagesCount'];

    // Return JSON response indicating whether there are unread messages
    header('Content-Type: application/json');
    echo json_encode(array('hasUnread' => $unreadMessagesCount > 0));

    // Close database connection
    $conn->close();
    exit();
} else {
    http_response_code(500); // Internal Server Error
    exit();
}
