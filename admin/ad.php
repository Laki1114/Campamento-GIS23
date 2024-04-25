<?php
session_start(); // Start the session
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Submit Advertisement</title>
    <link rel="stylesheet" href="css/ad_submit.css">
</head>
<body>
<div class="bg-img">

    
    <form class="container" action="submit_advertisement.php" method="post" enctype="multipart/form-data">
    <h3>Submit Advertisement</h3>
        <label>Title:</label><br>
        <input type="text" name="title" required><br>
        <label>Description:</label><br>
        <textarea name="description" required></textarea>
        
        <br>
        <label>Images:</label><br>
        <input type="file" name="images[]" multiple accept="image/*"><br><br>
        <input type="submit" value="Submit">
        <button id="goBackButton">Go Back</button> <!-- Add Go Back button -->

    </form>

    <?php
    // Display success message if set in session variable
    if (isset($_SESSION['success_message'])) {
        echo "<p>{$_SESSION['success_message']}</p>";
        unset($_SESSION['success_message']); // Remove success message from session
    }
    ?>
    
</div>

<script>
document.getElementById("goBackButton").addEventListener("click", function() {
  window.history.go(-2); // JavaScript function to navigate back two pages in history
});
</script>
</body>
</html>
