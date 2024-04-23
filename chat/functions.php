<?php

function sendMessage($senderId, $receiverId, $message) {
    global $db;
    
    $query = "INSERT INTO messages (sender_id, receiver_id, message) VALUES (?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param("iis", $senderId, $receiverId, $message);
    $stmt->execute();
    $stmt->close();
}

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

?>
