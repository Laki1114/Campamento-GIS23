<?php
// user_chat.php - User chat interface

session_start();

if (!isset($_SESSION['user_email'])) {
    header("location: login.php");
}

include 'db.php';

// Fetch all messages from admin
$admin_messages_query = "SELECT * FROM messages WHERE ReceiverId = 1";
$admin_messages_result = $conn->query($admin_messages_query);

// Display messages
while ($row = $admin_messages_result->fetch_assoc()) {
    echo $row['Message'] . "<br>";
}
?>

<!-- Add a form to send messages to admin -->
<form action="send_message.php" method="post">
    <textarea name="message"></textarea><br>
    <input type="submit" value="Send">
</form>
