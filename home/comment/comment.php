<?php
    // make sure you have a post ID 1 in your "posts table"
    $post_id = 1;
?>
 
<form action="index.php" method="post">
 
    <input type="hidden" name="post_id" value="<?php echo $post_id; ?>" required>
 
    <p>
        <label>Your name</label>
        <input type="text" name="name" required>
    </p>
 
    <p>
        <label>Your email address</label>
        <input type="email" name="email" required>
    </p>
 
    <p>
        <label>Comment</label>
        <textarea name="comment" required></textarea>
    </p>
 
    <p>
        <input type="submit" value="Add Comment" name="post_comment">
    </p>
</form>


<ul class="comments">
    <?php foreach ($comments as $comment): ?>
        <li>
            <p>
                <?php echo $comment->name; ?>
            </p>
 
            <p>
                <?php echo $comment->comment; ?>
            </p>
 
            <p>
                <?php echo date("F d, Y h:i a", strtotime($comment->created_at)); ?>
            </p>
 
            <div data-id="<?php echo $comment->id; ?>" onclick="showReplyForm(this);">Reply</div>
 
            <form action="index.php" method="post" id="form-<?php echo $comment->id; ?>" style="display: none;">
                 
                <input type="hidden" name="reply_of" value="<?php echo $comment->id; ?>" required>
                <input type="hidden" name="post_id" value="<?php echo $post_id; ?>" required>
 
                <p>
                    <label>Your name</label>
                    <input type="text" name="name" required>
                </p>
 
                <p>
                    <label>Your email address</label>
                    <input type="email" name="email" required>
                </p>
 
                <p>
                    <label>Comment</label>
                    <textarea name="comment" required></textarea>
                </p>
 
                <p>
                    <input type="submit" value="Reply" name="do_reply">
                </p>
            </form>
        </li>
    <?php endforeach; ?>
</ul>

<script>
 
function showReplyForm(self) {
    var commentId = self.getAttribute("data-id");
    if (document.getElementById("form-" + commentId).style.display == "") {
        document.getElementById("form-" + commentId).style.display = "none";
    } else {
        document.getElementById("form-" + commentId).style.display = "";
    }
}
 
</script>


<ul class="comments reply">
    <?php foreach ($comment->replies as $reply): ?>
        <li>
            <p>
                <?php echo $reply->name; ?>
            </p>
 
            <p>
                <?php echo $reply->comment; ?>
            </p>
 
            <p>
                <?php echo date("F d, Y h:i a", strtotime($reply->created_at)); ?>
            </p>
 
            <div onclick="showReplyForReplyForm(this);" data-name="<?php echo $reply->name; ?>" data-id="<?php echo $comment->id; ?>"> Reply</div>
        </li>
    <?php endforeach; ?>
</ul>

<script>
 
function showReplyForReplyForm(self) {
    var commentId = self.getAttribute("data-id");
    var name = self.getAttribute("data-name");
 
    if (document.getElementById("form-" + commentId).style.display == "") {
        document.getElementById("form-" + commentId).style.display = "none";
    } else {
        document.getElementById("form-" + commentId).style.display = "";
    }
 
    document.querySelector("#form-" + commentId + " textarea[name=comment]").value = "@" + name;
    document.getElementById("form-" + commentId).scrollIntoView();
}
 
</script>