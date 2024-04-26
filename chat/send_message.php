<?php
session_start();
if (!isset($_SESSION['admin_email']) && !isset($_SESSION['user_email'])) {
    header("location: login.php");
    exit();
}

include 'db.php';

$message = isset($_POST['message']) ? $_POST['message'] : '';

// Determine sender and receiver based on session
if (isset($_SESSION['admin_email'])) {
    $sender_id = 1; // AdminId
    $receiver_id = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : null;
} else {
    $sender_id = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : null;
    $receiver_id = 1; // AdminId
}

// Check if receiver_id is null, and handle the error
if ($receiver_id === null) {
    echo "Error: Receiver ID is null.";
    exit();
}

// Insert message into the database
$insert_query = "INSERT INTO messages (SenderId, ReceiverId, Message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($insert_query);

if ($stmt) {
    $stmt->bind_param("iis", $sender_id, $receiver_id, $message);
    // Execute the statement
    if ($stmt->execute()) {
        header("location: " . ($_SESSION['admin_email'] ? "admin_chat.php" : "user_chat.php"));
        exit();
    } else {
        echo "Error executing query: " . $stmt->error;
    }
} else {
    echo "Error preparing statement: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
