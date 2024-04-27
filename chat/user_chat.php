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

// Fetch admin messages from the database
$select_query = "SELECT m.*, a.Email AS admin_email FROM messages m JOIN admin a ON m.SenderId = a.AdminId ORDER BY m.Timestamp";
$result = $conn->query($select_query); // Execute the query

$selects_query = "SELECT m.*, a.Email AS user_email FROM messages m JOIN user a ON m.ReceiverId = a.UserId ORDER BY m.Timestamp";
$results = $conns->query($selects_query); // Execute the query


?>

<!-- HTML starts here -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Chat</title>
</head>
<body>
    <!-- Display welcome message -->
    <h1>Welcome, User!</h1>
    <h2>Chat Messages:</h2>

    <?php
    // Check if there are admin messages retrieved from the database
    if ($result !== false && $result->num_rows > 0) {
        // Output admin chat messages
        while($row = $result->fetch_assoc()) {
            // Display each admin message
            echo "<p><strong>From Admin:</strong> {$row['admin_email']} <br> <strong>Message:</strong> {$row['Message']} <br> <strong>Sent At:</strong> {$row['Timestamp']}</p>";
        }
    } else {
        // If no admin messages found, display a message
        echo "<p>No chat messages.</p>";
    }
    ?>

    <?php
    // Attempting to fetch user messages, but this block will not work due to $result being already exhausted in the previous loop
    if ($results !== false && $results->num_rows > 0) {
        // Output user chat messages
        while($row = $results->fetch_assoc()) {
            // Display each user message (This block won't be executed)
            echo "<p><strong>From user:</strong> {$row['user_email']} <br> <strong>Message:</strong> {$row['Message']} <br> <strong>Sent At:</strong> {$row['Timestamp']}</p>";
        }
    } else {
        // If no user messages found, display a message
        echo "<p>No chat messages.</p>";
    }
    ?>

    <!-- Form to send a new message -->
    <form action="send_message.php" method="post">
        <textarea name="message"></textarea><br>
        <input type="submit" value="Send">
    </form>
</body>
</html>
