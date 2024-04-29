<?php
session_start();
include('../database/linklinkz.php');
$email = $_SESSION['email'];

// Function to change password
function changePassword($conn, $email, $oldPassword, $newPassword, $repeatPassword) {
    // Check if new password and repeat password match
    if ($newPassword != $repeatPassword) {
        echo "New passwords do not match.";
        return;
    }

    // Retrieve the password from the database for the given email
    $sql = "SELECT Password FROM supplier WHERE Email=?";
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
    $sql = "UPDATE supplier SET Password=? WHERE Email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $newPassword, $email);
    $stmt->execute();

    //echo "Password changed successfully.";
    header('location:profileSupplier.php');
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

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your HTML Head Content -->
   
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/Driver/registerUser.css">
<style>
    .bg-img {
    /* The image used */
    background-image:  linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
    min-height: 620px;
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;

  }
  body{
    background-image: url("../resource/login.jpg");
  }
  .container {
    position: absolute;
    border-radius: 10px;
    height: 340px;
    margin: 50px 300px;
    margin-top: 100px;
    max-width: 600px;
    padding: 16px;
    background-color: #BFCC7C;
  }
  table{
    margin-left: 20px;
    margin-right: auto;
    width:600px;
    height:170px;
   
  }
  input[type=password] {
    width: 80%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border-radius: 5px;
    border: none;
    background: white;

  }
  button{
    margin-left: 400px;
  }
</style>
</head>
<body>
   
<div class="bg-img">
 
<form method="post" class="container" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h1>Change Password</h1> <br>
    <form method="post">
        <table>
            <tr>
                <td width="300px" >
                <label for="old_password">Old Password:</label><br>
        <input type="password" id="old_password" name="old_password" required><br>
                                 </td>  
                <td>
                <label for="new_password">New Password:</label><br>
        <input type="password" id="new_password" name="new_password" required><br>
        <label for="repeat_password">Repeat New Password:</label><br>
        <input type="password" id="repeat_password" name="repeat_password" required><br>
                </td>
            </tr>
        </table>
        <button type="submit" name="changePassword">Change Password</button><br>
    </form>
</body>
</html>