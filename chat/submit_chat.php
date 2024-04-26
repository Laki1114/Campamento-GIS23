<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    echo "User not logged in.";
    exit();
}

include 'db.php';

$user_email = $_SESSION['user_email'];
$message = isset($_POST['message']) ? $_POST['message'] : '';

// Insert the chat message into the database
$insert_query = "INSERT INTO messages (SenderId, ReceiverId, Message) VALUES ((SELECT UserId FROM user WHERE Email = '$user_email'), 1, '$message')";

if ($conn->query($insert_query) === TRUE) {
    echo "Chat message submitted successfully.";
} else {
    echo "Error: " . $insert_query . "<br>" . $conn->error;
}

$conn->close();
?>
