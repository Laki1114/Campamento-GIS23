<?php
// send_message.php - Script to send messages

session_start();

if (!isset($_SESSION['admin_email']) && !isset($_SESSION['user_email'])) {
    header("location: login.php");
}

include 'db.php';

$message = $_POST['message'];

// Determine sender and receiver based on session
if (isset($_SESSION['admin_email'])) {
    $sender_id = 1; // AdminId
    $receiver_id = $_SESSION['user_email']; // User's email
} else {
    $sender_id = $_SESSION['user_email']; // User's email
    $receiver_id = 1; // AdminId
}

// Insert message into appropriate table
$insert_query = "INSERT INTO messages (SenderId, ReceiverId, Message) VALUES ('$sender_id', '$receiver_id', '$message')";
$conn->query($insert_query);

header("location: " . ($_SESSION['admin_email'] ? "admin_chat.php" : "user_chat.php"));
?>
