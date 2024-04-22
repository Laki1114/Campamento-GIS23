<?php
session_start();
include('../database/linklinkz.php');

if(isset($_GET['supplier'])) {
    $email = $_GET['supplier']; // Retrieve the supplier email from the URL parameter
    $_SESSION['supplier']=$email;
    $sql = "SELECT * FROM supplier WHERE Email = '$email'";
    $result = mysqli_query($linkz,$sql);

    while ($row = mysqli_fetch_assoc($result)){
        $userID=$row["SupplierId"];
        $firstName=$row["FirstName"];
        $lastName=$row["LastName"];
        $gender=$row["Gender"];
        $phoneNo=$row["PhoneNo"];
        $nicNo=$row["NICNo"];
        $email=$row["Email"];
        $psw=$row["Password"];
        $thumb=$row["thumb"];
        
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/user/profileUser.css">
</head>
<body>

<!-- Header Section -->
<!-- Your HTML code for header section goes here -->

<div class="upper-section">
    <center>
        <h2>Welcome <?php  echo $firstName ?>!</h2>
        <br><br>
        <h3>Supplier ID - <?php  echo $userID ?></h3><br><br>
        <div class="container">
            <div class="profile">
                <div><!--class="container-image"-->
                    <img src="<?php echo $thumb; ?>" alt="" height='150' width='150'>
                    <a href='editSupplier.php'>
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
                        <td>NIC no : <?php  echo $nicNo ?></td>
                    </tr>
                    <tr>
                        <td>Last name : <?php  echo $lastName ?></td>
                    </tr>
                    <tr>
                        <td>Email : <?php  echo $email ?></td>
                    </tr>
                    <tr>
                        <td>Gender : <?php  echo $gender ?></td>
                    </tr>
                    <tr>
                        <td>Phone no : <?php  echo $phoneNo ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><a href='#'><button class="btn info">change password</button></a></td>
                        <td><a href="deleteSupplier.php.?id=<?php echo $userID; ?>"><button class="btn info">Delete Account</button></a></td>
                    </tr>
                </table>
            </div>
        </div>
    </center>
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
