<!-- Admin Chat Page (admin_chat.php) -->
<?php
session_start();

// Check if admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['AdminId'])) {
    header("Location: login.php");
    exit();
}

// Your database connection code here
$servername = "localhost";
$username = "root";
$password = "";
$database = "campamento";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch list of users for chat rooms, ordered by the timestamp of the latest message
$sql = "SELECT u.UserId, u.FirstName, MAX(m.TimeStamp) AS LatestMessageTime
        FROM user u
        LEFT JOIN messages m ON (m.SenderUserId = u.UserId OR m.ReceiverUserId = u.UserId)
        GROUP BY u.UserId, u.FirstName
        ORDER BY LatestMessageTime DESC";
$result = $conn->query($sql);
$users = $result->fetch_all(MYSQLI_ASSOC);


// Close connection
$conn->close();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Chat </title>
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

        table {
        width: 80%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        
        padding: 8px;
        text-align: left;
        border-radius:10px;
    }

    th {
        background-color: #327028;
    }

    tr:hover {
        background-color: #ccc;
    }

    tr {
        cursor: pointer;
        background-color:#ddd;
    }
/* Add this CSS for the 'unread' class */
        tr.unread {
            background-color: #ffe6e6; /* Example color for unread rows */
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
            
            <?php include 'adminsidebar.php'; ?>
                    
            </div>


        <!-- ========================= Main ==================== -->
        <div class="main">
            
        <h1><center>Welcome, Admin!</center></h1>
    <h2>Select a User to Chat</h2>
    <table>
    <thead>
        <tr>
            <th>User ID</th>
            <th>First Name</th>
        </tr>
    </thead>
    <tbody>


    <?php foreach ($users as $user): ?>
                    <tr onclick="window.location='chat_room.php?user_id=<?= $user['UserId']; ?>'">
                        <td><?= $user['UserId']; ?></td>
                        <td><?= $user['FirstName']; ?></td>
                    </tr>
                    <?php endforeach; ?>
    </tbody>
</table>
<!--
<form action="logout.php" method="post">
        <button style="float:right;" type="submit">Logout</button>
    </form>
        </div>-->
  
    </div>
    <script>
    // Function to update row colors based on unread messages
    function updateRowColors() {
        const rows = document.querySelectorAll('tbody tr');
        rows.forEach(row => {
            row.classList.remove('unread'); // Reset row color
            const userId = row.querySelector('td:first-child').textContent;
            // Send AJAX request to check for unread messages for the user
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        const hasUnread = JSON.parse(xhr.responseText).hasUnread;
                        if (hasUnread) {
                            row.classList.add('unread'); // Add 'unread' class to row if there are unread messages
                        }
                    }
                }
            };
            xhr.open('GET', 'check_unread_messages.php?userId=' + userId, true);
            xhr.send();
        });
    }

    // Call the function initially to set row colors
    updateRowColors();

    // Refresh row colors every few seconds (adjust interval as needed)
    setInterval(updateRowColors, 5000); // Update every 5 seconds
</script>

    <!-- ====== ionicons ======= -->
</body>

</html>



