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
    </form>
</div>
</body>
</html>
