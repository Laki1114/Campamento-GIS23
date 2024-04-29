<!-- admin_chat.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Chat</title>
</head>
<body>
    <h2>Admin Chat</h2>
    <div id="messages">
        <!-- Messages will be displayed here -->
    </div>
    <form id="messageForm" action="send_message.php" method="post">
        <input type="hidden" name="senderType" value="admin">
        <textarea name="message" rows="3" cols="50" required></textarea><br>
        <button type="submit">Send Message</button>
    </form>
</body>
</html>
