<?php
session_start();
 include('../database/linklinkz.php');
//if(!isset($_SESSION['customer']) && empty($_SESSION['customer']) ){
    //header('location:../login/login.php');
    
    
   //}//echo $_SESSION['customer']."<br>";
  // if(!isset($_SESSION['customerid'])){
     //  echo '<script>window.location.href = "../login/login.php";</script>';
   
  // }
   if(isset($_GET['id'])){
    $post_id = $_GET['id'];}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Like/Dislike Blog Post</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="blog-post">
        <h2>Blog Post Title</h2>
        <p>Blog post content goes here...</p>
        <?php
       
            // PHP code to fetch the total number of likes for this post
            $post_id = 123; // Replace 123 with the actual post ID
            $likes_query = "SELECT * FROM likes_dislikes WHERE post_id = $post_id and reaction='like'";
            $likes_result = mysqli_query($conn, $likes_query);
            $row = mysqli_fetch_assoc($likes_result);
            $total_likes = mysqli_num_rows($likes_result);
           
        ?>
        <button id="likeBtn" onclick="react('like')">
            Like <span id="likeCount"><?php echo $total_likes; ?></span>
        </button>
        <button id="dislikeBtn" onclick="react('dislike')">Dislike</button>
    </div>
    
    <script>
        function react(reaction) {
            var postId = 123; // replace with actual post id
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var response = JSON.parse(this.responseText);
                    document.getElementById("likeCount").innerText = response.likes;
                    alert(response.message);
                }
            };
            xmlhttp.open("GET", "handle_reaction.php?post_id=" + postId + "&reaction=" + reaction, true);
            xmlhttp.send();
        }
    </script>
</body>
</html>
