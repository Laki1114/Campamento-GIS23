<?php
session_start();
include('config.php');
include('functions.php');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message']) && isset($_POST['receiver_id'])) {
    $receiver_id = $_POST['receiver_id'];
    $message = $_POST['message'];
    sendMessage($user_id, $receiver_id, $message);
}

// Get users from database (for demonstration purposes, you may have your own user management system)
$query = "SELECT id, username FROM users WHERE id != ?";
$stmt = $db->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$users = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
</head>
<body>
    <h2>Chat</h2>
    <form method="post" action="">
        <select name="receiver_id">
            <?php foreach ($users as $user): ?>
                <option value="<?= $user['id'] ?>"><?= $user['username'] ?></option>
            <?php endforeach; ?>
        </select><br>
        <textarea name="message" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Send">
    </form>

    <h3>Messages</h3>
    <?php
    if (isset($_POST['receiver_id'])) {
        $receiver_id = $_POST['receiver_id'];
        $messages = getMessages($user_id, $receiver_id);
        foreach ($messages as $message) {
            echo $message['message'] . "<br>";
        }
    }
    ?>

    <br>
    <a href="logout.php">Logout</a>
</body>
</html>
