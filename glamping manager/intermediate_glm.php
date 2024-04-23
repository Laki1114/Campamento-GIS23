<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "campamento");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Retrieve form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $nicNo = $_POST['nicNo'];
    $email = $_POST['email'];
    $bName = $_POST['BName'];
    $bNo = $_POST['BNo'];
    $gender = $_POST['gender'];
    $phoneNo = $_POST['phoneNo'];
    $password = $_POST['psw'];
    $repeatPassword = $_POST['psw-repeat'];

    // Validate passwords match
    if ($password !== $repeatPassword) {
        // Passwords don't match
        echo "Passwords do not match.";
    } else {
        // Passwords match, proceed with registration

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare SQL statement to insert data into the database
        $sql = "INSERT INTO glamping_manager_registration (first_name, last_name, NIC, email, business_name, business_registration_no, gender, phone_number, password, repeat_password) VALUES ('$firstName', '$lastName', '$nicNo', '$email', '$bName', '$bNo', '$gender', '$phoneNo', '$hashedPassword', '$repeatPassword')";

        // Execute SQL statement
        if (mysqli_query($conn, $sql)) {
            // Registration successful, redirect to home page
            header("Location: glm_dashboard.php");
            exit(); // Ensure that no further code is executed after redirection
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

// Close database connection
mysqli_close($conn);
?>
