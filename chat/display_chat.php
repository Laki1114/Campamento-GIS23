<?php
// display_chat.php - Script to display chat messages

include 'db.php';

// Retrieve chat messages from the database
$select_query = "SELECT * FROM chat_messages";
$result = $conn->query($select_query);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $messageType = $row["message_type"];
        if ($messageType == "user") {
            echo "User: " . $row["user_email"]. " - Message: " . $row["message"]. "<br>";
        } elseif ($messageType == "admin") {
            echo "Admin: " . $row["user_email"]. " - Message: " . $row["message"]. "<br>";
        }
    }
} else {
    echo "No chat messages.";
}
?>