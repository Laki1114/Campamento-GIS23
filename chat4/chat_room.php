<!-- Chat Room Page (chat_room.php) -->
<?php
session_start();

// Check if admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['AdminId'])) {
    header("Location: login.php");
    exit();
}

// Check if user ID is provided in the URL
if (!isset($_GET['user_id'])) {
    header("Location: admin_chat.php");
    exit();
}

// Get the user ID from the URL
$userId = $_GET['user_id'];

// Your database connection code here
$servername = "localhost";
$username = "root";
$password = "";
$database = "campamento";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user details
$sql = "SELECT FirstName FROM user WHERE UserId = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Fetch messages between admin and the selected user
$sql = "SELECT * FROM messages WHERE (SenderAdminId = ? AND ReceiverUserId = ?) OR (SenderUserId = ? AND ReceiverAdminId = ?) ORDER BY TimeStamp ASC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiii", $_SESSION['AdminId'], $userId, $userId, $_SESSION['AdminId']);
$stmt->execute();
$result = $stmt->get_result();
$messages = $result->fetch_all(MYSQLI_ASSOC);

// Close statement
$stmt->close();

// Close connection
$conn->close();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Chat Room </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../admin/css/admin.css">
    <style>

* {
  font-family: "Ubuntu", sans-serif;
  box-sizing: border-box;
}
        body{
            background-color:#BFCC7C;
        }

        h1, h2{
            padding :5px 10px;
            color:#327028;
        }
        /* Chat container styles */
        #chat {
            height: 400px;
            overflow-y: scroll;
            border: 1px solid #327028;
            padding: 10px 10px;
            margin-bottom: 20px;
            margin-right: 50px;
            margin-left: 30px;
            background-color: white;
            border-radius:20px;
        }

        /* Message styles */
        .message {
            padding: 15px 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            max-width: 70%;
            word-wrap: break-word;
        }

        /* User message styles */
        .user-message {
            background-color: #4CAF50;
            color: white;
            float: right;
            clear: both;
        }

        /* Admin message styles */
        .admin-reply {
            background-color: #008CBA;
            color: white;
            float: left;
            clear: both;
        }

        /* Form styles */
        #message-input {
            width: 80%;
            padding: 8px;
            border: 1px solid #327028;
            border-radius: 10px;
            margin-left: 30px;
        }

        button[type="submit"] {
            padding: 8px 20px;
            background-color: #327028;
            color: white;
            border: 1px solid #327028;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>


</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        
        <div class="navigation">
            
            <?php include '../admin/adminsidebar.php'; ?>
                    
            </div>


        <!-- ========================= Main ==================== -->
        <div class="main">
        <h1>Chat with <?php echo $user['FirstName']; ?></h1>
    <div id="chat">
        <?php foreach ($messages as $message): ?>
            <div>
                <strong><?php echo ($message['SenderAdminId'] == $_SESSION['AdminId']) ? 'You' : $user['FirstName']; ?>:</strong>
                <?php echo $message['Message']; ?>
            </div>
        <?php endforeach; ?>
    </div>
    <form method="post" action="send_message.php">
        <input type="hidden" name="receiver_id" value="<?php echo $userId; ?>">
        <input id="message-input" type="text" name="message" placeholder="Type your message..." required>
        <button type="submit">Send</button>
    </form>
        
        </div>
  
    </div>
    <script>
        
    </script>
    <!-- ====== ionicons ======= -->
</body>

</html>



