<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "campamento");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Define a variable to store the error message
$errorMsg = "";

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Retrieve form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $nicNo = $_POST['nicNo'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phoneNo = $_POST['phoneNo'];
    $password = $_POST['psw'];
    $repeatPassword = $_POST['psw-repeat'];

    // Validate passwords match
    if ($password !== $repeatPassword) {
        // Passwords don't match
        $errorMsg = "Passwords do not match.";
    } else {
        // Passwords match, proceed with registration

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare SQL statement to insert data into the database
        $sql = "INSERT INTO camp_register (firstName, lastName, nicNo, email, gender, phoneNo, password, repeat_password) VALUES ('$firstName', '$lastName', '$nicNo', '$email',  '$gender', '$phoneNo', '$hashedPassword', '$repeatPassword')";

        // Execute SQL statement
        if (mysqli_query($conn, $sql)) {
            // Registration successful, redirect to home page
            header("Location: manager_details.php");
            exit(); // Ensure that no further code is executed after redirection
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <!-- JavaScript to display error message as an alert -->
    <?php if (!empty($errorMsg)): ?>
    <script>
        alert("<?php echo $errorMsg; ?>");
    </script>
    <?php endif; ?>

    <!-- Your registration form goes here -->
    <!-- Make sure to include the JavaScript code to display password validation messages as per your previous implementation -->
</body>
</html>
