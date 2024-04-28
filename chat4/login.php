<?php
session_start();

// Check if the user is already logged in, if yes, redirect to chat system
if(isset($_SESSION["UserId"])) {
    header("Location: chat.php");
    exit();
}

// Check if the form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form inputs
    $email = $_POST["email"];
    $pwd = $_POST["password"];

    
    // Your database connection code here
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "campamento";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to prevent SQL injection
    $sql = "SELECT * FROM user WHERE Email=? AND Password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $pwd);

    // Execute SQL statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();


    // Check if the user exists
if($result->num_rows > 0) {
    // User exists, set session variables and redirect to chat system
    $row = $result->fetch_assoc();
    $_SESSION["UserId"] = $row["UserId"];
    header("Location: chat.php");
    exit();
} 

// If no user is found, check if it's an admin
$sql = "SELECT * FROM admin WHERE Email=? AND Password=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $pwd);

// Execute SQL statement
$stmt->execute();

// Get result
$result = $stmt->get_result();

// Check if the admin exists
if($result->num_rows > 0) {
    // Admin exists, set session variables and redirect to admin dashboard
    $row = $result->fetch_assoc();
    $_SESSION["AdminId"] = $row["AdminId"];
    header("Location: admin_chat.php");
    exit();
}

    // Invalid credentials
    $error = "Invalid email or password.";
 
    // Close statement
    $stmt->close();
    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>

<style>
        body {
            background-color: #BFCC7C;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #ddd;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            color: #327028;
        }

        label {
            font-weight: bold;
            color: #333333;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-top: 6px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #327028;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button[type="submit"]:hover {
            background-color: #295822;
        }

        .error {
            color: #ff0000;
            margin-bottom: 10px;
        }
    </style>

<body>





<form method="post" action="">

<h2>Login</h2>

<?php if(isset($error)) { ?>
    <p class="error"><?php echo $error; ?></p>
<?php } ?>

    <label>Email:</label><br>
    <input type="text" name="email" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>
</form>

</body>
</html>
