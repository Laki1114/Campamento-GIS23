<?php
// Simple chat backend
session_start();

// Function to save message to file/database
function saveMessage($message) {
    $file = fopen("chat.txt", "a");
    fwrite($file, $message . "\n");
    fclose($file);
}

// Function to fetch messages
function getMessages() {
    $messages = [];
    $file = fopen("chat.txt", "r");
    if ($file) {
        while (($line = fgets($file)) !== false) {
            $messages[] = $line;
        }
        fclose($file);
    }
    return $messages;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message'])) {
    $message = $_POST['message'];
    saveMessage($message);
    exit();
}

// Fetch messages
$messages = getMessages();
echo json_encode($messages);
?>
