<?php
// admin_chat.php - Admin chat interface

session_start();

if (!isset($_SESSION['admin_email'])) {
    header("location: login.php");
}

include 'db.php';

// Fetch all messages from users
$user_messages_query = "SELECT * FROM user_messages WHERE ReceiverId = 1";
$user_messages_result = $conn->query($user_messages_query);

// Display messages
while ($row = $user_messages_result->fetch_assoc()) {
    echo $row['Message'] . "<br>";
}
?>


<?php  ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Dashboard </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/admin.css">
</head>






<body>
    <!-- =============== Navigation ================ -->
    
    <div class="container">
    <div class="navigation">
            
            <?php include 'adminsidebar.php'; ?>
                    
            </div>

        <!-- ========================= Main ==================== -->
        <div class="main">

        <form action="send_message.php" method="post">
            <textarea name="message"></textarea><br>
            <input type="submit" value="Send">
        </form>
            
        </div>
    </div>

 

    <!-- ====== ionicons ======= -->
</body>

</html>
<!-- Add a form to send messages to users -->

