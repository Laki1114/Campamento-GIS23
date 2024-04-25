<?php
// Include the file with your database connection details
include 'db.php';


//user-----------------------------------------------------------------------------
// Check if userId is provided and not empty
if (isset($_GET['UserId']) && !empty($_GET['UserId'])) {
    // Sanitize userId to prevent SQL injection
    $userId = $_GET['UserId'];

    // Prepare SQL statement to delete user with the given userId
    $sql = "DELETE FROM user WHERE UserId = ?";
    
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userId);

    // Execute the statement
    if ($stmt->execute()) {
        // Return a success message if deletion is successful
        echo "User with ID: $userId has been successfully removed from the database.";
    } else {
        // Return an error message if deletion fails
        echo "Error: Unable to remove the user with ID: $userId from the database.";
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // Return an error message if userId is not provided
    echo "Error: User ID is required.";
}



//glamping manager-----------------------------------------------------------------------------
// Check if userId is provided and not empty
if (isset($_GET['glm_id']) && !empty($_GET['glm_id'])) {
    // Sanitize userId to prevent SQL injection
    $userId = $_GET['glm_id'];

    // Prepare SQL statement to delete user with the given userId
    $sql = "DELETE FROM glamping_manager_registration WHERE glm_id = ?";
    
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userId);

    // Execute the statement
    if ($stmt->execute()) {
        // Return a success message if deletion is successful
        echo "User with ID: $userId has been successfully removed from the database.";
    } else {
        // Return an error message if deletion fails
        echo "Error: Unable to remove the user with ID: $userId from the database.";
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // Return an error message if userId is not provided
    echo "Error: Glamping Site Manager ID is required.";
}




//guide-----------------------------------------------------------------------------
// Check if userId is provided and not empty
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Sanitize userId to prevent SQL injection
    $userId = $_GET['id'];

    // Prepare SQL statement to delete user with the given userId
    $sql = "DELETE FROM guide WHERE id = ?";
    
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userId);

    // Execute the statement
    if ($stmt->execute()) {
        // Return a success message if deletion is successful
        echo "User with ID: $userId has been successfully removed from the database.";
    } else {
        // Return an error message if deletion fails
        echo "Error: Unable to remove the user with ID: $userId from the database.";
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // Return an error message if userId is not provided
    echo "Error: Guide ID is required.";
}




//driver-----------------------------------------------------------------------------
// Check if userId is provided and not empty
if (isset($_GET['d_id']) && !empty($_GET['d_id'])) {
    // Sanitize userId to prevent SQL injection
    $userId = $_GET['d_id'];

    // Prepare SQL statement to delete user with the given userId
    $sql = "DELETE FROM driver WHERE d_id = ?";
    
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userId);

    // Execute the statement
    if ($stmt->execute()) {
        // Return a success message if deletion is successful
        echo "User with ID: $userId has been successfully removed from the database.";
    } else {
        // Return an error message if deletion fails
        echo "Error: Unable to remove the user with ID: $userId from the database.";
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // Return an error message if userId is not provided
    echo "Error: Driver ID is required.";
}





//tool supplier-----------------------------------------------------------------------------
// Check if userId is provided and not empty
if (isset($_GET['SupplierId']) && !empty($_GET['SupplierId'])) {
    // Sanitize userId to prevent SQL injection
    $userId = $_GET['SupplierId'];

    // Prepare SQL statement to delete user with the given userId
    $sql = "DELETE FROM supplier WHERE SupplierId = ?";
    
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userId);

    // Execute the statement
    if ($stmt->execute()) {
        // Return a success message if deletion is successful
        echo "User with ID: $userId has been successfully removed from the database.";
    } else {
        // Return an error message if deletion fails
        echo "Error: Unable to remove the user with ID: $userId from the database.";
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // Return an error message if userId is not provided
    echo "Error: Tool Supplier ID is required.";
}


?>
