<?php
// Code for creating a chat system between admin and user with different chat rooms for each user

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chat_system";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for users
$sql = "CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL
)";

$conn->query($sql);

// Create table for chat rooms
$sql = "CREATE TABLE chat_rooms (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    room_name VARCHAR(50) NOT NULL
)";

$conn->query($sql);

// Create table for messages
$sql = "CREATE TABLE messages (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    sender_id INT(6) UNSIGNED,
    receiver_id INT(6) UNSIGNED,
    message TEXT,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$conn->query($sql);

// Close connection
$conn->close();
?>