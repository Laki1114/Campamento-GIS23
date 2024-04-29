<?php
session_start();

if (!isset($_SESSION['email'])) {
    // If user is not logged in, return an error message in JSON format
    $response = array('status' => 'error', 'message' => 'User is not logged in.');
    echo json_encode($response);
    exit(); // Stop script execution
}
$email = $_SESSION['email'];

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "campamento");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get manager ID using email
$sql_manager = "SELECT glm_id FROM glamping_manager_registration WHERE email=?";
$stmt = mysqli_prepare($conn, $sql_manager);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result_manager = mysqli_stmt_get_result($stmt);

if ($result_manager && mysqli_num_rows($result_manager) > 0) {
    $row_manager = mysqli_fetch_assoc($result_manager);
    $glm_id = $row_manager['glm_id'];
}

// Close the prepared statement
mysqli_stmt_close($stmt);

// If glamping manager ID is found
if ($glm_id) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        // Process form data when form is submitted
        
        // Escape user inputs for security
        $site_name = mysqli_real_escape_string($conn, $_POST['site_name']);
        $site_description = mysqli_real_escape_string($conn, $_POST['site_description']);
        $site_category = mysqli_real_escape_string($conn, $_POST['site_category']);
        $room1_type = mysqli_real_escape_string($conn, $_POST['room1_type']);
        $max_guests_1 = mysqli_real_escape_string($conn, $_POST['max_guests_1']);
        $room1_price = mysqli_real_escape_string($conn, $_POST['room1_price']);
        $room2_type = mysqli_real_escape_string($conn, $_POST['room2_type']);
        $max_guests_2 = mysqli_real_escape_string($conn, $_POST['max_guests_2']);
        $room2_price = mysqli_real_escape_string($conn, $_POST['room2_price']);
        
        // File upload
        $file_name = $_FILES['site_image']['name'];
        $file_size = $_FILES['site_image']['size'];
        $file_tmp = $_FILES['site_image']['tmp_name'];
        $file_type = $_FILES['site_image']['type'];
        $temp = explode(".", $_FILES["site_image"]["name"]);
        $file_ext = end($temp);
        
        $extensions = array("jpeg", "jpg", "png");
        
        if (in_array($file_ext, $extensions) === false) {
            $response = array('status' => 'error', 'message' => "Extension not allowed, please choose a JPEG or PNG file.");
            echo json_encode($response);
            exit();
        }
        
        if ($file_size > 2097152) {
            $response = array('status' => 'error', 'message' => 'File size must be less than 2 MB');
            echo json_encode($response);
            exit();
        }
        
        // Insert site details into database
        $sql = "INSERT INTO sites (gl_id, site_name, site_description, site_category, room1_type, max_guests_1, room1_price, room2_type, max_guests_2, room2_price, site_image) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "issssiisiss", $glm_id, $site_name, $site_description, $site_category, $room1_type, $max_guests_1, $room1_price, $room2_type, $max_guests_2, $room2_price, $file_name);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        
        // Move uploaded file to the desired folder
        move_uploaded_file($file_tmp, "images/" . $file_name);
        
        // Close database connection
        mysqli_close($conn);
        
header("Location: glm_profile2.php");
        
        exit();
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Glamping Site</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="../css/User/form.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <?php include 'manager_sidebar.php'; ?>
        </div>
        <!-- ========================= Main ==================== -->
        <div class="main">
            <br><br>
            <center>
                <div>
                    <div class="card">
                        <div class="card-header">
                            Add Glamping Site
                        </div>
                        <div class="card-body">
                            <section id="content">
                                <div class="content-blog bg-white py-3">
                                    <div>
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="site_name">Site Name</label>
                                                <input type="text" class="form-control" name="site_name" id="site_name"
                                                    placeholder="Site Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="site_description">Site Description</label>
                                                <textarea class="form-control" name="site_description"
                                                    rows="3"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="site_category">Site Category</label>
                                                <select class="form-control" id="site_category" name="site_category">
                                                    <option value="Wildglamping">Wild Glamping Site</option>
                                                    <option value="Beachglamping">Beach Glamping Site</option>
                                                    <option value="Treehouse">Tree House</option>
                                                    <option value="Luxurysite">Luxury Site</option>
                                                </select>
                                            </div>

                                            <label>Tent-1 Details</label><br><br>
                                            <div class="form-group">
                                                <label for="room1_type">Tent 1 Type</label>
                                                <select class="form-control" id="room1_type" name="room1_type">
                                                    <option value="FamilyTent">Family Tent</option>
                                                    <option value="LuxuryTent">Luxury Tent</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="max_guests_1">Max No. of Guests</label>
                                                <select class="form-control" id="max_guests_1" name="max_guests_1">
                                                    <option value="2">2</option>
                                                    <option value="4">4</option>
                                                    <option value="4-6">4-6</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="room1_price">Tent 1 Price (1 night)</label>
                                                <input type="text" class="form-control" name="room1_price"
                                                    id="room1_price" placeholder="Room 1 Price">
                                            </div>

                                            <label>Tent-2 Details</label><br><br>
                                            <div class="form-group">
                                                <label for="room2_type">Tent 2 Type</label>
                                                <select class="form-control" id="room2_type" name="room2_type">
                                                    <option value="FamilyTent">Family Tent</option>
                                                    <option value="LuxuryTent">Luxury Tent</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="max_guests_2">Max No. of Guests</label>
                                                <select class="form-control" id="max_guests_2" name="max_guests_2">
                                                    <option value="2">2</option>
                                                    <option value="4">4</option>
                                                    <option value="4-6">4-6</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="room2_price">Tent 2 Price (1 night)</label>
                                                <input type="text" class="form-control" name="room2_price"
                                                    id="room2_price" placeholder="Room 2 Price">
                                            </div>
                                            <div class="form-group">
                                                <label for="siteimage">Site Image</label>
                                                <input type="file" name="site_image" id="site_image">
                                                <p class="help-block">Only jpg/png are allowed.</p>
                                            </div>

                                            <button type="submit" name='submit' class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </center>
        </div>
    </div>
    <!-- ====== ionicons ======= -->
</body>

</html>
