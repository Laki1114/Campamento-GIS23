<?php
session_start();
include('database/glm_link.php');

// Initialize variables
$glm_id = $firstName = $last_name = $gender = $phone_number = $NIC = $email = $password = '';

// Set session email
$email=$_SESSION['email'];


// Fetch supplier details from the database
$sql = "SELECT * FROM glamping_manager_registration WHERE email = '$email'";
$result = mysqli_query($glm, $sql);

// Check if the query was successful
if ($result) {
    // Check if the query returned any rows
    if (mysqli_num_rows($result) > 0) {
        // Fetch data from the result set
        $row = mysqli_fetch_assoc($result);
        $glm_id = $row["glm_id"];
        $firstName = $row["first_name"];
        $last_name = $row["last_name"];
        $gender = $row["gender"];
        $phone_number = $row["phone_number"];
        $NIC = $row["NIC"];
        $email = $row["email"];
        $password = $row["password"];
        
    } else {
        // No rows found
        echo "No rows found";
    }
} else {
    // Query failed
    echo "Error: " . mysqli_error($glm);
}
?>

<html lang="en">




<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Manager Profile </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="../css/User/profileUser.css">

</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            
            <?php include 'manager_sidebar.php'; ?>
                    
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            
        <div class="upper-section">
    <center>
        <h2>Welcome <?php  echo $firstName ?>!</h2>
        <br><br>
        <h3>Glamping Manager ID - <?php  echo $glm_id ?></h3><br><br>
        <div >
            <div class="profile">
                <div><!--class="container-image"-->
                    <img src="<?php echo $thumb; ?>" alt="" height='150' width='150'>
                    <a href='editManager.php'>
                        <button class="btn">
                            <img src="../resource/assets/profile/edit.png" width="30px" height="30px">
                        </button>
                    </a>
                </div>
            </div>
            <br><br><br><br>
            <div class="profile-info">
                <table>
                    <tr>
                        <td>First Name : <?php  echo $firstName ?></td>
                    </tr>
                    <tr>
                        <td>NIC no : <?php  echo $NIC ?></td>
                    </tr>
                    <tr>
                        <td>Last name : <?php  echo $last_name ?></td>
                    </tr>
                    <tr>
                        <td>Email : <?php  echo $email ?></td>
                    </tr>
                    <tr>
                        <td>Gender : <?php  echo $gender ?></td>
                    </tr>
                    <tr>
                        <td>Phone no : <?php  echo $phone_number ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><a href='#'><button class="btn info">change password</button></a></td>
                        <td><a href="deleteSupplier.php.?id=<?php echo $glm_id; ?>"><button class="btn info">Delete Account</button></a></td>
                    </tr>
                </table>
            </div>
        </div>
    </center>
</div>
                  

        </div>
    </div>

<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>

   
</body>
</html> 












