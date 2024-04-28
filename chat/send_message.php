<?php
session_start();
include 'db.php';

$senderType = $_POST['senderType']; // 'user' or 'admin'
$message = $_POST['message'];

// Check if the user ID is set in the session
if (isset($_SESSION['UserId'])) {
    $userId = $_SESSION['UserId'];

    // Check if the user ID exists in the user table
    $userExistsQuery = "SELECT * FROM user WHERE UserId = $userId";
    $result = $conn->query($userExistsQuery);
    
    if ($result->num_rows > 0) {
        // User exists, proceed with inserting the message and creating a chat room
        if ($senderType =='user') {
            $senderId = $userId;
            $recipientId = 1; // Assuming admin ID is 1
            } else {
            $senderId = 1; // Assuming admin ID is 1
            $recipientId = $userId;
            }
            // Get or create chat room ID
    $chatRoomIdQuery = "SELECT ChatRoomId FROM chat_rooms WHERE UserId = $recipientId";
    $result = $conn->query($chatRoomIdQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $chatRoomId = $row["ChatRoomId"];
    } else {
        // Create a new chat room for the user if it doesn't exist
        $createChatRoomQuery = "INSERT INTO chat_rooms (UserId, AdminId) VALUES ($recipientId, 1)";
        if ($conn->query($createChatRoomQuery) === TRUE) {
            $chatRoomId = $conn->insert_id;
        } else {
            echo "Error creating chat room: " . $conn->error;
        }
    }

    // Insert message into database
    $insertMessageQuery = "INSERT INTO messages (ChatRoomId, SenderId, RecipientId, Message) VALUES ($chatRoomId, $senderId, $recipientId, '$message')";
    if ($conn->query($insertMessageQuery) === TRUE) {
        // Redirect back to chat page
        if ($senderType == 'user') {
            header("Location: user_chat.php");
        } else {
            header("Location: admin_chat.php");
        }
    } else {
        echo "Error: " . $insertMessageQuery . "<br>" . $conn->error;
    }
} else {
    echo "User does not exist";
}
} else {
    echo "User ID not set in session";
    }
    
    $conn->close();
    ?>
