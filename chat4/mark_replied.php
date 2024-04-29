<?php
session_start();

// Check if the message ID is provided in the URL parameter
if(isset($_GET['message_id'])) {
    // Assuming the message ID is received from the URL parameter
    $messageId = $_GET['message_id'];

    // Set a session variable to indicate that the message has been replied to
    $_SESSION['replied'][$messageId] = true;
}
?>
