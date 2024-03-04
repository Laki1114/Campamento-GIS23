

<?php
// Include your database connection script or establish connection here
$servername = "localhost";
$username = "root";
$password = "";
$database = "campamento";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $comment = $_POST['comment'];

    // Insert comment into the database
    $sql = "INSERT INTO comments (username, comment) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $comment);
    $stmt->execute();
    $stmt->close();

    // Redirect back to the page after adding comment
    header("Location: yala.php");
    exit();
}

// Close the database connection
$conn->close();
?>
