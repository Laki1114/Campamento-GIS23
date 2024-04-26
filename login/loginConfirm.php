<?php
session_start();


// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Include database connection
    include('../database/linklinkz.php');

    // Get user inputs
    $email = $_POST["email"];
    $password = $_POST["psw"];

    // Query to check admin credentials
    $sql = "SELECT * FROM admin WHERE Email = '$email'";
    $result = mysqli_query($linkz, $sql);

    // If admin exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Check if the password matches
        if ($_POST['psw'] == $row["Password"]) {
            // Check if the admin account is active
            if ($row["Status"] == '1') {
                // Set session variable for admin email
                $_SESSION['email'] = $email;
                // Redirect to admin.php
                header("Location: ../admin/admin.php");
                exit;
            } else {
                // Admin account is deactivated
                $_SESSION['error'] = "deactivated";
                header("Location: ../login/login.php");
                exit;
            }
        } else {
            // Incorrect password
            $_SESSION['error'] = "password";
            header("Location: ../login/login.php");
            exit;
        }
    } else {
        // Admin does not exist
        $_SESSION['error'] = "email";
        header("Location: ../login/login.php");
        exit;
    }
} else {
    // Redirect to login page if form is not submitted
    header("Location: ../login/login.php");
    exit;}

    

$sql = "SELECT * FROM user WHERE Email = '$email'";
$result = mysqli_query($linkz, $sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($_POST['psw'] == $row["Password"]) {
        if ($row["Status"] == '1') {
            // Set customer email and customer ID in sessions
            $_SESSION['customer'] = $row["Email"];
            $_SESSION['customerid'] = $row['UserId'];
            echo $_SESSION['customer'];
            // Redirect to the target page with both IDs in the URL parameter
            //header("Location: ../user/profileUSer.php?user=" . $_SESSION['customer'] . "&userid=" . $_SESSION['customerid']);
            header("Location: ../user/checkout.php");
            exit;
        } else {
            $_SESSION['error'] = "deactivated";
            header("Location: ../login/login.php");
            exit;
        }
    } else {
        $_SESSION['error'] = "password";
        header("Location: ../login/login.php");
        exit;
    }
}

$sql = "SELECT * FROM glamping_manager_registration WHERE Email = '$email'";
$result = mysqli_query($linkz, $sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($_POST['psw'] == $row["Password"]) {
        if ($row["Status"] == '1') {
            $_SESSION['email'] = $email;
            header("Location: ../glamping manager/glm_Prfile.php");
            exit;
        } else {
            $_SESSION['error'] = "deactivated";
            header("Location: ../login/login.php");
            exit;
        }
    } else {
        $_SESSION['error'] = "password";
        header("Location: ../login/login.php");
        exit;
    }
}

$sql = "SELECT * FROM supplier WHERE Email = '$email'";
$result = mysqli_query($linkz, $sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($_POST['psw'] == $row["Password"]) {
        if ($row["Status"] == '1') {
            $_SESSION['SupplierId'] = $row['SupplierId'];
            $_SESSION['email'] = $row["Email"];
            //header("Location: ../supplier/profileSupplier.php?supplier=" . $_SESSION['supplier']);
            //header("Location: ../Supplier/orders.php?supplier=" . $_SESSION['email']);
            header("Location: ../Supplier/profileSupplier.php");
            exit;
        } else {
            $_SESSION['error'] = "deactivated";
            header("Location: ../login/login.php");
            exit;
        }
    } else {
        $_SESSION['error'] = "password";
        header("Location: ../login/login.php");
        exit;
    }
}

$sql = "SELECT * FROM driver WHERE email = '$email'";
$result=mysqli_query($linkz,$sql);

if($result->num_rows > 0)
{

	while($row = $result->fetch_assoc())
	{
		if(isset($_POST['email']))
	{
		if($_POST['email'] == $row["email"] && $_POST['psw'] == $row["password"] )
		{
			$_SESSION['email'] = $email;
			header("Location:../driver/dr_db.php");
		}
		
	}
	}
}

$sql = "SELECT * FROM guide WHERE email = '$email'";
$result=mysqli_query($linkz,$sql);

if($result->num_rows > 0)
{

	while($row = $result->fetch_assoc())
	{
		if(isset($_POST['email']))
	{
		if($_POST['email'] == $row["email"] && $_POST['psw'] == $row["password"] )
		{
			$_SESSION['email'] = $email;
			header("Location:../guide/dr_db.php");
		}
		
	}
	}
}






exit;
?>
