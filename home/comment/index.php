<?php
 
// index.php
 
$conn = mysqli_connect("localhost", "root", "", "campamento");
 
if (isset($_POST["post_comment"]))
{
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $comment = mysqli_real_escape_string($conn, $_POST["comment"]);
    $post_id = mysqli_real_escape_string($conn, $_POST["post_id"]);
    $reply_of = 0;
 
    mysqli_query($conn, "INSERT INTO comments(name, email, comment, post_id, created_at, reply_of) VALUES ('" . $name . "', '" . $email . "', '" . $comment . "', '" . $post_id . "', NOW(), '" . $reply_of . "')");
    echo "<p>Comment has been posted.</p>";
}
 


// connect with database
$conn = mysqli_connect("localhost", "root", "", "campamento");
 
// get all comments of post
$result = mysqli_query($conn, "SELECT * FROM comments WHERE post_id = " . $post_id);
 
// save all records from database in an array
$comments = array();
while ($row = mysqli_fetch_object($result))
{
    array_push($comments, $row);
}
 
// loop through each comment
foreach ($comments as $comment_key => $comment)
{
    // initialize replies array for each comment
    $replies = array();
 
    // check if it is a comment to post, not a reply to comment
    if ($comment->reply_of == 0)
    {
        // loop through all comments again
        foreach ($comments as $reply_key => $reply)
        {
            // check if comment is a reply
            if ($reply->reply_of == $comment->id)
            {
                // add in replies array
                array_push($replies, $reply);
 
                // remove from comments array
                unset($comments[$reply_key]);
            }
        }
    }
 
    // assign replies to comments object
    $comment->replies = $replies;
}





if (isset($_POST["do_reply"]))
{
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $comment = mysqli_real_escape_string($conn, $_POST["comment"]);
    $post_id = mysqli_real_escape_string($conn, $_POST["post_id"]);
    $reply_of = mysqli_real_escape_string($conn, $_POST["reply_of"]);
 
    $result = mysqli_query($conn, "SELECT * FROM comments WHERE id = " . $reply_of);
    if (mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_object($result);
 
        // sending email
        $headers = 'From: YourWebsite <no-reply@yourwebsite.com>' . "\r\n";
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
         
        $subject = "Reply on your comment";
 
        $body = "<h1>Reply from:</h1>";
        $body .= "<p>Name: " . $name . "</p>";
        $body .= "<p>Email: " . $email . "</p>";
        $body .= "<p>Reply: " . $comment . "</p>";
 
        mail($row->email, $subject, $body, $headers);
    }
 
    mysqli_query($conn, "INSERT INTO comments(name, email, comment, post_id, created_at, reply_of) VALUES ('" . $name . "', '" . $email . "', '" . $comment . "', '" . $post_id . "', NOW(), '" . $reply_of . "')");
    echo "<p>Reply has been posted.</p>";
}
 






?>