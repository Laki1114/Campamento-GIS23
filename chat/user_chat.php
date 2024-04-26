<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header("location: login.php");
    exit();
}

include 'db.php';

// Fetch admin messages
$select_query = "SELECT m.*, a.Email AS admin_email FROM messages m JOIN admin a ON m.SenderId = a.AdminId ORDER BY m.Timestamp";
$result = $conn->query($select_query);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Chat</title>
</head>
<body>
    <h1>Welcome, User!</h1>
    <h2>Chat Messages:</h2>
    <?php
    if ($result !== false && $result->num_rows > 0) {
        // Output chat messages
        while($row = $result->fetch_assoc()) {
            echo "<p><strong>From Admin:</strong> {$row['admin_email']} <br> <strong>Message:</strong> {$row['Message']} <br> <strong>Sent At:</strong> {$row['Timestamp']}</p>";
        }
    } else {
        echo "<p>No chat messages.</p>";
    }
    ?>

<?php
    if ($result !== false && $result->num_rows > 0) {
        // Output chat messages
        while($row = $result->fetch_assoc()) {
            echo "<p><strong>From user:</strong> {$row['user_email']} <br> <strong>Message:</strong> {$row['Message']} <br> <strong>Sent At:</strong> {$row['Timestamp']}</p>";
        }
    } else {
        echo "<p>No chat messages.</p>";
    }
    ?>


    <form action="send_message.php" method="post">
        <textarea name="message"></textarea><br>
        <input type="submit" value="Send">
    </form>
</body>
</html>
