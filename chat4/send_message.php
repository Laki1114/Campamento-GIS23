<?php
session_start();

// Check if admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['AdminId'])) {
    header("Location: login.php");
    exit();
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if message and receiver ID are provided
    if (isset($_POST['message']) && isset($_POST['receiver_id'])) {
        // Get the message and receiver ID from the form
        $message = $_POST['message'];
        $receiverId = $_POST['receiver_id'];

        // Your database connection code here
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "campamento";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind the SQL statement
        $sql = "INSERT INTO messages (SenderAdminId, ReceiverUserId, Message) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iis", $_SESSION['AdminId'], $receiverId, $message);

        // Execute the statement
        if ($stmt->execute()) {
            // Message sent successfully, redirect back to the chat room
            header("Location: chat_room.php?user_id=$receiverId");
            exit();
        } else {
            // Error occurred while sending message
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close statement
        $stmt->close();

        // Close connection
        $conn->close();
    } else {
        // Message or receiver ID is missing
        echo "Message or receiver ID is missing.";
    }
} else {
    // Redirect to admin chat page if accessed directly
    header("Location: admin_chat.php");
    exit();
}
?>
