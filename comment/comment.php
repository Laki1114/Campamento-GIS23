<!DOCTYPE html>
<html>
<head>
    <title>Comment Section</title>
    <link rel="stylesheet" type="text/css" href="comment.css">
</head>
<body>
    
    <div class="comment-form">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" name="username" placeholder="Your Name" required><br>
            <textarea name="comment" placeholder="Your Comment" required></textarea><br>
            <input type="hidden" name="page" value="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>">
            <button type="submit">Add Comment</button>
        </form>
    </div>
    <br><br>
    <div class="comments">
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
            $page = $_POST['page']; // Get the page URL from the form
        
            // Insert comment into the database with the page URL
            $sql = "INSERT INTO comments (username, comment, page) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $username, $comment, $page);
            $stmt->execute();
            $stmt->close();
        
            // Redirect back to the page after adding comment
            header("Location: comment.php");
            exit();
        }
        

        // Fetch comments specific to the current page from the database
        $current_page = htmlspecialchars($_SERVER["REQUEST_URI"]);
        $sql = "SELECT * FROM comments WHERE page = ? ORDER BY created_at DESC";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $current_page);
        $stmt->execute();
        $result = $stmt->get_result();

        // Display comments
        while ($row = $result->fetch_assoc()) {
            echo "<div><strong>" . $row['username'] . "</strong>: " . $row['comment'] . "</div>";
        }

        // Close the database connection
        $stmt->close();
        $conn->close();
        ?>
    </div>
</body>
</html>
