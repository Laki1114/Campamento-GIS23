<?php

include('../database/linklinkz.php');
include('auth.php');









//echo $userID;echo $blogID;
// Function to check if a user has liked or disliked a blog post
function checkLikeStatus($blogID, $userID) {
    global $conn;
    $userID =$_SESSION['customerid'];
    $sql = "SELECT * FROM blog_likes WHERE blog_id = '$blogID' AND user_id = '$userID'";
    $result = mysqli_query($conn, $sql);
    $result = mysqli_query($conn, $sql);
//if (!$result) {
   // die("Error in SQL query: " . mysqli_error($conn));//error correction code
//}
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['liked']) {
            return 'liked';
        } elseif ($row['disliked']) {
            return 'disliked';
        }
    }
    return 'none';
}

// Function to get the number of likes and dislikes for a blog post
function getLikeCounts($blogID) {
    global $conn;
    $likeCount = 0;
    $dislikeCount = 0;
    $sql = "SELECT COUNT(*) AS count FROM blog_likes WHERE blog_id = '$blogID' AND liked = 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $likeCount = $row['count'];
    $sql = "SELECT COUNT(*) AS count FROM blog_likes WHERE blog_id = '$blogID' AND disliked = 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $dislikeCount = $row['count'];
    return array('likes' => $likeCount, 'dislikes' => $dislikeCount);
}

// Handle like/dislike button click only if user is logged in and hasn't reacted yet
// Check if the user has already reacted to the post
if (isLoggedIn() && isset($_POST['like'])) {
    $blogID = $_POST['blog_id'];
    $userID = $_SESSION['customerid']; // Assuming you have user authentication
    $status = $_POST['status']; // 'like' or 'dislike'
    $likeStatus = checkLikeStatus($blogID, $userID);
    if ($likeStatus == 'none') {
        if ($status == 'like') {
            $liked = 1;//Set liked to 1 if the user liked the post
            $disliked = 0;
        } elseif ($status == 'dislike') {
            $liked = 0;
            $disliked = 1;
        }
        $sql = "INSERT INTO blog_likes (blog_id, user_id, liked, disliked) VALUES ('$blogID', '$userID', '$liked', '$disliked')";
        mysqli_query($conn, $sql);
    }
}

// Display like and dislike buttons and counts
$blogID = $_GET['id']; // Assuming you get the blog ID from the URL
$userID = isset($_SESSION['customerid']) ? $_SESSION['customerid'] : null; // Assuming you have user authentication
$likeStatus = isLoggedIn() ? checkLikeStatus($blogID, $userID) : 'none';
$likeCounts = getLikeCounts($blogID);
?>
<head>
    <style>
        .like-dislike-container {
    display: flex;
    margin-left: 50px;
}

.like-dislike-container > div {
    margin-right: 10px; /* Adjust the margin as needed */
}
.like-dislike-container button {
    background-color: #ffffff; /* White */
    border: 1px solid #dddddd; /* Light grey border */
    color: #333333; /* Dark grey text color */
    padding: 5px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 13px;
    margin: 2px 2px;
    cursor: pointer;
    border-radius: 3px;
}

.like-dislike-container button:hover {
    background-color: #f2f2f2; /* Lighter grey on hover */
}


        </style>
</head>
<!-- HTML for displaying like and dislike buttons and counts -->
<div class="like-dislike-container">
    <div>
        <form method="post">
            <input type="hidden" name="blog_id" value="<?php echo $blogID ?>">
            <input type="hidden" name="status" value="like">
            <button type="submit" name="like" <?php if (!$userID || $likeStatus == 'liked') echo 'disabled' ?>>Like</button>
        </form>
        <span>Likes: <?php echo $likeCounts['likes'] ?></span>
    </div>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div>
        <form method="post">
            <input type="hidden" name="blog_id" value="<?php echo $blogID ?>">
            <input type="hidden" name="status" value="dislike">
            <button type="submit" name="like" <?php if (!$userID || $likeStatus == 'disliked') echo 'disabled' ?>>Dislike</button>
        </form>
        <span>Dislikes: <?php echo $likeCounts['dislikes'] ?></span>
    </div>
</div>
