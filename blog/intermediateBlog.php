<?php
require("functionBlog.php");

$shortTitle=$_POST["shortTitle"];
$postDate=$_POST["postDate"];
$subjectShort=$_POST["subjectShort"];
$subjectLong=$_POST["subjectLong"];





save_blog($shortTitle,$postDate,$subjectShort,$subjectLong);

?>