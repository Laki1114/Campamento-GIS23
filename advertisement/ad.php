<!DOCTYPE html>
<html>
<head>
    <title>Submit Advertisement</title>
</head>
<body>
    <h2>Submit Advertisement</h2>
    <form action="submit_advertisement.php" method="post" enctype="multipart/form-data">
        <label>Title:</label><br>
        <input type="text" name="title" required><br>
        <label>Description:</label><br>
        <textarea name="description" required></textarea><br>
        <label>Category:</label><br>
        <input type="text" name="category" required><br>
        <label>Images:</label><br>
        <input type="file" name="images[]" multiple accept="image/*"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
