<?php
// Connect to MySQL
$servername = "localhost";
$username = "root";
$password = "";
$database = "campamento";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start a session
session_start();

// Check if user is logged in
if (!isset($_SESSION['UserId'])) {
    // Redirect to login page if not logged in
    header("Location:login.php");
    exit();
}

// Get user's information from the database
$userId = $_SESSION['UserId'];
$sql = "SELECT * FROM user WHERE UserId = $userId";
$result = $conn->query($sql);
$user = $result->fetch_assoc();


// Get admin's information from the database
$adminId = 1; // Assuming there's only one admin
$sql = "SELECT * FROM admin WHERE AdminId = $adminId";
$result = $conn->query($sql);
$admin = $result->fetch_assoc();

// Function to display chat messages
function displayMessages($conn, $userId, $adminId) {
    $sql = "SELECT * FROM messages WHERE (SenderUserId = $userId AND ReceiverAdminId = $adminId) OR (SenderAdminId = $adminId AND ReceiverUserId = $userId) ORDER BY TimeStamp ASC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<strong>" . ($row['SenderUserId'] == $userId ? "You" : "Admin") . ": </strong>";
            echo $row['Message'];
            echo "</div>";
        }
    } else {
        echo "No messages yet.";
    }
}

// Function to send a message
function sendMessage($conn, $userId, $adminId, $message) {
    $message = $conn->real_escape_string($message);
    $sql = "INSERT INTO messages (SenderUserId, ReceiverAdminId, Message) VALUES ($userId, $adminId, '$message')";
    $conn->query($sql);
}

// Handle sending a message
if (isset($_POST['message'])) {
    $message = $_POST['message'];
    sendMessage($conn, $userId, $adminId, $message);
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> User Chat Interface </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../user/css/admin.css">
    

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
            
            <?php include '../user/userSidebar.php'; ?>
                    
            </div>

        <!-- ========================= Main ==================== -->
            <div class="main">
        
        
                <h1><center>Welcome, <?php echo $user['FirstName']; ?>!</center></h1>

                <h2><center>Chat with Admin</center></h2>


                <div id="chat">
                    <?php displayMessages($conn, $userId, $adminId); ?>
                </div>

                <form method="post" action="">
                    <input type="text" id="message-input" name="message" placeholder="Type your message..." required>
                    <button type="submit">Send</button>
                </form>

            
            
            </div>
        </div>



        <script>
    // Function to display chat messages
    function displayMessages() {
        <?php
        $sql = "SELECT * FROM messages WHERE (SenderUserId = $userId AND ReceiverAdminId = $adminId) OR (SenderAdminId = $adminId AND ReceiverUserId = $userId) ORDER BY MessageId ASC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                // Determine the class for the message based on sender
                $messageClass = ($row['SenderUserId'] == $userId) ? "user-message" : "admin-reply";

                // Output the message with the appropriate class
                echo "const messageElement = document.createElement('div');";
                echo "messageElement.textContent = '{$row['Message']}';";
                echo "messageElement.classList.add('$messageClass');";
                echo "document.getElementById('chat').appendChild(messageElement);";
            }
        } else {
            echo "const noMessagesElement = document.createElement('div');";
            echo "noMessagesElement.textContent = 'No messages yet.';";
            echo "document.getElementById('chat').appendChild(noMessagesElement);";
        }
        ?>
    }
</script>
    <!-- ====== ionicons ======= -->
</body>

</html>






