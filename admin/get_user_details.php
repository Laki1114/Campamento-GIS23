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
        
        $images = explode(",", $user['thumb']);
                foreach ($images as $image) {
                    echo "<img src='../user/{$image}' alt='Image' width='200px' height='200px'>";


                }


        echo '<p><Strong>User ID:</Strong> ' . $user['UserId'] . '</p>';
        echo '<p><Strong>First Name:</Strong> ' . $user['FirstName'] . '</p>';
        echo '<p><Strong>Last Name:</Strong> ' . $user['LastName'] . '</p>';
        echo '<p><Strong>Gender: </Strong>' . $user['Gender'] . '</p>';
        echo '<p><Strong>Phone No: </Strong>' . $user['PhoneNo'] . '</p>';
        echo '<p><Strong>NIC No: </Strong>' . $user['NICNo'] . '</p>';
        echo '<p><Strong>Email Address:</Strong> ' . $user['Email'] . '</p>';
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
        echo '<p><Strong>Glamping site Manager ID:</Strong> ' . $user['glm_id'] . '</p>';
        echo '<p><Strong>First Name: </Strong>' . $user['first_name'] . '</p>';
        echo '<p><Strong>Last Name:</Strong> ' . $user['last_name'] . '</p>';
        echo '<p><Strong>Gender: </Strong>' . $user['gender'] . '</p>';
        echo '<p><Strong>Phone No: </Strong>' . $user['phone_number'] . '</p>';
        echo '<p><Strong>NIC No:</Strong> ' . $user['NIC'] . '</p>';
        echo '<p><Strong>Business Name:</Strong> ' . $user['business_name'] . '</p>';
        echo '<p><Strong>Business Registration Number: </Strong>' . $user['business_registration_no'] . '</p>';
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

        $images = explode(",", $user['picture']);
                foreach ($images as $image) {
                    echo "<img src='../guide/{$image}' alt='Image' width='200px' height='200px'>";


                }


        echo '<p><Strong>Guide ID:</Strong> ' . $user['id'] . '</p>';
        echo '<p><Strong>First Name:</Strong> ' . $user['firstname'] . '</p>';
        echo '<p><Strong>Last Name: </Strong>' . $user['lastname'] . '</p>';
        echo '<p><Strong>Gender: </Strong>' . $user['gender'] . '</p>';
        echo '<p><Strong>Phone No:</Strong> ' . $user['phone'] . '</p>';
        echo '<p><Strong>NIC No:</Strong> ' . $user['nic'] . '</p>';
        echo '<p><Strong>Email Address:</Strong> ' . $user['email'] . '</p>';
        echo '<p><Strong>Address:</Strong> ' . $user['address'] . '</p>';
        echo '<p><Strong>Experience: </Strong>' . $user['experience'] . '</p>';
        echo '<p><Strong>Location: </Strong>' . $user['location'] . '</p>';
        echo '<p><Strong>Qualification: </Strong>' . $user['qualification'] . '</p>';
        echo '<p><Strong>Language:</Strong> ' . $user['language'] . '</p>';
        echo '<p><Strong>Expertise : </Strong>' . $user['expertise'] . '</p>';
        echo '<p><Strong>Tour Types:</Strong> ' . $user['tour_types'] . '</p>';

        $images = explode(",", $user['license']);
        foreach ($images as $image) {
            echo "<img src='../guide/{$image}' alt='Image' width='300px' height='200px'>";

        }

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

        $images = explode(",", $user['picture']);
        foreach ($images as $image) {
            echo "<img src='../driver/{$image}' alt='Image' width='200px' height='200px'>";


        }


        echo '<p><Strong>Driver ID:</Strong> ' . $user['d_id'] . '</p>';
        echo '<p><Strong>First Name: </Strong>' . $user['firstname'] . '</p>';
        echo '<p><Strong>Last Name:</Strong> ' . $user['lastname'] . '</p>';
        echo '<p><Strong>Gender: </Strong>' . $user['gender'] . '</p>';
        echo '<p><Strong>Phone No: </Strong>' . $user['phone'] . '</p>';
        echo '<p><Strong>NIC No: </Strong>' . $user['nic'] . '</p>';
        echo '<p><Strong>Email Address: </Strong>' . $user['email'] . '</p>';
        echo '<p><Strong>Vehicle Des: </Strong>' . $user['veh_des'] . '</p>';
        echo '<p><Strong>Experience: </Strong>' . $user['experience'] . '</p>';
        echo '<p><Strong>Location: </Strong>' . $user['location'] . '</p>';
        echo '<p><Strong>Qualification: </Strong>' . $user['qualification'] . '</p>';
        echo '<p><Strong>Vehicle Type:</Strong> ' . $user['Vehicle_type'] . '</p>';
        echo '<p><Strong>Model : </Strong>' . $user['Model'] . '</p>';
        echo '<p><Strong>AC or Non-AC:</Strong> ' . $user['AC'] . '</p>';
        echo '<p><Strong>District:</Strong> ' . $user['district'] . '</p>';
        
        $images = explode(",", $user['license']);
        foreach ($images as $image) {
            echo "<img src='../driver/{$image}' alt='Image' width='300px' height='200px'>";

        }
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

        $images = explode(",", $user['thumb']);
        foreach ($images as $image) {
            echo "<img src='../supplier/{$image}' alt='Image' width='200px' height='200px'>";


        }

        echo '<p><Strong>Tool Supplier ID:</Strong> ' . $user['SupplierId'] . '</p>';
        echo '<p><Strong>First Name: </Strong>' . $user['FirstName'] . '</p>';
        echo '<p><Strong>Last Name:</Strong> ' . $user['LastName'] . '</p>';
        echo '<p><Strong>Gender:</Strong> ' . $user['Gender'] . '</p>';
        echo '<p><Strong>Phone No:</Strong> ' . $user['PhoneNo'] . '</p>';
        echo '<p><Strong>NIC No:</Strong> ' . $user['NICNo'] . '</p>';
        echo '<p><Strong>Email Address:</Strong> ' . $user['Email'] . '</p>';
    } else {
        // If no user found with the provided userId
        echo 'User not found';
    }
} 


// Close the database connection
$conn->close();
?>
