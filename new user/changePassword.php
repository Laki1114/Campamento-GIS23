<?php
session_start();
include('../database/linklinkz.php');
$email = $_SESSION['customer'];

// Function to change password
function changePassword($conn, $email, $oldPassword, $newPassword, $repeatPassword) {
    // Check if new password and repeat password match
    if ($newPassword != $repeatPassword) {
        echo "New passwords do not match.";
        return;
    }

    // Retrieve the password from the database for the given email
    $sql = "SELECT Password FROM user WHERE Email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "Email not found.";
        return;
    }

    $row = $result->fetch_assoc();
    $storedPassword = $row["Password"];

    // Verify old password
    if ($oldPassword != $storedPassword) {
        echo "Incorrect password.";
        return;
    }

    // Update the password in the database
    $sql = "UPDATE user SET password=? WHERE Email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $newPassword, $email);
    $stmt->execute();

    //echo "Password changed successfully.";
    header('location:profileUser.php');
}

// Change password if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $oldPassword = $_POST["old_password"];
    $newPassword = $_POST["new_password"];
    $repeatPassword = $_POST["repeat_password"];

    changePassword($conn, $email, $oldPassword, $newPassword, $repeatPassword);
}

// Close connection
$conn->close();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> changePassword.php </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="../css/User/changePassword.css"/> 
</head>


<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
            <div class="navigation">
            
            <?php include 'userSidebar.php'; ?>
                    
            </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <br><br><br><br>
<center>
        <h2>Change Password</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="old_password">Old Password:</label><br>
        <input type="password" id="old_password" name="old_password" required><br><br>

        <label for="new_password">New Password:</label><br>
        <input type="password" id="new_password" name="new_password" required><br><br>

        <label for="repeat_password">Repeat New Password:</label><br>
        <input type="password" id="repeat_password" name="repeat_password" required><br><br>

        <input type="submit" value="Change Password">
</center>
    </form>
        </div>
    </div>



    <!-- ====== ionicons ======= -->
</body>

</html>