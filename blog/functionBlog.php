<?php
	function save_blog($shortTitle,$postDate,$subjectShort,$subjectLong){
		require("linklinkz.php");
		$sql = "INSERT INTO blog (shortTitle,postDate,subjectShort,subjectLong) VALUES('$shortTitle','$postDate','$subjectShort','$subjectLong')";
		$result=mysqli_query($linkz,$sql); 
	}


	
?>