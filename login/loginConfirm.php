<?php
require '../database/linklinkz.php';



$email = $_POST["email"];
$password = ($_POST["psw"]);

$sql = "SELECT * FROM admin WHERE Email = '$email'";
$result=mysqli_query($linkz,$sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if (isset($_POST['email'])) {
            if ($_POST['email'] == $row["Email"]) {
                if ($_POST['psw'] == $row["Password"]) {
                    if ($row["Status"] == '1') {
                        $_SESSION['email'] = $email;
                        header("Location: ../admin/admin.php");
                        exit;
                    } else {
                        header("Location: ../login/login.php?error=deactivated");
                        exit;
                    }
                } else {
                    header("Location: ../login/login.php?error=password");
                    exit;
                }
            }
        }
    }
}


$sql = "SELECT * FROM user WHERE Email = '$email'";
$result=mysqli_query($linkz,$sql);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if (isset($_POST['email'])) {
            if ($_POST['email'] == $row["Email"]) {
                if ($_POST['psw'] == $row["Password"]) {
                    if ($row["Status"] == '1') {
                        $_SESSION['customer'] = $row["Email"]; // Use $row["Email"] instead of $email
                        $_SESSION['customerid'] = $row['UserId'];
                        header("Location: ../user/profileUser.php");
                        exit;
                    } else {
                        header("Location: ../login/login.php?error=deactivated");
                        exit;
                    }
                } else {
                    header("Location: ../login/login.php?error=password");
                    exit;
                }
            }
        }
    }
}



	


$sql = "SELECT * FROM glamping_manager WHERE Email = '$email'";
$result=mysqli_query($linkz,$sql);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if (isset($_POST['email'])) {
            if ($_POST['email'] == $row["Email"]) {
                if ($_POST['psw'] == $row["Password"]) {
                    if ($row["Status"] == '1') {
                        $_SESSION['email'] = $email;
                        header("Location: ../glamping manager/glm_dashboard.php");
                        exit;
                    } else {
                        header("Location: ../login/login.php?error=deactivated");
                        exit;
                    }
                } else {
                    header("Location: ../login/login.php?error=password");
                    exit;
                }
            }
        }
    }
}


$sql = "SELECT * FROM supplier WHERE Email = '$email'";
$result=mysqli_query($linkz,$sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if (isset($_POST['email'])) {
            if ($_POST['email'] == $row["Email"]) {
                if ($_POST['psw'] == $row["Password"]) {
                    if ($row["Status"] == '1') {
                        $_SESSION['supplier'] = $row["Email"];
                        header("Location: ../supplier/profileSupplier.php");
                        exit;
                    } else {
                        header("Location: ../login/login.php?error=deactivated");
                        exit;
                    }
                } else {
                    header("Location: ../login/login.php?error=password");
                    exit;
                }
            }
        }
    }
}

$sql = "SELECT * FROM driver WHERE email = '$email'";
$result=mysqli_query($linkz,$sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if (isset($_POST['email'])) {
            if ($_POST['email'] == $row["Email"]) {
                if ($_POST['psw'] == $row["Password"]) {
                    if ($row["Status"] == '1') {
                        $_SESSION['email'] = $email;
                        header("Location: ../driver/dr_db.php");
                        exit;
                    } else {
                        header("Location: ../login/login.php?error=deactivated");
                        exit;
                    }
                } else {
                    header("Location: ../login/login.php?error=password");
                    exit;
                }
            }
        }
    }
}


$sql = "SELECT * FROM guide WHERE email = '$email'";
$result=mysqli_query($linkz,$sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if (isset($_POST['email'])) {
            if ($_POST['email'] == $row["Email"]) {
                if ($_POST['psw'] == $row["Password"]) {
                    if ($row["Status"] == '1') {
                        $_SESSION['email'] = $email;
                        header("Location: ../guide/dr_db.php");
                        exit;
                    } else {
                        header("Location: ../login/login.php?error=deactivated");
                        exit;
                    }
                } else {
                    header("Location: ../login/login.php?error=password");
                    exit;
                }
            }
        }
    }
}
header("Location: ../login/login.php?error=not_registered");
exit;
?>