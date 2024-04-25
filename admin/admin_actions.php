<?php
include 'db.php';

if(isset($_POST['id']) && isset($_POST['action'])) {
    $id = $_POST['id'];
    $action = $_POST['action']; // 'accept' or 'reject'

    $newStatus = ($action == 'accept') ? 'accepted' : 'rejected';

    $sql = "UPDATE advertisements SET status='$newStatus' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin_panel.php"); // Redirect back to admin panel
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
