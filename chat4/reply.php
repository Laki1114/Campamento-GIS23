<?php

// Check if the message ID is provided in the URL parameters
if (!isset($_GET['message_id'])) {
    // Handle the case where the message ID is missing
    // Redirect or display an error message
    exit("Message ID is missing.");
}

// Retrieve the message ID from the URL parameters
$messageId = $_GET['message_id'];

// Your code to fetch the details of the message from the database
// This might include querying the database to retrieve the message details based on the message ID
// Your database connection code here
$servername = "localhost";
$username = "root";
$password = "";
$database = "campamento";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement to fetch the details of the message
$sql = "SELECT * FROM messages WHERE MessageId = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $messageId); // Assuming MessageId is an integer

// Execute SQL statement
$stmt->execute();

// Get result
$result = $stmt->get_result();

// Fetch the details of the message
if ($result->num_rows > 0) {
    $message = $result->fetch_assoc();
    // At this point, $message contains the details of the message
    // You can access message details like $message['SenderUserId'], $message['Message'], etc.
} else {
    // Handle the case where no message with the provided ID is found
    exit("Message not found.");
}

// Close statement
$stmt->close();

/// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form inputs
    $reply = $_POST['reply'];
    
    // Example validation: Check if the reply is not empty
    if (empty($reply)) {
        $error = "Reply cannot be empty.";
    } else {
        // Process the reply
        // Insert the admin's reply into the database
        // Prepare SQL statement to insert the admin's reply
$sql = "INSERT INTO messages (SenderAdminId, ReceiverUserId, Message, Timestamp) VALUES (?, ?, ?, NOW())";
$stmt = $conn->prepare($sql);

$adminId = 1; // Change this to match the admin's ID
        $stmt->bind_param("iis", $adminId, $message['SenderUserId'], $reply);

// Execute SQL statement
if ($stmt->execute()) {
    // Redirect to a success page or display a success message
    header("Location: reply_success.php");
    exit();
} else {
    // Handle database error
    $error = "Error: " . $conn->error;
}

// Close statement
$stmt->close();
    }
}


// Close connection
$conn->close();
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Reply to Messeges </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../admin/css/admin.css">


    <style>
        body {
            font-family: "Ubuntu", sans-serif;
            box-sizing: border-box;
            background-color: #BFCC7C;
        }
        h1, h2 {
            padding: 5px 10px;
            color: #327028;
            text-align: center;
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


        table {
            width: 90%;
            border-collapse: collapse;
            margin-top: 20px;
            
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #ccc;
        }
        tr {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .reply-button {
            background-color: #327028;
            color: #fff;
            border: none;
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .reply-button:hover {
            background-color: #295822;
        }

    </style>



</head>


</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        
        <div class="navigation">
            
            <?php include '../admin/adminsidebar.php'; ?>
                    
        </div>


        <!-- ========================= Main ==================== -->
        <div class="main">
            
        <h2>Reply to Message</h2>

<!-- Display the message content -->
<div id=chat>
    <p><strong>Message:</strong> <?php echo $message['Message']; ?></p>
    <!-- Display other message details as needed -->
</div>

<!-- Form for the admin to compose and submit their reply -->
<form method="post" action="">
    <?php if(isset($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>
    <label for="reply">Your Reply:</label><br>
    <textarea id="message-input" id="reply" name="reply" rows="2" cols="48" required></textarea>
    <button type="submit">Send Reply</button>
</form>
    

        </div>

    </div>


   

    <!-- ====== ionicons ======= -->
</body>

</html>