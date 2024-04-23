<?php 
// Assuming you have already connected to your database

// Function to send a message
function sendMessage($senderId, $receiverId, $message) {
    global $db; // Assuming $db is your database connection
    
    $query = "INSERT INTO messages (sender_id, receiver_id, message, timestamp) VALUES (?, ?, ?, NOW())";
    $stmt = $db->prepare($query);
    $stmt->bind_param("iis", $senderId, $receiverId, $message);
    $stmt->execute();
    $stmt->close();
}

// Function to get messages between two users
function getMessages($user1Id, $user2Id) {
    global $db;
    
    $query = "SELECT * FROM messages WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?) ORDER BY timestamp";
    $stmt = $db->prepare($query);
    $stmt->bind_param("iiii", $user1Id, $user2Id, $user2Id, $user1Id);
    $stmt->execute();
    $result = $stmt->get_result();
    $messages = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    
    return $messages;
}

// Example usage
// Assuming $loggedInUserId contains the ID of the currently logged-in user
// Assuming $otherUserId contains the ID of the user the logged-in user is chatting with

// Sending a message
sendMessage($loggedInUserId, $otherUserId, "Hello!");

// Getting messages
$messages = getMessages($loggedInUserId, $otherUserId);
foreach ($messages as $message) {
    echo $message['message'];
}
?>