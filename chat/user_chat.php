<?php
// Start or resume the session
session_start();
// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['user_email'])) {
    header("location: login.php");
    exit(); // Stop further execution
}

// Include database connection file
include 'db.php';

// Fetch messages related to the logged-in user from the database
$user_email = $_SESSION['user_email'];

$select_user_id_query = "SELECT UserId FROM user WHERE Email = ?";

if ($stmt = $conn->prepare($select_user_id_query)) {
    $stmt->bind_param("s", $user_email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row['UserId'];
    } else {
        // Handle case where user ID is not found (optional)
        // Redirect to an error page or display a message
        exit("User ID not found for email: $user_email");
    }
    $stmt->close();
} else {
    // Handle database query preparation error (optional)
    exit("Error preparing user ID query");
}

// Prepare SQL query to fetch messages sent by the user
$select_sender_query = "SELECT m.*, a.Email AS admin_email FROM messages m JOIN admin a ON m.SenderId = a.AdminId WHERE m.SenderId = (SELECT AdminId FROM admin WHERE Email = ?) ORDER BY m.Timestamp";

// Prepare SQL query to fetch messages received by the user
$select_receiver_query = "SELECT m.*, u.Email AS user_email FROM messages m JOIN user u ON m.ReceiverId = u.UserId WHERE m.ReceiverId = (SELECT UserId FROM user WHERE Email = ?) ORDER BY m.Timestamp";

// Execute the queries using prepared statements
if ($stmt = $conn->prepare($select_sender_query)) {
    $stmt->bind_param("s", $user_email);
    $stmt->execute();
    $result_sender = $stmt->get_result();
    $stmt->close();
}

if ($stmt = $conn->prepare($select_receiver_query)) {
    $stmt->bind_param("s", $user_email);
    $stmt->execute();
    $result_receiver = $stmt->get_result();
    $stmt->close();
}



?>

<!-- HTML starts here -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Chat</title>
    <style>
        /* Style for message display area */
        .message-container {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            width: 600px; /* Fixed width */
            height: 300px; /* Fixed height */
            overflow-y: auto; /* Add scrollbar if content overflows vertically */
        
        }
    </style>
</head>
<body>
    <!-- Display welcome message -->
    <h1>Welcome, User!</h1>
    <h2>Chat Messages:</h2>

   
   
    <div class="message-container">
    <?php
        // Check if there are messages sent by the user
        if (!empty($result_sender) && $result_sender->num_rows > 0) {
            // Output user's sent messages
            while ($row = $result_sender->fetch_assoc()) {
                // Display each message sent by the user
                echo "<p><strong>To Admin:</strong><br>";
                echo "<strong>Message:</strong> {$row['Message']} <br>";
                echo "<strong>Sent At:</strong> {$row['Timestamp']}</p>";
            }
        }

        // Check if there are messages received by the user
        if (!empty($result_receiver) && $result_receiver->num_rows > 0) {
            // Output user's received messages
            while ($row = $result_receiver->fetch_assoc()) {
                // Display each message received by the user
                echo "<p><strong>From User:</strong> {$row['user_email']} <br>";
                echo "<strong>Message:</strong> {$row['Message']} <br>";
                echo "<strong>Sent At:</strong> {$row['Timestamp']}</p>";
            }
        }

        // If no messages found, display a message
        if ((empty($result_sender) || $result_sender->num_rows == 0) && (empty($result_receiver) || $result_receiver->num_rows == 0)) {
            echo "<p>No chat messages.</p>";
        }
        ?>
</div>
    <!-- Form to send a new message -->
    <form action="send_message.php" method="post">
        <textarea name="message"></textarea><br>
        <input type="submit" value="Send">
    </form>
</body>
</html>
