<?php
// submit_chat.php - Script to submit chat messages

include 'db.php';

session_start();
if(isset($_SESSION['user_email'])) {
    $user_email = $_SESSION['user_email']; // Assuming user is logged in
    $message = $_POST['message']; // Assuming the submitted form has a field named 'message'

    // Insert the chat message into the database
    $insert_query = "INSERT INTO chat_messages (user_email, message) VALUES ('$user_email', '$message')";
    
    if ($conn->query($insert_query) === TRUE) {
        echo "Chat message submitted successfully.";
    } else {
        echo "Error: " . $insert_query . "<br>" . $conn->error;
    }
} else {
    echo "User not logged in.";
}
?>
