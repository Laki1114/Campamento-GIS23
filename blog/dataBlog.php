<?php
session_start();

$cid = $_SESSION['customerid'];
include('../database/linklinkz.php');

$sql = "SELECT * FROM blog WHERE userid='$cid'";
$result = mysqli_query($linkz, $sql);

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dataBlog.php</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="../css/blog/dataBlog.css">
    <style>
        .hello{
            background-color:white;
            border-radius:10px;
        }
    .buttonbutton1{
        background-color:#327028;
        border-radius:10px;
        padding:10px 20px;
        color:white;
    }
    .buttonbutton1:hover{
        background-color:white;
        border-radius:10px;
        padding:10px 20px;
        color:#327028;
    }
        </style>
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <?php include '../user/userSidebar.php'; ?>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <br><br>
            <a href="postBlog.php"><img src="../resource/assets/blog/post.png" height="100px" width="100px"></a>
            <h4 style="margin-left: 40px;">Click the icon to post</h4>
            <br> <br><br>
            <h2 style="margin-left: 40px;">Your Blog Posts</h2>
            <br>
            <div class="hello">          
                  <table class="purchases table-container">
                <thead>
                    <tr>
                        <th class='no-hover'><b>BlogID</b></th>
                        <th class='no-hover'><b>shortTitle</b></th>
                        <th class='no-hover'><b>postDate</b></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td><?php echo $row["blogID"] ?></td>
                            <td><?php echo $row["shortTitle"] ?></td>
                            <td><?php echo $row["postDate"] ?></td>
                            <td><a href='./single.php?id=<?= $row["blogID"] ?>'><button class='buttonbutton1'>View</button></a></td>
                            <td><a href='./editBlog.php?id=<?= $row["blogID"] ?>'><button class='buttonbutton1'>Edit</button></a></td>
                            <td><button class='buttonbutton1' onclick='delete_data(<?= $row["blogID"] ?>)'>Delete</button></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
                    </div>
        </div>
    </div>

    <script>
        function delete_data(id) {
            if (confirm('Are you sure to delete the record ?')) {
                window.location.href = 'deleteBlog.php?id=' + id;
            }
        }
    </script>

    <!-- ====== ionicons ======= -->
</body>

</html>
