<?php
// login.php - Login script

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the user is an admin
    $admin_query = "SELECT * FROM admin WHERE Email = '$email' AND Password = '$password'";
    $admin_result = $conn->query($admin_query);

    if ($admin_result->num_rows > 0) {
        // Admin login successful
        session_start();
        $_SESSION['admin_email'] = $email;
        header("location: admin_chat.php");
    } else {
        // Check if the user is a registered user
        $user_query = "SELECT * FROM user WHERE Email = '$email' AND Password = '$password'";
        $user_result = $conn->query($user_query);

        if ($user_result->num_rows > 0) {
            // User login successful
            session_start();
            $_SESSION['user_email'] = $email;
            header("location: user_chat.php");
        } else {
            // Invalid login credentials
            echo "Invalid email or password.";
        }
    }
}
?>