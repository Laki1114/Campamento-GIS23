<?php
// Include the file with your database connection details
include 'db.php';



//user-----------------------------------------------------------
// Check if the userId parameter is provided
// Check if the userId parameter is provided
if (isset($_GET['UserId'])) {
    $UserId = $_GET['UserId']; // Change $userId to $UserId

    // Query to retrieve user details based on userId
    $sql = "SELECT * FROM user WHERE UserId = '$UserId'";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result->num_rows > 0) {
        // Fetch user details
        $user = $result->fetch_assoc();
        echo '<style>
        /* CSS styles */
        h1 {
            color: #327028;
        }
        body {
            background-color: #BFCC7C;
        }
         </style>';
        // Output user details as JSON or HTML, depending on your requirement
        //echo json_encode($user); // For JSON response
        // Alternatively, you can output user details as HTML and style it accordingly
        echo '<h1>User Details</h1>';
        echo '<p>User ID: ' . $user['UserId'] . '</p>';
        echo '<p>First Name: ' . $user['FirstName'] . '</p>';
        echo '<p>Last Name: ' . $user['LastName'] . '</p>';
        echo '<p>Gender: ' . $user['Gender'] . '</p>';
        echo '<p>Phone No: ' . $user['PhoneNo'] . '</p>';
        echo '<p>NIC No: ' . $user['NICNo'] . '</p>';
        echo '<p>Email Address: ' . $user['Email'] . '</p>';
    } else {
        // If no user found with the provided userId
        echo 'User not found';
    }
} 



//Glamping Manager------------------------------------------------------------
if (isset($_GET['glm_id'])) {
    $glm_id = $_GET['glm_id']; // Change $userId to $UserId

    // Query to retrieve user details based on userId
    $sql = "SELECT * FROM glamping_manager_registration WHERE glm_id = '$glm_id'";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result->num_rows > 0) {
        // Fetch user details
        $user = $result->fetch_assoc();
        echo '<style>
        /* CSS styles */
        h1 {
            color: #327028;
        }
        body {
            background-color: #BFCC7C;
        }
         </style>';
        // Output user details as JSON or HTML, depending on your requirement
        //echo json_encode($user); // For JSON response
        // Alternatively, you can output user details as HTML and style it accordingly
        echo '<h1>Glamping site Manager Details</h1>';
        echo '<p>Glamping site Manager ID: ' . $user['glm_id'] . '</p>';
        echo '<p>First Name: ' . $user['first_name'] . '</p>';
        echo '<p>Last Name: ' . $user['last_name'] . '</p>';
        echo '<p>Gender: ' . $user['gender'] . '</p>';
        echo '<p>Phone No: ' . $user['phone_number'] . '</p>';
        echo '<p>NIC No: ' . $user['NIC'] . '</p>';
        echo '<p>Email Address: ' . $user['email'] . '</p>';
    } else {
        // If no user found with the provided userId
        echo 'User not found';
    }
} 



//Guide------------------------------------------------------------
if (isset($_GET['id'])) {
    $id = $_GET['id']; // Change $userId to $UserId

    // Query to retrieve user details based on userId
    $sql = "SELECT * FROM guide WHERE id = '$id'";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result->num_rows > 0) {
        // Fetch user details
        $user = $result->fetch_assoc();
        echo '<style>
        /* CSS styles */
        h1 {
            color: #327028;
        }
        body {
            background-color: #BFCC7C;
        }
         </style>';
        // Output user details as JSON or HTML, depending on your requirement
        //echo json_encode($user); // For JSON response
        // Alternatively, you can output user details as HTML and style it accordingly
        echo '<h1>Guide Details</h1>';
        echo '<p>Guide ID: ' . $user['id'] . '</p>';
        echo '<p>First Name: ' . $user['firstname'] . '</p>';
        echo '<p>Last Name: ' . $user['lastname'] . '</p>';
        echo '<p>Gender: ' . $user['gender'] . '</p>';
        echo '<p>Phone No: ' . $user['phone'] . '</p>';
        echo '<p>NIC No: ' . $user['nic'] . '</p>';
        echo '<p>Email Address: ' . $user['email'] . '</p>';
    } else {
        // If no user found with the provided userId
        echo 'User not found';
    }
} 



//Driver-----------------------------------------------------
if (isset($_GET['d_id'])) {
    $d_id = $_GET['d_id']; // Change $userId to $UserId

    // Query to retrieve user details based on userId
    $sql = "SELECT * FROM driver WHERE d_id = '$d_id'";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result->num_rows > 0) {
        // Fetch user details
        $user = $result->fetch_assoc();
        echo '<style>
        /* CSS styles */
        h1 {
            color: #327028;
        }
        body {
            background-color: #BFCC7C;
        }
         </style>';
        // Output user details as JSON or HTML, depending on your requirement
        //echo json_encode($user); // For JSON response
        // Alternatively, you can output user details as HTML and style it accordingly
        echo '<h1>Driver Details</h1>';
        echo '<p>Driver ID: ' . $user['d_id'] . '</p>';
        echo '<p>First Name: ' . $user['firstname'] . '</p>';
        echo '<p>Last Name: ' . $user['lastname'] . '</p>';
        echo '<p>Gender: ' . $user['gender'] . '</p>';
        echo '<p>Phone No: ' . $user['phone'] . '</p>';
        echo '<p>NIC No: ' . $user['nic'] . '</p>';
        echo '<p>Email Address: ' . $user['email'] . '</p>';
    } else {
        // If no user found with the provided userId
        echo 'User not found';
    }
} 


//Tool Supplier-----------------------------------------------------
if (isset($_GET['SupplierId'])) {
    $SupplierId = $_GET['SupplierId']; // Change $userId to $UserId

    // Query to retrieve user details based on userId
    $sql = "SELECT * FROM supplier WHERE SupplierId = '$SupplierId'";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result->num_rows > 0) {
        // Fetch user details
        $user = $result->fetch_assoc();
        echo '<style>
        /* CSS styles */
        h1 {
            color: #327028;
        }
        body {
            background-color: #BFCC7C;
        }
         </style>';
        // Output user details as JSON or HTML, depending on your requirement
        //echo json_encode($user); // For JSON response
        // Alternatively, you can output user details as HTML and style it accordingly
        echo '<h1>Tool Supplier Details</h1>';
        echo '<p>Tool Supplier ID: ' . $user['SupplierId'] . '</p>';
        echo '<p>First Name: ' . $user['FirstName'] . '</p>';
        echo '<p>Last Name: ' . $user['LastName'] . '</p>';
        echo '<p>Gender: ' . $user['Gender'] . '</p>';
        echo '<p>Phone No: ' . $user['PhoneNo'] . '</p>';
        echo '<p>NIC No: ' . $user['NICNo'] . '</p>';
        echo '<p>Email Address: ' . $user['Email'] . '</p>';
    } else {
        // If no user found with the provided userId
        echo 'User not found';
    }
} 


// Close the database connection
$conn->close();
?>
