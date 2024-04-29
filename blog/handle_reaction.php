<?php
 include('../database/linklinkz.php');

if(!isset($_SESSION['customer']) && empty($_SESSION['customer']) ){
    header('location:../login/login.php');
    
    
   }//echo $_SESSION['customer']."<br>";
   if(!isset($_SESSION['customerid'])){
       echo '<script>window.location.href = "../login/login.php";</script>';}

      


// Assuming you have already established a database connection

if(isset($_GET['post_id']) && isset($_GET['reaction'])) {
    $post_id = $_GET['post_id'];
    $reaction = $_GET['reaction'];
    $user_id =$_SESSION['customerid'] ; // assuming user id is 1, you should get this from session or login

    // Insert the like/dislike into the database
    $insert_query = "INSERT INTO likes_dislikes (post_id, user_id, reaction) VALUES ($post_id, $user_id, '$reaction')";
    mysqli_query($conn, $insert_query);

    // Update the like/dislike count for the respective blog post
    $update_query = "UPDATE blog_posts SET ";
    if($reaction == 'like') {
        $update_query .= "likes = likes + 1 ";
    } else {
        $update_query .= "dislikes = dislikes + 1 ";
    }
    $update_query .= "WHERE id = $post_id";
    mysqli_query($conn, $update_query);

    echo "Reaction saved successfully!";
    header("location:single.php?id={$post_id}");
    exit;
} else {
    echo "Invalid request!";
}
?>
