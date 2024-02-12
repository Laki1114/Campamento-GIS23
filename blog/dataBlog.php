<html >
<head>
<link rel="stylesheet" href="profile.css">
    <title>Document</title>

    <script>
		function delete_data(id){
			if(confirm('Are you sure to delete the record ?')){
				window.location.href = 'deleteBlog.php?id='+id;
			}
		}
</script>


</head>

</body>
</html>
<?php
require("linklinkz.php");


$sql = "select * from blog";
$result = mysqli_query($linkz,$sql);



echo "<br> <br><br>";
echo "<h2 style='margin-left: 40px;'>Your Blog Posts</h2>";
echo "<br>";
echo '<table class="purchases table-container">';

echo "<td class='no-hover'><b>BlogID</b></th>";
echo "<td class='no-hover'><b>shortTitle</b></th>";
echo "<td class='no-hover'><b>postDate</b></th>";





while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    $IdentityNo = $row["blogID"];
    echo "<td>".$row["blogID"]."</td> <td>".$row["shortTitle"]."</td> <td>".$row["postDate"]."</td>";
    echo "<td><button class='button button1'><a href='./editBlog.php?id=$IdentityNo'>Edit</a></button></td>";
    echo "<td><button class='button button1' onclick='delete_data($IdentityNo)'>Delete</button></td>";

    echo "</tr>";
}
echo "</table>";

?>


