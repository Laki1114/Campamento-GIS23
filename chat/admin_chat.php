<?php
session_start();
if (!isset($_SESSION['admin_email'])) {
    header("location: login.php");
    exit();
}

include 'db.php';


// Process form submission to send a message
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message'])) {
    $admin_email = $_SESSION['admin_email'];
    $message = $_POST['message'];

    // Get the admin ID based on the email
    $admin_query = "SELECT AdminId FROM admin WHERE Email = '$admin_email'";
    $admin_result = $conn->query($admin_query);

    if ($admin_result->num_rows > 0) {
        $admin_row = $admin_result->fetch_assoc();
        $admin_id = $admin_row['AdminId'];

        // Insert message into the database
        // Insert message into the database
$insert_query = "INSERT INTO messages (SenderId, ReceiverId, Message) VALUES ('$admin_id', (SELECT UserId FROM user LIMIT 1), '$message')";

        if ($conn->query($insert_query) === TRUE) {
            // Message sent successfully
            header("Location: admin_chat.php");
            exit();
        } else {
            echo "Error: " . $insert_query . "<br>" . $conn->error;
        }
    } else {
        echo "Admin not found.";
    }
}


// Fetch chat messages sent by both users and the admin
$select_query = "SELECT m.*, 
                CASE
                    WHEN m.SenderId = (SELECT AdminId FROM admin WHERE Email = '{$_SESSION['admin_email']}') THEN 'Admin'
                    ELSE u.Email
                END AS sender_email 
                FROM messages m 
                LEFT JOIN user u ON m.SenderId = u.UserId 
                WHERE m.ReceiverId = (SELECT AdminId FROM admin WHERE Email = '{$_SESSION['admin_email']}') 
                ORDER BY m.Timestamp";

$result = $conn->query($select_query);

if ($result === false) {
    die("Error fetching messages: " . $conn->error);
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Chat</title>
</head>
<body>
    <h1>Welcome, Admin!</h1>
    <h2>Chat Messages:</h2>
    <?php
    if ($result->num_rows > 0) {
        // Output chat messages
        while($row = $result->fetch_assoc()) {
            echo "<p><strong>From:</strong> {$row['sender_email']} <br> <strong>Message:</strong> {$row['Message']} <br> <strong>Sent At:</strong> {$row['Timestamp']}</p>";
        }
    } else {
        echo "<p>No chat messages.</p>";
    }
    ?>

    <!-- Form to send message -->
    <form action="" method="post">
        <textarea name="message"></textarea><br>
        <input type="submit" value="Send">
    </form>
</body>
</html>
