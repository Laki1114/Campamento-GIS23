
<!DOCTYPE html>
<html>
<head>
    <title>Comment Section</title>
    <link rel="stylesheet" type="text/css" href="comment.css">
</head>
<body>
    
    <div class="comment-form">
        <form action="add_comment.php" method="post">
            <input type="text" name="username" placeholder="Your Name" required><br>
            <textarea name="comment" placeholder="Your Comment" required></textarea><br>
            <button type="submit">Add Comment</button>
        </form>
    </div>
    <br><br>
    <div class="comments">
        <?php include 'fetch_comments.php'; ?>
    </div>
</body>
</html>
