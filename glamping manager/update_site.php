<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "campamento");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if site_id parameter is set and is a valid integer
if (isset($_GET['site_id']) && is_numeric($_GET['site_id'])) {
    // Sanitize the input to prevent SQL injection
    $site_id = mysqli_real_escape_string($conn, $_GET['site_id']);

    // Query the database to retrieve site details based on $site_id
    $sql = "SELECT * FROM glmp_sites WHERE site_id = $site_id";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error retrieving site details: " . mysqli_error($conn));
    }

    // Check if a record with the specified site_id exists
    if (mysqli_num_rows($result) == 1) {
        // Fetch site details
        $site = mysqli_fetch_assoc($result);
    } else {
        die("Site not found");
    }
} else {
    die("Invalid site ID");
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Glamping Site</title>
    <link rel="stylesheet" href="glm_css_files/update_site.css"> 
</head>
<body>
    
    <!-- Update form with pre-populated details -->
    <div class="update-form-container">
        <form method="post" action="update_site_action.php">
            <!-- Hidden input field to store site_id -->
            <input type="hidden" name="site_id" value="<?php echo $site_id; ?>">
            
            <!-- Form fields with pre-populated values -->
            <div>
                <label for="site_name">Site Name:</label>
                <input type="text" name="site_name" value="<?php echo $site['site_name']; ?>">
            </div>
            <div>
            <label for="site_description">Site Description:</label>
            <textarea name="site_description"><?php echo $site['site_description']; ?></textarea>
        </div>
        <div>
            <label for="site_category">Site Category:</label>
            <input type="text" name="site_category" value="<?php echo $site['site_category']; ?>">
        </div>
            <!-- Add other form fields for updating site details -->
            <div>
            <label for="room1_type">Room 1 Type:</label>
            <select name="room1_type">
                <option value="FamilyTent" <?php echo ($site['room1_type'] == 'FamilyTent') ? 'selected' : ''; ?>>Family Tent</option>
                <option value="LuxuryTent" <?php echo ($site['room1_type'] == 'LuxuryTent') ? 'selected' : ''; ?>>Luxury Tent</option>
            </select>
        </div>
        <div>
            <label for="room1_price">Room 1 Price:</label>
            <input type="text" name="room1_price" value="<?php echo $site['room1_price']; ?>">
        </div>
        <div>
            <label for="room2_type">Room 2 Type:</label>
            <select name="room2_type">
                <option value="FamilyTent" <?php echo ($site['room2_type'] == 'FamilyTent') ? 'selected' : ''; ?>>Family Tent</option>
                <option value="LuxuryTent" <?php echo ($site['room2_type'] == 'LuxuryTent') ? 'selected' : ''; ?>>Luxury Tent</option>
            </select>
        </div>
        <div>
            <label for="room2_price">Room 2 Price:</label>
            <input type="text" name="room2_price" value="<?php echo $site['room2_price']; ?>">
        </div>
        <div>
            <label for="site_image">Site Image:</label>
            <input type="file" name="site_image">
        </div>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
