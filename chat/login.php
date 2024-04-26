<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the user is an admin
    $admin_query = "SELECT * FROM admin WHERE Email = '$email' AND Password = '$password'";
    $admin_result = $conn->query($admin_query);

    if ($admin_result->num_rows > 0) {
        // Admin login successful
        $_SESSION['admin_email'] = $email;
        header("location: admin_chat.php");
    } else {
        // Check if the user is a registered user
        $user_query = "SELECT * FROM user WHERE Email = '$email' AND Password = '$password'";
        $user_result = $conn->query($user_query);

        if ($user_result->num_rows > 0) {
            // User login successful
            $_SESSION['user_email'] = $email;
            header("location: user_chat.php");
        } else {
            // Invalid login credentials
            echo "Invalid email or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Login">
    </form>
</body>
</html>
