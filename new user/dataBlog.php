<?php



?> 

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> addCategory.php </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="../css/blog/dataBlog.css">
</head>


<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
            <div class="navigation">
            
            <?php include '../user/userSidebar.php'; ?>
                    
            </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
        <?php
include ('../database/linklinkz.php');

$sql = "select * from blog";
$result = mysqli_query($linkz,$sql);
for ($i = 0; $i < 20; $i++) {
    echo "&nbsp;";
}
echo '<a href="postBlog.php"><img src="../resource/assets/blog/post.png" height="100px" width="100px"></a>';
echo "<h4 style='margin-left: 40px;'>Click the icon to post</h4>";

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
    echo "<td><button class='button button1'><a href='./single.php?id=$IdentityNo'>View</a></button></td>";
    echo "<td><button class='button button1'><a href='./editBlog.php?id=$IdentityNo'>Edit</a></button></td>";
    
    echo "<td><button class='button button1' onclick='delete_data($IdentityNo)'>Delete</button></td>";

    echo "</tr>";
}
echo "</table>";

?>





        </div>
    </div>

    <script>
		function delete_data(id){
			if(confirm('Are you sure to delete the record ?')){
				window.location.href = 'deleteBlog.php?id='+id;
			}
		}
</script>

    <!-- ====== ionicons ======= -->
</body>

</html>