<?php
session_start();
include 'db.php';

// Assuming the page is user_chat.php or admin_chat.php
if (basename($_SERVER['PHP_SELF']) == 'user_chat.php') {
    $recipientId = 1; // Admin ID
    $senderId = $_SESSION['UserId'];
} else {
    $recipientId = $_SESSION['UserId'];
    $senderId = 1; // Admin ID
}

// Get chat room ID
$sql = "SELECT ChatRoomId FROM chat_rooms WHERE UserId = $recipientId";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $chatRoomId = $row["ChatRoomId"];

    // Fetch messages
    $sql = "SELECT m.Message, m.Timestamp, u.FirstName AS SenderFirstName, u.LastName AS SenderLastName
            FROM messages m
            JOIN user u ON m.SenderId = u.UserId
            WHERE m.ChatRoomId = $chatRoomId
            ORDER BY m.Timestamp DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<p><strong>" . $row["SenderFirstName"] . " " . $row["SenderLastName"] . "</strong> (" . $row["Timestamp"] . "): " . $row["Message"] . "</p>";
        }
    } else {
        echo "No messages available";
    }
} else {
    echo "Chat room not found";
}

$conn->close();
?>
